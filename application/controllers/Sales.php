<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

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
    public function request_for_delete_client(){
        $this->load->model("Encoder_model");
        $data           = array();
        $is_logged_in   = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $applicant_id   = $this->uri->segment(3);
            $applicant_info['applicant'] = $this->Encoder_model->applicant_info($applicant_id);
            $this->load->view('template/header');
            $this->load->view('sales_tickets/request_for_delete',$applicant_info);
        }   
    }

    public function request_for_update_client(){
        $this->load->model("Encoder_model");
        $data           = array();
        $is_logged_in   = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $applicant_id   = $this->uri->segment(3);
            $applicant_info['applicant'] = $this->Encoder_model->applicant_info($applicant_id);
            $this->load->view('template/header');
            $this->load->view('sales_tickets/request_for_update',$applicant_info);
        }   
    }

    /*****************FOR ENROLL APPLICANT*************************/
    public function sales_enroll_list(){
		$this->load->model("Sales_model");
        $this->load->helper('date');
        $is_logged_in   = $this->session->userdata('is_logged_in');
        $list   = $this->Sales_model->sales_list_of_all_enroll_applicant();

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

            if($app->approve_from_admin == 1){
                $row[] = '
                    <button class="btn waves-effect waves-light applicant-update" type="button" data-id="'.$app->id.'">Update
                    <i class="material-icons right">send</i>
                  </button>
                ';
            }elseif ($app->approve_from_admin == 2) {
                $row[] = '
                    <button class="btn waves-effect waves-light applicant-delete" type="button" data-id="'.$app->id.'">Delete
                    <i class="material-icons right">send</i>
                    </button>
                ';
            }else{
                $row[] = '
                    <div class="grouped-button"> 
                        <button class="button button-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                        <button type="button" class="button button-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"> <i class="material-icons">arrow_drop_down</i></span>  </button> 
                        <ul class="button-dropdown-menu"> 
                            <li>
                                <a href="request_for_update_client/'.$app->id.'" data-id="'.$app->id.'" for="update" class="request-button">
                                Request for Update</a>
                            </li>
                            <li>
                                <a href="request_for_delete_client/'.$app->id.'" data-id="'.$app->id.'" for="delete" class="request-button">
                                Request for Delete</a>
                            </li>
                        </ul> 
                    </div>';
            }

            $row[]  = ($is_logged_in['user_id'] == $app->requestor_ticket_id) ? $app->request_admin : "";
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
    /**********************END FOR INQUIRE APPLICANT***************/

    /*****************FOR INQUIRE APPLICANT*************************/
    public function sales_inquire_list(){

        $this->load->model("Sales_model");
        $this->load->helper('date');

        $list   = $this->Sales_model->all_inquire_list();
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

            if($app->approve_from_admin == 1){
                $row[] = '
                    <button class="btn waves-effect waves-light applicant-update" type="button" data-id="'.$app->id.'">Update
                    <i class="material-icons right">send</i>
                  </button>
                ';
            }elseif ($app->approve_from_admin == 2) {
                $row[] = '
                    <button class="btn waves-effect waves-light applicant-delete" type="button" data-id="'.$app->id.'">Delete
                    <i class="material-icons right">send</i>
                    </button>
                ';
            }else{
                $row[] = '
                    <div class="grouped-button"> 
                        <button class="button button-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                        <button type="button" class="button button-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"> <i class="material-icons">arrow_drop_down</i></span>  </button> 
                        <ul class="button-dropdown-menu"> 
                            <li>
                                <a href="request_for_delete_client/'.$app->id.'" data-id="'.$app->id.'" for="delete" class="request-button">
                                Request for Delete</a>
                            </li>
                        </ul> 
                    </div>';
            }
            $row[]  = ($is_logged_in['user_id'] == $app->requestor_ticket_id) ? $app->request_admin : "";
            $data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->Sales_model->count_all_inquire_list(),
            "recordsFiltered"   => $this->Sales_model->count_filtered_inquire_list(),//for entries label
            "data"              => $data,
        );
        echo json_encode($output);
    }
    /**********************END FOR INQUIRE APPLICANT****************/

}