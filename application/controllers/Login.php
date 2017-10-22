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


	/*public function index()
	{
		if(isset($_GET['key'])){

			if(isset($_GET['pass']) && isset($_GET['user_name'])){
				$user_name      = $_GET['user_name'];
	        	$user_password  = $_GET['pass'];
			}
			$this->authLogin($user_name,$user_password);
		}else{
			$this->load->view("login");
		}

	}

	public function access_forbidden(){
		$this->load->view('forbidden');
	}
	public function authLogin($user_name,$user_password){
		$this->load->model('login_model');
		$this->load->model('permission_model');
		//Field validation succeeded.  Validate against database
		if(isset($user_password) && isset($user_name)){
			$user_name      = $user_name;
        	$user_password  = $user_password;
		}

		//query the database
		$result = $this->login_model->login(base64_decode($user_name), base64_decode($user_password));

		if($result){
			$sess_array = array();
			foreach($result as $row){

			   	$sess_array = array(
			   		'rid' => $row->rid,
			   		'user_type' =>$row->user_type,
				    'user_name' => $row->user_name,
				    'user_id' => $row->user_id,
			   	);

			   	$perms = $this->permission_model->getPermissionsHaveAccess($row->rid);

			   	if(!array_key_exists('df_gray_out_with_custom_prompt',$perms)){
			   		$perms['df_hide_disabled_features'] = NULL;
			   	}

			   	$sess_perms['perms'] = $perms;
			   	$this->session->set_userdata('is_logged_in', $sess_array);
			   	$this->session->set_userdata('perms', $sess_perms);
			}
			redirect('survey/survey_manager');
		}
	}
	public function check_database(){
		$this->load->model('login_model');
		$this->load->model('permission_model');
		//Field validation succeeded.  Validate against database
		if(isset($_POST['login-username']) && isset($_POST['login-password'])){
			$user_name      = $_POST['login-username'];
        	$user_password  = $_POST['login-password'];
		}
		//query the database
		$result = $this->login_model->login($user_name, $user_password);

		if($result){
			$sess_array = array();
			foreach($result as $row){

			   	$sess_array = array(
			   		'rid'            => $row->rid,
			   		'user_type'      =>$row->user_type,
				    'user_name'      => $row->user_name,
				    'user_id'        => $row->user_id,
                    'user_plan_type' => $row->plan_type
			   	);

			   	$perms = $this->permission_model->getPermissionsHaveAccess($row->rid);
			   	if(!array_key_exists('df_gray_out_with_custom_prompt',$perms)){
			   		$perms['df_hide_disabled_features'] = NULL;
			   	}
			   	$sess_perms['perms'] = $perms;
			   	$this->session->set_userdata('is_logged_in', $sess_array);
			   	$this->session->set_userdata('perms', $sess_perms);
			}

			return true;
		}else{
		 echo  'false';
		 return false;
		}
	}
	public function logout(){
		$this->load->helper('cookie');
	   $this->session->unset_userdata('is_logged_in');
	   delete_cookie("get_widthL");
	   session_destroy();
	  // redirect('survey-go.com');
		header('location: https://survey-go.com');
	}*/
}
