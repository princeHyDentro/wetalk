<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function enrolled_applicants(){
		$data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
			$this->load->view('admin_applicants/all_enrolled_applicant');
		}	
	}

	public function inquire_applicants(){
		$data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
			$this->load->view('admin_applicants/all_inquired_applicant');
		}	
	}

	public function deleted_applicants(){
		$data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
			$this->load->view('admin_applicants/all_deleted_applicant');
		}	
	}
    /***********************************************END OF VIEW********************************/
    public function get_all_enrolled_applicant_ajax(){

		$this->load->model("Admin_model");
		$this->load->helper('date');
		$is_logged_in   = $this->session->userdata('is_logged_in');
		$list   = $this->Admin_model->admin_all_enroll_applicants();
		$data   = array();
		$no     = $_POST['start'];

		foreach ($list as $app) {
			$no++;
			$row = array();

			$row[] = $app->id;
			$row[] = $app->name;
			$row[] = $app->encoder_name;
			$row[] = $app->contact;
			$row[] = $app->address;
			$row[] = $app->email;
			$row[] = $app->service;
			$row[] = $app->status;
			$row[] = $app->created_at;
			

			$data[] = $row;
		}

		$output = array(
			"draw"              => $_POST['draw'],
			"recordsTotal"      => $this->Admin_model->admin_count_all_enroll_applicants(),
			"recordsFiltered"   => $this->Admin_model->admin_count_filtered_enroll_applicants(),
			"data"              => $data,
		);

		echo json_encode($output);
	}

	/*---------------------------FOR INQUIRE APPLICANT--------------------*/
	public function get_all_inquire_applicant_ajax(){

		$this->load->model("Admin_model");
		$this->load->helper('date');
		$is_logged_in   = $this->session->userdata('is_logged_in');
		$list   = $this->Admin_model->admin_all_inquire_applicants();
		$data   = array();

		$no     = $_POST['start'];

		foreach ($list as $app) {
			$no++;
			$row = array();

			$row[] = $app->id;
			$row[] = $app->name;
			$row[] = $app->encoder_name;
			$row[] = $app->contact;
			$row[] = $app->address;
			$row[] = $app->email;
			$row[] = $app->service;
			$row[] = $app->status;
			$row[]  = $app->created_at;
			$data[] = $row;
		}

		$output = array(
			"draw"              => $_POST['draw'],
			"recordsTotal"      => $this->Admin_model->admin_count_all_inquire_applicants(),
			"recordsFiltered"   => $this->Admin_model->admin_count_filtered_inquire_applicants(),
			"data"              => $data,
		);

		echo json_encode($output);
	}

	/*---------------------------END FOR INQUIRE APPLICANT--------------------*/


	/*---------------------------FOR DELETED APPLICANT--------------------*/
	public function get_all_deleted_applicant_ajax(){

		$this->load->model("Admin_model");
		$this->load->helper('date');
		$is_logged_in   = $this->session->userdata('is_logged_in');
		$list   	    = $this->Admin_model->admin_all_delete_applicants();
		$data   		= array();
		$no     		= $_POST['start'];

		foreach ($list as $app) {
			$no++;
			$row = array();

			$row[]  = $app->id;
			$row[]  = $app->name;
			$row[]  = $app->encoder_name;
			$row[]  = $app->contact;
			$row[]  = $app->address;
			$row[]  = $app->email;
			$row[]  = $app->service;
			$row[]  = $app->status;
			$row[]  = $app->deleted_at;
			$row[] = '
				<a class="btn-floating waves-effect waves-light blue" onclick="restore('.$app->id.')" href="javascript:void(0)" title="restore applicant"><i class="material-icons">restore</i></a>
			';
			$data[] = $row;
		}

		$output = array(
			"draw"              => $_POST['draw'],
			"recordsTotal"      => $this->Admin_model->admin_count_all_delete_applicants(),
			"recordsFiltered"   => $this->Admin_model->admin_count_filtered_inquire_applicants(),
			"data"              => $data,
		);

		echo json_encode($output);
	}
	/*---------------------------END FOR DELETED APPLICANT--------------------*/
	public function ajax_restore_applicant($id)
    {
    	$this->load->model("Admin_model");
        $this->Admin_model->resotore_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}