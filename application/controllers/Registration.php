<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration_model','users');
        $this->load->model('sales_model','applicant');
    }

    public function deleted_at(){
        return date("Y-m-d h:i:sa");
    }

    public function updated_at(){
        return date("Y-m-d h:i:sa");
    }

    public function create_staff()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $data['roles']      = $this->staff_roles();
            $data['services']   = $this->staff_services();
            $this->load->view('template/header');
            $this->load->view('registration/registration_form',$data);
        }
    }

    public function view_staff()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $data['roles']      = $this->staff_roles();
            $data['services']   = $this->staff_services();
            $this->load->view('template/header');
            $this->load->view('registration/view_list_of_staff',$data);
        }
    }
	
	 public function sales()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $data['roles']      = $this->staff_roles();
            $data['services']   = $this->staff_services();
            $this->load->view('template/header');
            $this->load->view('registration/sales_form',$data);
        }
    }

    public function deleted_staff(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $this->load->view('template/header');
            $this->load->view('registration/staff_deleted');
        }
    }

    public function staff_services(){
       $list = $this->users->_tableStafServices();
       return $list;
    }

    public function staff_roles(){
       $list = $this->users->_tableStafRoles();
       return $list;
    }

    public function ajax_list_dl_data(){
        $this->load->helper('date');
        $list   = $this->users->get_dl_datatables();

        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();

            $row[] = $person->id;
            $row[] = $person->full_name;//$person->user_fname.' '.$person->lname.' '.$person->lname;
            $row[] = $person->username;
            $row[] = $person->email;
            $row[] = $person->roles;
            $row[] =  nice_date($person->deleted_at, 'Y-m-d');
            //add html for action
            $row[] = '<center><a class="btn-floating waves-effect waves-light blue" onclick="restore('."'".$person->id."'".')" href="javascript:void(0)" title="restore staff" ><i class="material-icons">restore</i></a></center>';
            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->users->count_all(),
            "recordsFiltered"   => $this->users->dl_count_filtered(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

     public function ajax_list_of_staff(){
        $this->load->helper('date');
        $list   = $this->users->get_datatables();

        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();

            $row[] = $person->id;
            $row[] = $person->full_name;
            $row[] = $person->username;
            $row[] = $person->email;
            $row[] = $person->roles;
            $row[] =  nice_date($person->created_at, 'Y-m-d');
            $row[] =  ($person->updated_at != NULL) ? nice_date($person->updated_at, 'Y-m-d') : '';


            //add html for action
            $row[] = '<a class="btn-floating waves-effect waves-light blue" onclick="edit_person('."'".$person->id."'".')" href="javascript:void(0)" title="Edit" ><i class="material-icons">edit</i></a> <a class="btn-floating waves-effect waves-light red" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->id."'".')"><i class="material-icons">delete</i></a>';
            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->users->count_all(),
            "recordsFiltered"   => $this->users->count_filtered(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

    public function ajax_list_data(){
        $this->load->helper('date');
        $list   = $this->users->get_datatables();

        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();

            $row[] = $person->id;
            $row[] = $person->full_name;//$person->user_fname.' '.$person->lname.' '.$person->lname;
            $row[] = $person->username;
            $row[] = $person->email;
            $row[] = $person->roles;
            $row[] =  nice_date($person->created_at, 'Y-m-d');
            $row[] =  ($person->updated_at != NULL) ? nice_date($person->updated_at, 'Y-m-d') : '';


            //add html for action
            // $row[] = '<a class="btn-floating waves-effect waves-light blue" onclick="edit_person('."'".$person->id."'".')" href="javascript:void(0)" title="Edit" ><i class="material-icons">edit</i></a> <a class="btn-floating waves-effect waves-light red" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->id."'".')"><i class="material-icons">delete</i></a>';
            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->users->count_all(),
            "recordsFiltered"   => $this->users->count_filtered(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }
	
	public function ajax_sales_list_data(){
        $this->load->helper('date');
        $list   = $this->applicant->get_datatables();

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
            $row[] = $app->status	;
            $row[] = $app->username;
            $row[] = $app->password;
          
            //add html for action
            $row[] = '<a class="btn-floating waves-effect waves-light blue" onclick="edit_person('."'".$app->id."'".')" href="javascript:void(0)" title="Edit" ><i class="material-icons">edit</i></a> <a class="btn-floating waves-effect waves-light red" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$app->id."'".')"><i class="material-icons">delete</i></a>';
            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->applicant->count_all(),
            "recordsFiltered"   => $this->applicant->count_filtered(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->users->get_by_id($id);
        echo json_encode($data);
    }
	
	public function ajax_edit_sales($id)
    {
        $data = $this->applicant->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add(){

        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->_validate();

        $data = array(
            'fname'         => $this->input->post('user_fname'),
            'lname'         => $this->input->post('user_lname'),
            'middle'        => $this->input->post('user_mname'),
            'full_name'     => $this->input->post('user_fname').' '.$this->input->post('user_mname').' '.$this->input->post('user_lname'),
            'username'      => $this->input->post('user_username'),
            'password'      => md5($this->input->post('user_password')),
            'email'         => $this->input->post('user_email'),
            'roles'         => $this->input->post('permission'),
            'created_by'    => $is_logged_in['user_id'],
            'type_of_user'  => 'staff'
           //updated_at'    => date("Y-m-d h:i:sa")
        );

       $insert = $this->users->save($data);
        
        // service assign to staff
        foreach ($this->input->post('services') as $key => $value) {
            if($value['primary_id'] == ""){
                $this->db->set('_userID', $insert);
                $this->db->set('service_id', $value['service_id']);
                $this->db->insert('assign_staff_service');
            }
        }

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_add_all(){

        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->_validate();

        $data = array(
            'fname'         => $this->input->post('user_fname'),
            'lname'         => $this->input->post('user_lname'),
            'middle'        => $this->input->post('user_mname'),
            'full_name'     => $this->input->post('user_fname').' '.$this->input->post('user_mname').' '.$this->input->post('user_lname'),
            'username'      => $this->input->post('user_username'),
            'password'      => md5($this->input->post('user_password')),
            'email'         => $this->input->post('user_email'),
            'roles'         => $this->input->post('permission'),
            'created_by'    => $is_logged_in['user_id'],
            'type_of_user'  => 'staff'
           //updated_at'    => date("Y-m-d h:i:sa")
        );

       $insert = $this->users->save($data);
        
        // service assign to staff

        $this->db->set('_userID', $insert);
        $this->db->set('admin', "all");
        $this->db->insert('assign_staff_service');


        echo json_encode(array("status" => TRUE));
    }
    
	
	public function ajax_add_sales(){

        $is_logged_in = $this->session->userdata('is_logged_in');
        //$this->_validate();

        $data = array(
            'name'       => $this->input->post('name'),
            'contact'    => $this->input->post('contact'),
            'address'    => $this->input->post('address'),
            'email'      => $this->input->post('email'),
            'service'    => $this->input->post('service'),
            'username'   => md5($this->input->post('username')),
            'password'   => $this->input->post('password'),
            'status'     => $this->input->post('status'),
			'date'       => date("Y-m-d h:i:s")
        );

       $insert = $this->applicant->save($data);
        
       echo json_encode(array("status" => TRUE));
    }

    public function ajax_update(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if($this->input->post('user_password') != ""){
            $data = array(
                'fname'         => $this->input->post('user_fname'),
                'lname'         => $this->input->post('user_lname'),
                'middle'        => $this->input->post('user_mname'),
                'full_name'     => $this->input->post('user_fname').' '.$this->input->post('user_mname').' '.$this->input->post('user_lname'),
                'username'      => $this->input->post('user_username'),
                'password'      => md5($this->input->post('user_password')),
                'email'         => $this->input->post('user_email'),
                'roles'         => $this->input->post('permission'),
                'updated_at'    => date("Y-m-d h:i:s")
            );
        }else{
            $data = array(
                'fname'         => $this->input->post('user_fname'),
                'lname'         => $this->input->post('user_lname'),
                'middle'        => $this->input->post('user_mname'),
                'full_name'     => $this->input->post('user_fname').' '.$this->input->post('user_mname').' '.$this->input->post('user_lname'),
                'username'      => $this->input->post('user_username'),
                'email'         => $this->input->post('user_email'),
                'roles'         => $this->input->post('permission'),
                'updated_at'    => date("Y-m-d h:i:s")
            );
        }
        

       $this->users->update(array('id' => $this->input->post('id')), $data);

   
        foreach ($this->input->post('unselected_service') as $key => $value) {
            if($value['service_id'] != "" && $value['primary_id'] != ""){
                $this->db->where('id', $value['primary_id']);
                $this->db->delete('assign_staff_service'); 
            }
        }

        //print_r($this->input->post('unselected_service'));
        foreach ($this->input->post('services') as $key => $value) {
            if($value['primary_id'] == ""){
                $this->db->set('_userID',$this->input->post('id'));
                $this->db->set('service_id', $value['service_id']);
                $this->db->insert('assign_staff_service');
            }
        }

        //   print_r($this->input->post('services'));
        //   exit;

        
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_update_sales(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        
            $data = array(
                'name'          => $this->input->post('name'),
                'contact'       => $this->input->post('contact'),
                'email'         => $this->input->post('email'),
                'address'       => $this->input->post('address'),
                'service'       => $this->input->post('service'),
                'status'        => $this->input->post('status'),
                'username'      => $this->input->post('username'),
                'password'      => $this->input->post('password')
            );
      
       $this->applicant->update(array('id' => $this->input->post('id')), $data);
      
        echo json_encode(array("status" => TRUE));
    }
	
    public function ajax_delete($id)
    {
        $this->users->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_delete_sales($id)
    {
        $this->applicant->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
	
    public function ajax_restore($id)
    {
        $this->users->resotore_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate(){
        $data = array();
        $data['error_string']   = array();
        $data['inputerror']     = array();
        $data['status']         = TRUE;
        
        if($this->input->post('user_fname') == '')
        {
            $data['inputerror'][] = 'user_fname';
            $data['error_string'][] = 'First name is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('user_lname') == '')
        {
            $data['inputerror'][] = 'user_lname';
            $data['error_string'][] = 'Last name is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('user_username') == '')
        {
            $data['inputerror'][] = 'user_username';
            $data['error_string'][] = 'Username is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('user_password') == '')
        {
            $data['inputerror'][] = 'user_password';
            $data['error_string'][] = 'Password is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('user_email') == '')
        {
            $data['inputerror'][] = 'user_email';
            $data['error_string'][] = 'Email address is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('permission') == '')
        {
            $data['inputerror'][] = 'permission';
            $data['error_string'][] = 'Permission is required';
            $data['status'] = FALSE;
        }
        
        
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}