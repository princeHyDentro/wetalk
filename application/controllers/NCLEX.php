<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NCLEX extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	}

	public function create_new_applicant()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
	        $this->load->view('NCLEX/create_new_applicant');
	        $this->load->view('template/footer');
    	}
	}
	public function view_all_applicant()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
	        $this->load->view('NCLEX/view_applicant');
	        $this->load->view('template/footer');
	    }
	}
}