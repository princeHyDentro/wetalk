<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    public function login($username,$password) {
        $query = $this->db->select('
            users.id,
            users.fname,
            users.lname,
            users.middle,
            users.username,
            users.full_name,
            users.email,
            users.roles')
        ->from('users')
        ->where("(users.email = '$username' OR users.username = '$username')")
        ->where('password', MD5($password));

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