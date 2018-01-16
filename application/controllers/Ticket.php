<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function pending_tickets(){
		$data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
			$this->load->view('admin_tickets/pending_tickets');
		}	
	}

	public function completed_tickets(){
		$data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
			$this->load->view('admin_tickets/complete_tickets');
		}	
	}
    
    //added by jude	
	public function create_enroll_applicant() {
	    $data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$data['roles']      = $this->staff_roles();
            $data['services']   = $this->staff_services();
    		$this->load->view('template/header');
			$this->load->view('sales_tickets/create_enroll_applicant',$data);
		}	
	}
	
	public function create_inquire_applicant() {
	    $data 			= array();
		$is_logged_in 	= $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$data['roles']      = $this->staff_roles();
            $data['services']   = $this->staff_services();
    		$this->load->view('template/header');
			$this->load->view('sales_tickets/create_inquire_applicant',$data);
		}	
	}
	
	public function ajax_enroll_applicant_list_data_ticket(){
		$this->load->model("Sales_model");
        $this->load->helper('date');
        $list   = $this->Sales_model->get_datatables_enroll_tickets();

        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $app) {
            $no++;
            $row = array();

            $row[] = $app->id;
            $row[] = $app->encoder_name;
            $row[] = $app->service_name;
            $row[] = $app->status;
            $row[] = $app->created_at;
            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->Sales_model->count_all_enroll_tickets(),
            "recordsFiltered"   => $this->Sales_model->count_filtered_enroll_tickets(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }
	
	public function ajax_inquire_applicant_list_data(){
		$this->load->model("Sales_model");
        $this->load->helper('date');
        $list   = $this->Sales_model->get_datatables_inquire();

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
            $row[] = $app->service;
            $row[] = $app->status;
          
            //add html for action
            //$row[] = '<a class="btn-floating waves-effect waves-light blue" onclick="edit_person('."'".$app->id."'".')" href="javascript:void(0)" title="Edit" ><i class="material-icons">edit</i></a> <a class="btn-floating waves-effect waves-light red" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$app->id."'".')"><i class="material-icons">delete</i></a>';
            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->Sales_model->count_all_enroll(),
            "recordsFiltered"   => $this->Sales_model->count_filtered_enroll(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }
	
	public function staff_services(){
	   $this->load->model("Sales_model");
       $is_logged_in    = $this->session->userdata('is_logged_in');
       $list            = $this->Sales_model->_tableStafServices($is_logged_in['user_id']);
       return $list;
    }

    public function get_encoder(){
        $this->load->model("Sales_model");
        $service_id = $this->input->post('service_id');
        $list       = $this->Sales_model->_tableGetServices($service_id);
        echo  json_encode($list);
    }

    public function staff_roles(){
	   $this->load->model("Sales_model");
       $list = $this->Sales_model->_tableStafRoles();
       return $list;
    }
	
	public function ajax_add_enroll_ticket(){
        $this->load->model("Sales_model");
        $is_logged_in = $this->session->userdata('is_logged_in');
        // print_r($_POST);
        // $this->_validate();

        $data = array(
            'sales_id'       => $this->input->post('sale-id'),
            'encoder_id'     => $this->input->post('encoder-id'),
            'service_id'     => $this->input->post('services_id'),
            'encoder_name'   => $this->input->post('encoder-name'),
            'sales_name'     => $this->input->post('sales-name'),
            'service_name'   => $this->input->post('services_name'),
            'status'         => "Pending",
            'applicant_data' => $this->input->post('ticket-format')
        );

       $insert = $this->Sales_model->save_ticket($data);

       // echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_add_inquire(){
        $this->load->model("Sales_model");
        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->_validate_inquire();

        $data = array(
            'name'          => $this->input->post('name'),
            'contact'       => $this->input->post('contact'),
            'address'       => $this->input->post('address'),
            'email'         => $this->input->post('email'),
            'service'       => $this->input->post('service'),
            'status'        => 'inquire',
        );

       $insert = $this->Sales_model->save($data);
        
        /*// service assign to staff
        foreach ($this->input->post('services') as $key => $value) {
            if($value['primary_id'] == ""){
                $this->db->set('_userID', $insert);
                $this->db->set('service_id', $value['service_id']);
                $this->db->insert('assign_staff_service');
            }
        } */

        echo json_encode(array("status" => TRUE));
    }
	
	private function _validate(){
		
        $data = array();
        $data['error_string']   = array();
        $data['inputerror']     = array();
        $data['status']         = TRUE;
        
        if($this->input->post('name') == '')
        {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'Name is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('contact') == '')
        {
            $data['inputerror'][] = 'contact';
            $data['error_string'][] = 'Contact is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('address') == '')
        {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Address is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('username') == '')
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'Username is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('password') == '')
        {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'Password is required';
            $data['status'] = FALSE;
        }
        
        
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
	
	private function _validate_inquire(){
		
        $data = array();
        $data['error_string']   = array();
        $data['inputerror']     = array();
        $data['status']         = TRUE;
        
        if($this->input->post('name') == '')
        {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'Name is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('contact') == '')
        {
            $data['inputerror'][] = 'contact';
            $data['error_string'][] = 'Contact is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('address') == '')
        {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Address is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }
        
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}