<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

	public function login($username,$password) {
		$query = $this->db->select('
            users.user_id,
            users.user_fname,
            users.user_lname,
            users.user_mname,
            users.user_username,
            users.user_email,
            users.user_rights')
          ->from('users')
          ->where("(users.user_email = '$username' OR users.user_username = '$username')")
          ->where('user_password', MD5($password));

      $query = $this->db->get();
	    if($query->num_rows() == 1){
	      return $query->result();
	    }else{
	      return false;
	    }
    }
         // ->where("users.deleted = 0")
          // ->where("users.is_Active = 'Yes'")
}