<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	}
	public function index(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $this->load->view('client_template/header');
            $this->load->view('profile/profile');
            $this->load->view('client_template/footer');
        }
	}
}