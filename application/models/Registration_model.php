<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registration_model extends CI_Model {
	public function employees_table(){
		$query = $this->db->query('SELECT * FROM users');
		//echo count($query->result());
		//$query = $this->db->get();
	    if(count($query->result()) >= 1){
	      return $query->result();
	    }else{
	      return false;
	    }
	}
}