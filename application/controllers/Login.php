<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('login');
		$this->load->view('template/footer');
	}
	public function login_auth(){
		if(isset($_POST['user_password']) && isset($_POST['user_name'])){
			$user_password  = $_POST['user_password'];
			$user_name  	= $_POST['user_name'];
		}
		$this->authLogin($user_name,$user_password);
	}
	public function authLogin($user_name,$user_password){
		$this->load->model('login_model');
		$this->load->helper('url');
		//Field validation succeeded.  Validate against database
		if(isset($user_password) && isset($user_name)){
			$user_name      = $user_name;
			$user_password  = $user_password;
		}

		//query the database
		$result = $this->login_model->login($user_name,$user_password);

		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'user_name' 	=> $row->username,
					'user_fname' 	=> $row->fname,
					'user_full_name'=> $row->full_name,
					'user_lname'	=> $row->lname,
					'user_mname'	=> $row->middle,
					'user_email'	=> $row->email,
					'user_rights'	=> $row->roles,
					'user_id' 		=> $row->id
				);
				$this->session->set_userdata('is_logged_in', $sess_array);
			}
			echo "succeeded-admin";
		}else{
			echo "failed";
		}
		// else{
		// 	$client_result = $this->login_model->user_login($user_name,$user_password);
		// 	if($client_result){
		// 		$sess_array = array();
		// 		foreach($client_result as $row){
		// 			$this->session->set_userdata('is_logged_in', $row);
		// 		}
		// 		echo "succeeded-client";
		// 	}else{
		// 		echo "failed";
		// 	}
		// }
	}
	public function logout(){
		$this->session->unset_userdata('is_logged_in');
		session_destroy();
		redirect('','refresh');
	}
}
