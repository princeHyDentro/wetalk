<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm_model extends CI_Model {

	private $table1;
	private $table2;
	private $ci;

	private $user_id = NULL;

	public $messages = array();

	public $recipients = array();

	public function __construct($dateformat = "Y.m.d - H:i:s", $enforce_field_types = TRUE)
	{
		parent::__construct();
		$this->ci = & get_instance();
		$this->load->model('User_model', 'user_model');
		$this->load->library('Table_model');
		$this->table1 = new Table_model(TABLE_PM, $dateformat, $enforce_field_types);
		$this->table2 = new Table_model(TABLE_PMTO, $dateformat, $enforce_field_types);
		$this->user_id = $this->user_model->current_id();
	}

	public function initialize($dateformat = "d.m.Y - H:i", $enforce_field_types = TRUE)
	{
		// Define the date format & whether db field types are enforced in PHP by type cast
		$this->table1->initialize($dateformat, $enforce_field_types);
		$this->table2->initialize($dateformat, $enforce_field_types);
	}


	public function get_messages($type = MSG_NONDELETED , $user_id = NULL)
	{
		// Lets use abbreviations

		$t1 = $this->table1->get_name();
		$t2 = $this->table2->get_name();

		$this->db->select($t1.'.*');
		$this->db->from($t1);
		// Specify what type of messages you want to get - conditions work with join;
		// Since db evaluates "AND" first "A AND B OR C AND D" = "(A AND B) OR (C AND D)"
		switch($type)
		{
			// Message types RECEIVED inbox
			case MSG_NONDELETED:
				$this->db->where(TF_PMTO_RECIPIENT, $user_id);
				$this->db->where(TF_PMTO_DELETED, NULL);
				break;
			case MSG_DELETED:
				// this produces "(A AND B) OR (C AND D)"
				$this->db->where(TF_PMTO_RECIPIENT, $user_id);
				$this->db->where(TF_PMTO_DELETED, 1);
				$this->db->or_where(TF_PM_AUTHOR, $user_id);
				$this->db->where(TF_PM_DELETED, 1);
				break;
			case MSG_UNREAD:
				$this->db->where(TF_PMTO_RECIPIENT, $user_id);
				$this->db->where(TF_PMTO_DELETED, NULL);
				$this->db->where(TF_PMTO_READ, NULL);
				break;
			// Message type SENT
			case MSG_SENT:
				$this->db->where(TF_PM_AUTHOR, $user_id);
				$this->db->where(TF_PM_DELETED, NULL);
				break;
			// Message type RECEIVED OR SENT (deleted or not, sent to or by this user)
			default:
				$this->db->where(TF_PMTO_RECIPIENT, $user_id);
				$this->db->where(TF_PM_AUTHOR, $user_id);
				break;
		}
		// Get messages by join of table1 & 2
		$this->db->join($t2, TF_PMTO_MESSAGE.' = '.TF_PM_ID);
		$this->db->group_by(TF_PM_ID); // To get only distinct messages
		$this->db->order_by(TF_PM_DATE, 'desc');

		return $this->table1->get_data();
	}


	public function get_message($msg_id,$user_id = NULL)
	{
		// Lets use abbreviations
		$t1 = $this->table1->get_name();
		$t2 = $this->table2->get_name();

		// Get message by join of table1 & 2
		$this->db->select($t1.'.*');
		$this->db->from($t1);
		// this produces "(A AND B) OR (A AND C)" = "A AND (B OR C)"
		$this->db->where(TF_PM_ID, $msg_id);
		$this->db->where(TF_PMTO_RECIPIENT, $user_id);
		$this->db->or_where(TF_PM_ID, $msg_id);
		$this->db->where(TF_PM_AUTHOR, $user_id);
		$this->db->join($t2, TF_PMTO_MESSAGE.' = '.TF_PM_ID);

		return $this->table1->get_data();
	}


	public function get_recipients($msg_id)
	{
		// Lets use abbreviations
		$t2 = $this->table2->get_name();

		// Get recipients from table2
		$this->db->select(TF_PMTO_RECIPIENT);
		$this->db->from($t2);
		$this->db->where(TF_PMTO_MESSAGE, $msg_id);

		return $this->table2->get_data();
	}


	public function get_author($msg_id)
	{
		$message = $this->get_message($msg_id);
		if($message)
		{
			$message = reset($message);
			$author = $message[TF_PM_AUTHOR];
		}
		else
			$author = -1;

		return $author;
	}


	function flag_read($msg_id, $allow_notify = TRUE , $user_id = NULL )
	{
		$date = date("Y-m-d H:i:s");
		// Lets use abbreviations
		$t2 = $this->table2->get_name();

		$this->db->set(TF_PMTO_READ, 1);
		$this->db->set(TF_PMTO_RDATE, $date);
		if($allow_notify) 
		$this->db->set($t2.'.'.TF_PMTO_ALLOWNOTIFY, 1);
		$this->db->limit(1, 0);
		$this->db->where(TF_PMTO_MESSAGE, $msg_id);
		$this->db->where(TF_PMTO_RECIPIENT, $user_id);

		return $this->table2->update_data();
	}


	function flag_deleted($msg_id, $status = 1)
	{
		$date = date("Y-m-d H:i:s");
		$this->db->limit(1, 0);
		if($this->get_author($msg_id) == $this->user_id)
		{
			
			$this->db->set(TF_PM_DELETED, $status);
			$this->db->set(TF_PM_DDATE, $date);
			$this->db->where(TF_PM_ID, $msg_id);
			$this->db->where(TF_PM_AUTHOR, $this->user_id);
			return $this->table1->update_data();
		}
		else
		{
			$this->db->set(TF_PMTO_DELETED, $status);
			$this->db->set(TF_PMTO_DDATE, $date);
			$this->db->where(TF_PMTO_MESSAGE, $msg_id);
			$this->db->where(TF_PMTO_RECIPIENT, $this->user_id);
			return $this->table2->update_data();
		}
	}


	function flag_undeleted($msg_id)
	{
		return $this->flag_deleted($msg_id, NULL);
	}

	function send_message_from_client($recipients, $subject, $body, $notify = TRUE)
	{
		// Check notify
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		$client_id      	= $is_logged_in['client_id'];
		$user_email     	= $is_logged_in['client_email'];
		$client_from 		= $is_logged_in['name'];

		// exit;
		$failed = FALSE; // if sth. fails here, more complex cleanup is required

		if( ! $notify) $notify = NULL;
		else $notify = TRUE;
		// Check recipients
		if( ! is_array($recipients)) $recipients = array($recipients);

		foreach ($recipients as $recipient)
			if( ! $this->user_model->table1->is_valid_index($recipient))
				return FALSE;
				$date = date("Y-m-d H:i:s");
				// insert message in privmsgs
				$this->db->set(TF_PM_AUTHOR, $client_id);
				$this->db->set('from_name', $client_from);
				$this->db->set('type', 1);
				//$this->db->set(TF_PM_DATE, 'NOW()', FALSE);
				$this->db->set(TF_PM_DATE, $date);
				
				$this->db->set(TF_PM_SUBJECT, $subject);
				$this->db->set(TF_PM_BODY, $body);
				$this->db->set(TF_PM_NOTIFY, $notify);

				if( ! $this->table1->insert_data())
					return FALSE;
				
				$msg_id = $this->table1->insert_id;


		// insert links to it for recipients in privmsgs_to
		
		foreach ($recipients as $recipient)
		{

			// Do not allow sending messages to oneself!
			if($recipient != $user_email)
			{

				$this->db->set(TF_PMTO_MESSAGE, $msg_id);
				$this->db->set(TF_PMTO_RECIPIENT, $recipient);

				if( ! $this->table2->insert_data()){
					$failed = TRUE;
				}
			}
		}
		// on failure remove all we just inserted & return FALSE
		if($failed)
		{
			$this->table1->delete_data(array(TF_PM_ID => $msg_id));
			$this->table2->delete_data(array(TF_PMTO_MESSAGE, $msg_id));
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file Pm_model.php */
