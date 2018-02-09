<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	}
	public function index(){
        $this->load->model("Registration_model");
        $data = array();
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $data['user_information'] = $this->Registration_model->get_by_id($is_logged_in['user_id']);
            $this->load->view('template/header',$data);
            $this->load->view('profile/profile');
        }
	}

    public function update($id){

        $this->db->where('id', $id);
        $this->db->update('users', $_POST);
        echo  $this->db->affected_rows();
    }
}