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

    /*-------------------------------ENROLL TICKETS ----------------------*/
    public function encoder_pending_tickets(){
        $data           = array();
        $is_logged_in   = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $this->load->view('template/header');
            $this->load->view('encoder_tickets/pending_tickets');
        }   
    }
    public function enroll_applicant(){

        $this->load->model("Encoder_model");
        $is_logged_in   = $this->session->userdata('is_logged_in');
        $ticket_id      = $this->input->post('ticket_id');


        $data = array(
            'name'          => $this->input->post('name'),
            'contact'       => $this->input->post('contact'),
            'address'       => $this->input->post('address'),
            'email'         => $this->input->post('email'),
            'service'       => $this->input->post('service'),

            'username'       => $this->input->post('username'),
            'password'       => md5($this->input->post('password')),
            'service_id'     => $this->input->post('service_id'),
            'sales_id'       => $this->input->post('sales_id'),
            'sales_name'     => $this->input->post('sales_name'),
            'encoder_name'   => $this->input->post('encoder_name'),
            'encoder_id'     => $this->input->post('encoder_id'),
            'status'         => 'Enrolled',
        );

        $insert = $this->Encoder_model->enrolled_applicant($data);
        
        $status = array(
                'status' => 'Complete',
        );

        $this->db->where('id', $ticket_id);
        $this->db->update('encoder_assign_tickets', $status);

        echo json_encode("success");
    }
    public function update_enroll_applicant(){

        $this->load->model("Encoder_model");
        $is_logged_in   = $this->session->userdata('is_logged_in');
        $ticket_id      = $this->input->post('ticket_id');

        if($this->input->post('password') != ""){
            $data = array(
                'name'          => $this->input->post('name'),
                'contact'       => $this->input->post('contact'),
                'address'       => $this->input->post('address'),
                'email'         => $this->input->post('email'),
                'service'       => $this->input->post('service'),

                'username'      => $this->input->post('username'),
                'password'      => md5($this->input->post('password')),
                'service_id'    => $this->input->post('service_id'),
                'updated_at'    => date("Y-m-d h:i:s")
            );
        }else{
            $data = array(
                'name'          => $this->input->post('name'),
                'contact'       => $this->input->post('contact'),
                'address'       => $this->input->post('address'),
                'email'         => $this->input->post('email'),
                'service'       => $this->input->post('service'),
                'username'      => $this->input->post('username'),
                'service_id'    => $this->input->post('service_id'),
                'updated_at'    => date("Y-m-d h:i:s")
            );
        }

        $this->db->where('id', $this->input->post('applicant_id'));
        $this->db->update('applicant', $data);

        echo json_encode("success");
    }

    public function update_inquire_applicant(){

        $this->load->model("Encoder_model");
        $is_logged_in   = $this->session->userdata('is_logged_in');
        $ticket_id      = $this->input->post('ticket_id');

        if($this->input->post('password') != ""){
            $data = array(
                'name'          => $this->input->post('name'),
                'contact'       => $this->input->post('contact'),
                'address'       => $this->input->post('address'),
                'email'         => $this->input->post('email'),
                'service'       => $this->input->post('service'),
                'status'        => $this->input->post('status'),
                'username'      => $this->input->post('username'),
                'password'      => md5($this->input->post('password')),
                'service_id'    => $this->input->post('service_id'),
                'updated_at'    => date("Y-m-d h:i:s")
            );
        }else{
            $data = array(
                'name'          => $this->input->post('name'),
                'contact'       => $this->input->post('contact'),
                'address'       => $this->input->post('address'),
                'email'         => $this->input->post('email'),
                'service'       => $this->input->post('service'),
                'username'      => $this->input->post('username'),
                'service_id'    => $this->input->post('service_id'),
                'status'        => $this->input->post('status'),
                'updated_at'    => date("Y-m-d h:i:s")
            );
        }

        $this->db->where('id', $this->input->post('applicant_id'));
        $this->db->update('applicant', $data);

        echo json_encode("success");
    }
    /*-------------------------------END ENROLL TICKETS ------------------*/
	

    /*--------------------------encoder pending tickets-------------------*/
    public function ajax_all_pending_ticket_for_encoder(){
        $this->load->model("Encoder_model");
        $this->load->helper('date');
        $list   = $this->Encoder_model->all_pending_tickets();
         $data  = array();
        $no     = $_POST['start'];
        foreach ($list as $app) {
            $no++;
            $row = array();

            $row[] = $app->id;
            $row[] = $app->applicant_name;
            $row[] = $app->sales_name;
            $row[] = $app->service_name;
            $row[] = $app->status;
            $row[] = $app->created_at;

            $row[] = '
            <div class="grouped-button"> 
                <button class="button button-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                <button type="button" class="button button-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"> <i class="material-icons">arrow_drop_down</i></span>  </button> 
                <ul class="button-dropdown-menu"> 
                    <li>
                        <a href="ticket_information/'.$app->id.'" class="edit-button">
                        Open Ticket</a>
                    </li>
                </ul> 
            </div>';
            $data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->Encoder_model->count_all_enroll_tickets(),
            "recordsFiltered"   => $this->Encoder_model->count_filtered_enroll_tickets(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

    public function ticket_information() {
        $this->load->model("Encoder_model");
        $data           = array();
        $is_logged_in   = $this->session->userdata('is_logged_in');
        $ticket_id      = $this->uri->segment(3);


        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{

            $data['ticket_info'] =  $this->Encoder_model->ticket_info($ticket_id);

            $this->load->view('template/header');
            $this->load->view('encoder_tickets/ticket_information',$data);
        }   
    }
    /*------------------------end encoder pending tickets-----------------------------*/

    public function submit_ticket_to_admin(){

        $this->load->model("Encoder_model");
        $is_logged_in   = $this->session->userdata('is_logged_in');
        $ticket_id      = $this->input->post('ticket_id');


        $data = array(
            'requestor_name'  => $this->input->post('requestor_name'),
            'requestor_id'    => $this->input->post('requestor_id'),
            'service_name'    => $this->input->post('service_name'),
            'service_id'      => $this->input->post('service_id'),
            'desc'            => $this->input->post('description'),
            'reason'          => $this->input->post('reason'),
            'status'          => 'New',
            'request_for'     => $this->input->post('request_for')
        );

        $insert = $this->db->insert('admin_tickets', $data);
        if($this->input->post('request_for') == "delete"){
            $status = array(
                'request_admin' => 'Request for Delete Pending',
            );
        }else{
            $status = array(
                'request_admin' => 'Request for Update Pending',
            );  
        }
       

        $this->db->where('id', $this->input->post('applicant_id'));
        $this->db->update('applicant', $status);

        echo json_encode("success");
    }


    public function get_applicant_data(){
        $this->load->model("Encoder_model");
        $this->load->model("Sales_model");
        $data = array();
        $is_logged_in           = $this->session->userdata('is_logged_in');
        
        $applicant_id           = $this->input->post('applicant_id');
        $data['applicant_data'] = $this->Encoder_model->applicant_info($applicant_id);
        $data['services_list']  = $this->Sales_model->_tableStafServices($is_logged_in['user_id']);
        

        echo json_encode($data);
    }

    public function soft_delete_applicant_data(){
        $applicant_id = $this->input->post("applicant_id");
        $status = array(
                'deleted_at' => date("Y-m-d h:i:s"),
        );

        $this->db->where('id', $applicant_id);
        $this->db->update('applicant', $status);
    }
   


}