<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function new_message($user_id = NULL){

 		$this->db->select("*");
 		$this->db->where('pmto_recipient =', $user_id);
 		$this->db->where('pmto_read =', NULL);
 		$this->db->where('pmto_rdate =', NULL);
		$stations = $this->db->get('privmsgs_to');
		$result   = $stations->num_rows();

		return $result;
	}
  
}