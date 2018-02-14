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

	public function chart_js_data(){

		$this->db->select("MONTHNAME(created_at) as monthName , created_at , status, COUNT(id) as total");
        $this->db->from('applicant');
        $this->db->where("Year(created_at)", date("Y"));
        $this->db->group_by(array("Month(created_at)","Year(created_at)" , "status")); 
        $this->db->order_by("Month(created_at)", "asc");

        $data = $this->db->get()->result_array();
        return $data;
	}

	public function chart_js_yearly(){
		$this->db->select("Year(created_at) as yearName , created_at , status, COUNT(id) as total");
        $this->db->from('applicant');
        $this->db->where("Year(created_at)", date("Y"));
        $this->db->group_by(array("Year(created_at)","Year(created_at)" , "status")); 
        $this->db->order_by("Year(created_at)", "asc");

        $data = $this->db->get()->result_array();
        return $data;
	}
  
}