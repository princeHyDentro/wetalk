<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class J1_exchange_culture extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function create_new_applicant()
	{
		$this->load->model("J1_Exchange_Culture_Model");
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			if ($this->uri->segment(3) != "") {
				$data['client'] = $this->J1_Exchange_Culture_Model->j1_view_by_id($this->uri->segment(3));
				$this->load->view('template/header');
				$this->load->view('j1_exchange_culture/create_new_applicant',$data);
				$this->load->view('template/footer');	
			} else {
				$this->load->view('template/header');
				$this->load->view('j1_exchange_culture/create_new_applicant');
				$this->load->view('template/footer');
			}
		}
	}
	
	public function update_client()
	{    
		$this->load->model("J1_Exchange_Culture_Model");
		if ($this->uri->segment(4) != "") {
			$client_update = array (
				"name" => $_POST["name"],
				"client_address" => $_POST["address"],
				"client_contactno" => $_POST["contact_no"],
				"client_email" => $_POST["email_address"],
				"client_birthdate" => $_POST["birthdate"],
				"client_age" => $_POST["age"],
				"gender_id" => $_POST["gender"],
				"client_yeargraduated" => $_POST["year_graduated"],
				"client_datevisited" =>  $_POST["date_visited"],
				"client_school" => $_POST["school"],
				"client_course" => $_POST["course"],
				"status_id" => $_POST["status"],
				"client_month" => $_POST["month"],
				"client_yearapplied" => $_POST["year"],
				"j1_type" => $_POST["j1_type"],
				"client_remarks" => $_POST["message"],
				"client_formno" => $_POST["formno"],
				"client_company" => $_POST["company"],
				"client_referredby" => $_POST["referred_by"]
				);
			$this->J1_Exchange_Culture_Model->j1_update($_POST["client_id"],$client_update);
			if ($this->db->affected_rows() > 0) {
				echo "success";
			}
		} else {
			$data['client'] = $this->J1_Exchange_Culture_Model->j1_view_by_id($this->uri->segment(3));
			$this->load->view('template/header');
			$this->load->view('j1_exchange_culture/create_new_applicant',$data);
			$this->load->view('template/footer');
		}		 
	}
	
	public function delete_client() {
		$this->load->model("J1_Exchange_Culture_Model");
		$id = $this->uri->segment(3);
		$data = array(
			"deleted" => 1
			);
		$this->J1_Exchange_Culture_Model->j1_delete($id,$data);
		if ($this->db->affected_rows() > 0) {
			header("Location:/wetalk/J1_exchange_culture/view_all_applicant");
		}
	}
	
	public function view_all_applicant()
	{
		$this->load->model("J1_Exchange_Culture_Model");
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$data['j1_data'] = $this->J1_Exchange_Culture_Model->j1_view(1);
			$data['status'] = $this->J1_Exchange_Culture_Model->j1_status();
			$data['user'] = $this->J1_Exchange_Culture_Model->j1_userdata(1);
			$this->load->view('template/header');
			$this->load->view('j1_exchange_culture/view_applicant',$data);
			$this->load->view('template/footer');
		}
	}
	
	public function insert_new_j1exchangeculture() {
		$this->load->model("J1_Exchange_Culture_Model");
		$data = array(
			"user_id" =>1,
			"cl_type_id" =>1,
			"status_id" =>$_POST['status'],
			"client_course" => $_POST["course"],
			"pic_id" =>1,
			"name" => $_POST['name'],
			"client_address" => $_POST['address'],
			"client_contactno" => $_POST['contact_no'],
			"client_email" => $_POST['email_address'],
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
		$this->J1_Exchange_Culture_Model->j1_insert($data);
		if ($this->db->affected_rows() > 0) {
			echo $this->db->insert_id();
		}
	}
	
	public function do_upload_data(){
		$this->load->model("J1_Exchange_Culture_Model");
		$config['upload_path']="/upload";
		$config['allowed_types']='gif|jpg|png';
		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
			$data = array('upload_data' => $this->upload->data());
			$data1 = array(
				'client_id' => 1,
				'pic_path' => $data['upload_data']['file_name']
				);  
			$result= $this->J1_Exchange_Culture_Model->j1_insertPic($data1);
			if ($result == TRUE) {
				echo "true";
			}
		}
	}
}