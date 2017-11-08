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
		$this->load->model("NCLEX_model");

		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$data['nclex'] = $this->NCLEX_model->nclex_view(3,$is_logged_in['user_id']);
			$data['status'] = $this->NCLEX_model->nclex_status();
			$data['user'] = $this->NCLEX_model->nclex_userdata($is_logged_in['user_id']);
			$this->load->view('template/header');
	        $this->load->view('NCLEX/view_applicant',$data);
	        $this->load->view('template/footer');
	    }
	}
	
	public function insert_nclex() {

		$this->load->model("NCLEX_model");
		
		$is_logged_in = $this->session->userdata('is_logged_in');

		$data = array(
			"user_id" 		=>$is_logged_in['user_id'],
			"cl_type_id" =>3,
			"status_id" =>1,
			"client_course" => $_POST["course"],
			"pic_id" =>1,
			"name" => $_POST['name'],
			"client_address" => $_POST['address'],
			"client_contactno" => $_POST['contact_no'],
			"client_email" => $_POST['address'],
			"gender_id" => $_POST['gender'],
			"client_datevisited" => $_POST['date_visited'],
			"client_school" => $_POST['school'],
			"client_month" => $_POST['month'],
			"client_remarks" => $_POST['message'],
			"client_datecreated" => date('Y-m-d'),
			"client_of" => "",
			"client_birthdate" => $_POST['birthdate'],
			"client_yeargraduated" => $_POST['year_graduated'],
			"client_yearapplied" => $_POST['year'],
			"client_formno" => $_POST['formno'],
			"client_age" => $_POST["age"],
			"client_referredby" => $_POST["referred_by"],
			"client_company" => $_POST["company"],
			"password" => md5($this->randomPassword())
		);

		$this->NCLEX_model->nclex_insert($data);
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
	
	public function nclex_update()
	{    
	     $this->load->model("NCLEX_model");
	     if ($this->uri->segment(4) != "") {
		   $nclex = array (
			"name" => $_POST['name'],
			"client_address" => $_POST['address'],
			"client_contactno" => $_POST['contact_no'],
			"client_email" => $_POST['address'],
			"gender_id" => $_POST['gender'],
			"client_datevisited" => $_POST['date_visited'],
			"client_school" => $_POST['school'],
			"client_month" => $_POST['month'],
			"client_remarks" => $_POST['message'],
			"client_datecreated" => date('Y-m-d'),
			"client_of" => "",
			"client_birthdate" => $_POST['birthdate'],
			"client_yeargraduated" => $_POST['year_graduated'],
			"client_yearapplied" => $_POST['year'],
			"client_formno" => $_POST['formno'],
			"client_age" => $_POST["age"],
			"client_referredby" => $_POST["referred_by"],
			"client_company" => $_POST["company"],
			"j1_type" => $_POST["j1_type"]
		   );
		   $this->NCLEX_model->nclex_update($_POST["client_id"],$nclex);
		   if ($this->db->affected_rows() > 0) {
			   echo "success";
		   }
		 } else {
			 $data['nclex'] = $this->NCLEX_model->nclex_view_by_id($this->uri->segment(3));
			 $this->load->view('template/header');
			 $this->load->view('nclex/create_new_applicant',$data);
			 $this->load->view('template/footer');
		 }		 
	}
	
	public function nclex_delete() {
		$this->load->model("NCLEX_model");
		$id = $this->uri->segment(3);
		$data = array(
		   "deleted" => 1
		);
		$this->NCLEX_model->nclex_delete($id,$data);
		if ($this->db->affected_rows() > 0) {
			header("Location:/wetalk/nclex/view_all_applicant");
		}
	}
}