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
		// echo $_POST['user_password'];
		// exit;
		if(isset($_POST['user_password']) && isset($_POST['user_name'])){
			$user_name      = $_POST['user_password'];
			$user_password  = $_POST['user_name'];
		}
		$this->authLogin($user_name,$user_password);
	}
	public function authLogin($user_name,$user_password){
		$this->load->model('login_model');
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
					'user_name' 	=> $row->user_username,
					'user_fname' 	=> $row->user_fname,
					'user_lname'	=> $row->user_lname,
					'user_mname'	=> $row->user_mname,
					'user_email'	=> $row->user_email,
					'user_rights'	=> $row->user_rights,
					'user_id' 		=> $row->user_id
					);

				$this->session->set_userdata('is_logged_in', $sess_array);
			}
			echo "succeeded";
		}else{
			echo "failed";
		}
	}
	public function logout(){
		$this->session->unset_userdata('is_logged_in');
		session_destroy();
		redirect('','refresh');
	}
}
