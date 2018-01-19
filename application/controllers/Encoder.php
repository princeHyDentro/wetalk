<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encoder extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
	}
	/*---------------------------FOR ENROLLED APPLICANT--------------------*/
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

	public function ajax_enrolled_applicant_list_for_encoder(){

		$this->load->model("Encoder_model");
		$this->load->helper('date');

        $list   = $this->Encoder_model->all_enroll_applicants();
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

            $row[] = '
            <div class="grouped-button"> 
                <button class="button button-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                <button type="button" class="button button-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"> <i class="material-icons">arrow_drop_down</i></span>  </button> 
                <ul class="button-dropdown-menu"> 
                    <li>
                        <a href="#" class="edit-button">
                        Request for Update</a>
                    </li>
                    <li>
                        <a href="#" class="edit-button">
                        Request for Delete</a>
                    </li>
                </ul> 
            </div>';

            $data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->Encoder_model->count_all_enroll_applicants(),
            "recordsFiltered"   => $this->Encoder_model->count_filtered_enroll_applicants(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
	}

	/*---------------------------END FOR ENROLLED APPLICANT--------------------*/


	/*---------------------------FOR INQUIRE APPLICANT--------------------*/

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

	public function ajax_inquire_applicant_list_for_encoder(){

		$this->load->model("Encoder_model");
		$this->load->helper('date');

        $list   = $this->Encoder_model->all_inquire_applicants();
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
            "recordsTotal"      => $this->Encoder_model->count_all_inquire_applicants(),
            "recordsFiltered"   => $this->Encoder_model->count_filtered_inquire_applicants(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
	}

	/*---------------------------END FOR INQUIRE APPLICANT--------------------*/
}