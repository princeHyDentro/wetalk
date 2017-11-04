<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Dashboard extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	}

	public function index()
	{
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
        	$this->load->view('dashboard/dashboard');
       		$this->load->view('template/footer');
		}	
	}
}