<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function pending_tickets(){
		$data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
			$this->load->view('admin_tickets/pending_tickets');
		}	
	}

	public function completed_tickets(){
		$data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
			$this->load->view('admin_tickets/complete_tickets');
		}	
	}


}