<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	public function new_message($user_id = NULL){
		// $query_privmsgs 	= $this->db->query("SELECT * FROM privmsgs WHERE privmsg_author=".$user_id);
  //   	$result_privmsg 	= $query_privmsgs->result('array');
  //   	$cnt_msgs 	= 0;
  //   	$data 		= array();

  //   	foreach ($result_privmsg as $key => $newmsgs) {
  //   		$data[] = $newmsgs['privmsg_id'];
    		
  //   	}
  //   	$implode  = implode(', ',$data);
  //   	$result   = 0;

 		$this->db->select("*");
 		$this->db->where('pmto_recipient =', $user_id);
 		$this->db->where('pmto_read =', NULL);
 		$this->db->where('pmto_rdate =', NULL);
		//$this->db->where_in('pmto_message', $implode);
		$stations = $this->db->get('privmsgs_to');
		$result   = $stations->num_rows();

		return $result;
    	
    	//echo "<pre>"; print_r($stations->num_rows()); echo "</pre>";
    	// return $cnt_msgs;
	}
}