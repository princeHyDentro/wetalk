<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KBL extends CI_Controller {
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
	        $this->load->view('korean_basic_language/create_new_applicant');
	        $this->load->view('template/footer');
	    }
	}
	public function view_all_applicant()
	{
		$this->load->model("KBL_model");
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$data['kbl_data'] = $this->KBL_model->kbl_view(2,$is_logged_in['user_id']);
			$data['status'] = $this->KBL_model->kbl_status();
			$data['user'] = $this->KBL_model->kbl_userdata($is_logged_in['user_id']);
			$this->load->view('template/header');
	        $this->load->view('korean_basic_language/view_applicant',$data);
	        $this->load->view('template/footer');
	    }
	}
	
	public function insert_new_kbl() {
		$this->load->model("KBL_model");
		$is_logged_in = $this->session->userdata('is_logged_in');

		$data = array(
			"user_id" 		=>$is_logged_in['user_id'],
			"cl_type_id" =>2,
			"name" => $_POST["name"],
			"client_address" => $_POST["address"],
			"client_mobile" => $_POST["mobile"],
            "client_contactno" => $_POST["telephone"],
            "client_email" => $_POST["exampleInputEmail"],
			"client_birthdate" => $_POST["datepicker"],
			"client_age" => $_POST["age"],
			"gender_id" => $_POST["gender"],
			"client_datecreated" => date('Y-m-d'),
			"client_educationalattainment" => $_POST["educational"],
			"client_datevisited" => $_POST["datevisited"],
			"client_school" => $_POST["school"],
			"client_course" => $_POST["course"],
			"client_enrolled" => $_POST["enrollment"],
			"client_referredby" => $_POST["referral"],
			"client_remarks" => $_POST["remarks"],
			"client_formno" => $_POST["formno"],
			"password"     => md5($this->randomPassword())
 		);
		$this->KBL_model->kbl_insert($data);
		if ($this->db->affected_rows() > 0) {
			echo $this->db->insert_id();
		} 	
	}
	function randomPassword() {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 10; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}
	
	public function kbl_update_client()
	{    
	     $this->load->model("KBL_model");
	     if ($this->uri->segment(4) != "") {
		   $client_update = array (
			 "name" => $_POST["name"],
			 "client_address" => $_POST["address"],
			 "client_mobile" => $_POST["mobile"],
			 "client_contactno" => $_POST["telephone"],
			 "client_email" => $_POST["exampleInputEmail"],
			 "client_birthdate" => $_POST["datepicker"],
			 "client_age" => $_POST["age"],
			 "gender_id" => $_POST["gender"],
			 "client_educationalattainment" => $_POST["educational"],
		     "client_datevisited" =>  $_POST["datevisited"],
			 "client_school" => $_POST["school"],
			 "client_course" => $_POST["course"],
			 "client_enrolled" => $_POST["enrollment"],
			 "client_referredby" => $_POST["referral"],
			 "client_remarks" => $_POST["remarks"],
			 "client_datecreated" => date('Y-m-d'),
			 "client_formno" => $_POST["formno"]
		   );
		   $this->KBL_model->kbl_update($_POST["client_id"],$client_update);
		   if ($this->db->affected_rows() > 0) {
			   echo "success";
		   }
		 } else {
			 $data['kbl'] = $this->KBL_model->kbl_view_by_id($this->uri->segment(3));
			 $this->load->view('template/header');
			 $this->load->view('korean_basic_language/create_new_applicant',$data);
			 $this->load->view('template/footer');
		 }		 
	}
	
	public function kbl_delete_client() {
		$this->load->model("KBL_model");
		$id = $this->uri->segment(3);
		$data = array(
		   "deleted" => 1
		);
		$this->KBL_model->kbl_delete($id,$data);
		if ($this->db->affected_rows() > 0) {
			header("Location:/wetalk/kbl/view_all_applicant");
		}
	}
}