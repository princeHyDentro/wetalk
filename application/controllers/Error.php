<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
	}

	public function index(){
		$data           = array();
		$is_logged_in   = $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/errors/cli/error_404');
		}   
	}
}