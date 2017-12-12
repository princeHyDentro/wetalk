<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller
{
	public function __construct(){
	    parent::__construct();
        $this->load->model('message_model','message');
	}

    public function compose()
    {

    	$this->load->view('template/header');
       	$this->load->view("messages/compose.php");
    	$this->load->view('template/footer');

    }
    public function sent(){
        $is_logged_in   = $this->session->userdata('is_logged_in');
        $this->message->fetch_sent_message($is_logged_in['user_id']);

        $this->load->view('template/header');
        $this->load->view("messages/sent.php");
        $this->load->view('template/footer');
    }

    public  function createMessage()
    {

        $is_logged_in   = $this->session->userdata('is_logged_in');
        $body           = $_POST['privmsg_body'];
        $receiver_id    = $_POST['recipients'];
        $subject        = $_POST['privmsg_subject'];


        // save DATA to message table      ($subject, $body, $source)
        $message_data = array('subject' => $subject , 'body' => $body);
        $insertMsgs = $this->message->new_message($message_data);
        if ($this->db->affected_rows() > 0) {
            $message_id =  $this->db->insert_id();
        }

              
        // save DATA to message_user table ($message_id, $sender_id, $receiver_id, 'sent')
        $sent = array('message_id' => $message_id , 'user_id' => $is_logged_in['user_id'] , 'interlocutor' => $receiver_id  , 'folder' => 'sent' , 'unread' => 0);
        $this->message->message_user($sent);


        // save DATA to message_user table ($message_id, $receiver_id, $sender_id, 'inbox')
        $inbox = array('message_id' => $message_id , 'user_id' => $receiver_id, 'interlocutor' => $is_logged_in['user_id'] , 'folder' => 'inbox');
        $this->message->message_user($inbox);
        if ($this->db->affected_rows() > 0) {
            echo "success";
        }else{
            echo "fail";
        }
    }
}