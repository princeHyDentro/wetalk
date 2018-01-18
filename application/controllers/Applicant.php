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

	public function view_enrolled_applicant() {
	    $data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$data['roles']      = $this->staff_roles();
            $data['services']   = $this->staff_services();
    		$this->load->view('template/header');
			$this->load->view('sales_applicant/view_enrolled_applicant',$data);
		}	
	}
	
	public function view_inquire_applicant() {
	    $data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$data['roles']      = $this->staff_roles();
            $data['services']   = $this->staff_services();
    		$this->load->view('template/header');
			$this->load->view('sales_applicant/view_inquire_applicant',$data);
		}	
	}
	public function staff_roles(){
	   $this->load->model("Sales_model");
       $list = $this->Sales_model->_tableStafRoles();
       return $list;
    }
	
	public function staff_services(){
	   $this->load->model("Sales_model");
	   $is_logged_in    = $this->session->userdata('is_logged_in');
       $list            = $this->Sales_model->_tableStafServices($is_logged_in['user_id']);
       return $list;
    }

    /***********************************************END OF VIEW********************************/


	public function ajax_enrolled_applicant_list_data(){
		$this->load->model("Sales_model");
        $this->load->helper('date');
        
        $list   = $this->Sales_model->all_enroll_applicants();

        $data  	= array();
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
            "recordsTotal"      => $this->Sales_model->count_all_enroll_applicants(),
            "recordsFiltered"   => $this->Sales_model->count_filtered_enroll_applicants(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

    /*****************FOR INQUIRE APPLICANT*************************/

    public function ajax_inquire_applicant(){

        $this->load->model("Sales_model");
        $this->load->helper('date');

        $list   = $this->Sales_model->all_inquire_applicants();
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
            "recordsTotal"      => $this->Sales_model->count_all_inquire_applicants(),
            "recordsFiltered"   => $this->Sales_model->count_filtered_inquire_applicants(),//for entries label
            "data"              => $data,
        );
        echo json_encode($output);
    }

    /**********************END FOR INQUIRE APPLICANT*********************/
}