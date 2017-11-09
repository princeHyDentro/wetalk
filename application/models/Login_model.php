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
    public function user_login($username,$password){
        $condition = "client_email =" . "'" . $username . "' AND " . "password =" . "'" . md5($password) . "' AND deleted = 0";
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result_array();;
        } else {
            return false;
        }
    }
}