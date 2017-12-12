<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {

	public function new_message($data){
		$this->db->insert("message",$data);
	}
	public function message_user($data){
		$this->db->insert("message_user",$data);
	}
	public function fetch_sent_message($user_id = NULL){
		

		$result = $this->db->query("SELECT * FROM message msgs 
									JOIN message_user msgs_user ON msgs.id = msgs_user.message_id 
									JOIN users user ON user.user_id = msgs_user.interlocutor 
									WHERE msgs_user.deleted = 'none' 
									AND msgs_user.folder 	= 'sent' 
									AND msgs_user.user_id 	= ".$user_id);
		  if ($result->num_rows() > 0) {
		  	echo "<pre>";
		  	print_r($result->result_array());
		  	echo "</pre>";
		  }
	}
}

