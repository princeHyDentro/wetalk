<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	}

	public function employee_registration_form()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$data['employee_result'] = $this->get_employee_data();

			$this->load->view('template/header');
	        $this->load->view('registration/registration_form',$data);
	        $this->load->view('template/footer');
		}
	}
	public function get_employee_data(){
		$this->load->model('registration_model');

		$result = $this->registration_model->employees_table();
		if($result){
			return $result;
		}
	}
}