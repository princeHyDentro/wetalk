<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encoder extends CI_Controller {

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
			$this->load->view('encoder_applicant/view_enrolled_applicant');
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
			$this->load->view('encoder_applicant/view_inquire_applicant');
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
	
	//added by judell
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
	
	public function ajax_enrolled_applicant_list_data(){
		$this->load->model("Encoder_model");
        $this->load->helper('date');
        $list   = $this->Encoder_model->get_datatables_enroll();

        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $app) {
            $no++;
            $row = array();

            $row[] = $app->id;
            $row[] = $app->name;//$person->user_fname.' '.$person->lname.' '.$person->lname;
            $row[] = $app->contact;
            $row[] = $app->address;
            $row[] = $app->email;
           /* $row[] = $app->service;*/
            $row[] = $app->status;
          /*  $row[] = $app->username;
            $row[] = $app->password; */
          
            //add html for action
            //$row[] = '<a class="btn-floating waves-effect waves-light blue" onclick="edit_person('."'".$app->id."'".')" href="javascript:void(0)" title="Edit" ><i class="material-icons">edit</i></a> <a class="btn-floating waves-effect waves-light red" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$app->id."'".')"><i class="material-icons">delete</i></a>';
            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->Encoder_model->count_all_enroll(),
            "recordsFiltered"   => $this->Encoder_model->count_filtered_enroll(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }
	
	public function ajax_inquire_applicant_list_data(){
		$this->load->model("Encoder_model");
        $this->load->helper('date');
        $list   = $this->Encoder_model->get_datatables_inquire();

        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $app) {
            $no++;
            $row = array();

            $row[] = $app->id;
            $row[] = $app->name;//$person->user_fname.' '.$person->lname.' '.$person->lname;
            $row[] = $app->contact;
            $row[] = $app->address;
            $row[] = $app->email;
           /* $row[] = $app->service; */
            $row[] = $app->status; 
          
            //add html for action
            //$row[] = '<a class="btn-floating waves-effect waves-light blue" onclick="edit_person('."'".$app->id."'".')" href="javascript:void(0)" title="Edit" ><i class="material-icons">edit</i></a> <a class="btn-floating waves-effect waves-light red" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$app->id."'".')"><i class="material-icons">delete</i></a>';
            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->Encoder_model->count_all_inquire(),
            "recordsFiltered"   => $this->Encoder_model->count_filtered_inquire(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }
	
	 public function staff_roles(){
	   $this->load->model("Encoder_model");
       $list = $this->Encoder_model->_tableStafRoles();
       return $list;
    }
	
	public function staff_services(){
	   $this->load->model("Encoder_model");
       $list = $this->Encoder_model->_tableStafServices();
       return $list;
    }


}