<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_ticket extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function staff_roles(){
	   $this->load->model("Sales_ticket_model");
       $list = $this->Sales_ticket_model->_tableStafRoles();
       return $list;
    }

    public function staff_services(){
	   $this->load->model("Sales_ticket_model");
       $is_logged_in    = $this->session->userdata('is_logged_in');
       $list            = $this->Sales_ticket_model->_tableStafServices($is_logged_in['user_id']);
       return $list;
    }

    public function get_encoder(){
        $this->load->model("Sales_ticket_model");
        $service_id = $this->input->post('service_id');
        $list       = $this->Sales_ticket_model->_tableGetServices($service_id);
        echo  json_encode($list);
    }

	public function create_enroll_applicant_ticket() {
        $data           = array();
        $is_logged_in   = $this->session->userdata('is_logged_in');

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

    public function sales_ticket_for_enroll(){
            
        $this->load->model("Sales_ticket_model");
        $this->load->helper('date');

        $list   = $this->Sales_ticket_model->get_datatables_enroll_tickets();

        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $app) {
            $no++;
            $row = array();

            $row[] = $app->id;
            $row[] = $app->applicant_name;
            $row[] = $app->encoder_name;
            $row[] = $app->service_name;
            $row[] = $app->status;
            $row[] = $app->created_at;
            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->Sales_ticket_model->count_all_enroll_tickets(),
            "recordsFiltered"   => $this->Sales_ticket_model->count_filtered_enroll_tickets(),//for entries label
            "data"              => $data,
        );
        echo json_encode($output);
    }

    public function ajax_add_enroll_ticket(){
        $this->load->model("Sales_ticket_model");
        $is_logged_in = $this->session->userdata('is_logged_in');

        $data = array(
            'sales_id'       => $this->input->post('sale-id'),
            'encoder_id'     => $this->input->post('encoder-id'),
            'service_id'     => $this->input->post('services_id'),
            'encoder_name'   => $this->input->post('encoder-name'),
            'sales_name'     => $this->input->post('sales-name'),
            'service_name'   => $this->input->post('services_name'),
            'status'         => "Pending",
            'applicant_data' => $this->input->post('ticket-format'),
            'applicant_name' => $this->input->post('applicant-name')
        );

       $insert = $this->Sales_ticket_model->save_ticket($data);
       echo json_encode("success");
    }

    /****************************************end of enroll ticket*******************************/

    public function create_inquire_applicant() {
        $data           = array();
        $is_logged_in   = $this->session->userdata('is_logged_in');

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

    public function ajax_inquire_applicant_tickets(){

        $this->load->model("Sales_ticket_model");
        $this->load->helper('date');
        $list   = $this->Sales_ticket_model->get_datatables_inquire();

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
            "recordsTotal"      => $this->Sales_ticket_model->count_all_inquire_applicants(),
            "recordsFiltered"   => $this->Sales_ticket_model->count_filtered_inquire_applicants(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

    public function ajax_add_inquire(){
    	$this->load->model("Sales_ticket_model");
    	$is_logged_in = $this->session->userdata('is_logged_in');
		// print_r($is_logged_in);
    	$data = array(
    		'name'          => $this->input->post('name'),
    		'contact'       => $this->input->post('contact'),
    		'address'       => $this->input->post('address'),
    		'email'         => $this->input->post('email'),
    		'service_id'    => $this->input->post('service'),
    		'service'       => $this->input->post('service_name'),
    		'sales_name'    => $is_logged_in['user_full_name'],
    		'sales_id'      => $is_logged_in['user_id'],
    		'status'        => 'Inquired',
    	);

    	$insert = $this->Sales_ticket_model->save_inquire_tickets($data);
    	echo json_encode(array("status" => TRUE));
    }


}