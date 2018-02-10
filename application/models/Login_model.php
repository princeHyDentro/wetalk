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
        $query = $this->db->select('
            applicant.id,
            applicant.username,
            applicant.email,
            applicant.name')
        ->from('applicant')
        ->where("(applicant.email = '$username' OR applicant.username = '$username')")
        ->where('password', MD5($password));

        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->result();
        }else{
            return false;
        }
    }
}