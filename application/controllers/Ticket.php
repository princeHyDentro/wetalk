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

    public function ticket_complete_information(){
        $this->load->model("Admin_model");
        $data           = array();
        $is_logged_in   = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $ticket_id   = $this->uri->segment(3);
            $ticket_info['ticket'] = $this->Admin_model->applicant_info($ticket_id);
            $this->load->view('template/header');
            $this->load->view('admin_tickets/ticket_complete_information',$ticket_info);
        }   
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
        $requestor_id   = $this->input->post('requestor_ticket_id');

        $dl_at  = array(
                            'deleted_at' => date("Y-m-d h:i:s"),
                        );

        $this->db->where('applicant_id' , $this->input->post('applicant_id'));
        $this->db->where('requestor_id' , $requestor_id);
        $this->db->where('deleted_at'   , NULL);
        $this->db->update('stream_notification_callback', $dl_at);


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

        $ticket_data  = array(
                            'requestor_ticket_id' => NULL,
                            'approve_from_admin' => NULL,
                            'request_admin' => NULL,
                        );

        $this->db->where('id', $this->input->post('applicant_id'));
        $this->db->update('applicant', $ticket_data);

        echo json_encode("success");
    }

    public function update_inquire_applicant(){

        $this->load->model("Encoder_model");
        $is_logged_in   = $this->session->userdata('is_logged_in');
        $ticket_id      = $this->input->post('ticket_id');
        $requestor_id   = $this->input->post('requestor_ticket_id');

        $dl_at  = array(
                            'deleted_at' => date("Y-m-d h:i:s"),
                        );

        $this->db->where('applicant_id' , $this->input->post('applicant_id'));
        $this->db->where('requestor_id' , $requestor_id);
        $this->db->where('deleted_at'   , NULL);
        $this->db->update('stream_notification_callback', $dl_at);

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

        $ticket_data  = array(
                            'requestor_ticket_id' => NULL,
                            'approve_from_admin' => NULL,
                            'request_admin' => NULL,
                        );
        
        $this->db->where('id', $this->input->post('applicant_id'));
        $this->db->update('applicant', $ticket_data);

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

    /*administrator pending tickets*/
    public function stream_notification_callback(){

        $this->load->model("Admin_model");

        $approval_text      = $this->input->post('approval_text');
        $applicant_id       = $this->input->post('applicant_id');
        $requestor_id       = $this->input->post('requestor_id');
        $ticket_id          = $this->input->post('ticket_id');
        $approval_type      = $this->input->post('approval_type');
        $request_for_type   = $this->input->post('request_for_type');

        $insert                 = array(
                                    'ticket_id'     =>  $ticket_id,
                                    'requestor_id'  =>  $requestor_id,
                                    'applicant_id'  =>  $applicant_id,
                                    'approval_text' =>  $approval_text,
                                    'approval_type' =>  $approval_type,
                                    'request_for_type' => $request_for_type
                                    );

        if($approval_type == "Approved"){
            if($request_for_type == 'delete'){
                $update_applicant = array(
                                    'approve_from_admin' => 2 ,
                                    'request_admin'      => 'Approved'
                                    );
            }else{
                $update_applicant = array(
                                    'approve_from_admin' => 1 ,
                                    'request_admin'      => 'Approved'
                                    );
            }
           
        }else{

            $update_applicant       = array(
                                    'requestor_ticket_id' => NULL,
                                    'approve_from_admin'  => NULL ,
                                    'request_admin'       => 'Declined'
                                    );
        }
       
        $admin_ticket_status   = array(
                                    'status' => 'Complete' ,
                                    );

        $this->Admin_model->insert_admin_notification($insert);
        $this->Admin_model->update_applicant_ticket($applicant_id , $requestor_id, $update_applicant);
        $this->Admin_model->update_admin_ticket_status($ticket_id, $admin_ticket_status);
        
        echo json_encode("success");
    }

    public function pg_get_notify(){
        $this->load->model("Admin_model");
        $requestor_id    = $this->input->post('requestor_id');

        $notify          = $this->Admin_model->notify_status($requestor_id);
        echo json_encode($notify);
    }

    public function administrator_reason(){
        $this->load->model("Admin_model");
        $administrator_reason = $this->uri->segment(2);
        $id = $this->uri->segment(3);

        $data           = array();
        $is_logged_in   = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            if($administrator_reason == 'administrator_reason'){

                $data   = array(
                            'deleted_at' => date("Y-m-d h:i:s") ,
                        );
                $this->Admin_model->update_administrator_reason($id, $data);
            }

            $data['reason'] = $this->Admin_model->get_administrator_reason($id);
            $this->load->view('template/header');
            $this->load->view('ticket_reason/administrator_ticket_reason', $data);
        }   

        
    }

    public function ajax_all_pending_ticket_for_administrator(){
        $this->load->model("Admin_model");
        $this->load->helper('date');
        $list   = $this->Admin_model->all_pending_tickets();
         $data  = array();
        $no     = $_POST['start'];
        foreach ($list as $app) {
            $no++;
            $row = array();

            $row[] = $app->id;
            $row[] = $app->requestor_name;
            $row[] = $app->service_name;
            $row[] = '<a href="ticket_complete_information/'.$app->id.'" ><u>'.$app->applicant_name.'</u></a>';
            $row[] = $app->desc;
            $row[] = $app->status;
            $row[] = $app->request_for;
            $row[] = $app->created_at;

            $row[] = '
            <div class="grouped-button"> 
                <button class="button button-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                <button type="button" class="button button-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"> <i class="material-icons">arrow_drop_down</i></span>  </button>
                <ul class="button-dropdown-menu"> 
                    <li>
                        <a href="#" request-for="'.$app->request_for.'" ticket-id="'.$app->id.'" requestor-id="'.$app->requestor_id.'" applicant-id="'.$app->applicant_id.'" class="approve-button">Aprrove Ticket</a>
                    </li>
                    <li>
                        <a href="#" request-for="'.$app->request_for.'" ticket-id="'.$app->id.'" requestor-id="'.$app->requestor_id.'" applicant-id="'.$app->applicant_id.'"  class="decline-button">Decline Ticket</a>
                    </li>
                </ul> 
            </div>';

            $data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->Admin_model->count_all_enroll_tickets(),
            "recordsFiltered"   => $this->Admin_model->count_filtered_enroll_tickets(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

    public function ajax_all_complete_ticket_for_administrator(){
        $this->load->model("Admin_model");
        $this->load->helper('date');
        $list   = $this->Admin_model->all_complete_tickets();
         $data  = array();
        $no     = $_POST['start'];
        foreach ($list as $app) {
            $no++;
            $row = array();

            $row[] = $app->id;
            $row[] = $app->requestor_name;
            $row[] = $app->service_name;
            $row[] = '<a href="ticket_complete_information/'.$app->id.'" ><u>'.$app->applicant_name.'</u></a>';
            $row[] = $app->desc;
            $row[] = $app->status;
            $row[] = $app->request_for;
            $row[] = $app->created_at;

            $row[] = ' <div class="grouped-button"> 
                <button class="button button-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                <button type="button" class="button button-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"> <i class="material-icons">arrow_drop_down</i></span>  </button> 
                <ul class="button-dropdown-menu"> 
                    <li>
                        <a href="#" request-for="'.$app->request_for.'" ticket-id="'.$app->id.'" requestor-id="'.$app->requestor_id.'" applicant-id="'.$app->applicant_id.'" class="change-status">
                        Change status to In progress</a>
                    </li>
                </ul> 
            </div>';

            $data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->Admin_model->count_all_complete_tickets(),
            "recordsFiltered"   => $this->Admin_model->count_filtered_complete_tickets(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

    /*end*/
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
            'request_for'     => $this->input->post('request_for'),
            'applicant_id'    => $this->input->post('applicant_id'),
            'applicant_name'  => $this->input->post('applicant_name')
        );

        $insert = $this->db->insert('admin_tickets', $data);
        if($this->input->post('request_for') == "delete"){
            $status = array(
                'request_admin'     => 'Request for Delete Pending',
                'requestor_ticket_id' => $is_logged_in['user_id']
            );
        }else{
            $status = array(
                'request_admin'     => 'Request for Update Pending',
                'requestor_ticket_id' => $is_logged_in['user_id']
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
        $applicant_id   = $this->input->post("applicant_id");
        $requestor_id   = $this->input->post('requestor_ticket_id');

        $dl_at  = array(
                            'deleted_at' => date("Y-m-d h:i:s"),
                        );

        $this->db->where('applicant_id' , $applicant_id);
        $this->db->where('requestor_id' , $requestor_id);
        $this->db->where('deleted_at'   , NULL);
        $this->db->update('stream_notification_callback', $dl_at);
        
        $status = array(
                'deleted_at' => date("Y-m-d h:i:s"),
        );

        $this->db->where('id', $applicant_id);
        $this->db->update('applicant', $status);

        $ticket_data  = array(
                            'requestor_ticket_id' => NULL,
                            'approve_from_admin' => NULL,
                            'request_admin' => NULL,
                        );
        
        $this->db->where('id', $applicant_id);
        $this->db->update('applicant', $ticket_data);
    }

    public function roll_back_ticket(){
        $ticket_id      = $this->input->post("ticket_id");
        $applicant_id   = $this->input->post("applicant_id");
        $requestor_id   = $this->input->post("requestor_id");
        $request_for    = $this->input->post("request_for");

        $status = array(
                'status' => 'In progress',
        );

        $this->db->where('id', $ticket_id);
        $this->db->update('admin_tickets', $status);


        $ticket_data  = array(
                            'requestor_ticket_id' => $requestor_id,
                            'approve_from_admin' => NULL,
                            'request_admin' => ($request_for == 'delete') ? 'Request for Delete Pending' : 'Request for Update Pending',
                        );
        
        $this->db->where('id', $applicant_id);
        $this->db->update('applicant', $ticket_data);

        echo json_encode("success");
    }

}