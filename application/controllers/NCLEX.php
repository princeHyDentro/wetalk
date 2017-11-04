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
			$data['nclex'] = $this->NCLEX_model->nclex_view(1);
			$data['status'] = $this->NCLEX_model->nclex_status();
			$data['user'] = $this->NCLEX_model->nclex_userdata(1);
			$this->load->view('template/header');
	        $this->load->view('NCLEX/view_applicant',$data);
	        $this->load->view('template/footer');
	    }
	}
	
	public function insert_nlex() {
		$this->load->model("NLEX_model");
		$data = array(
		    "user_id" =>1,
			"cl_type_id" =>3,
			"status_id" =>$_POST['status'],
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
			"client_company" => $_POST["company"]
		);
		$this->NLEX_model->nlex_insert($data);
		if ($this->db->affected_rows() > 0) {
			echo $this->db->insert_id();
		}
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
			"client_company" => $_POST["company"]
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