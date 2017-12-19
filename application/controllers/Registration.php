<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration_model','users');
    }

    public function deleted_at(){
        return date("Y-m-d h:i:sa");
    }

    public function updated_at(){
        return date("Y-m-d h:i:sa");
    }

    public function staff()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $data['roles']      = $this->staff_roles();
            $data['services']   = $this->staff_services();
           // print_r($data);
            $this->load->view('template/header');
            $this->load->view('template/head_left_nav');
            $this->load->view('registration/registration_form',$data);
            $this->load->view('template/footer');
        }
    }

    public function deleted_staff(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $this->load->view('template/header');
            $this->load->view('template/head_left_nav');
            $this->load->view('registration/staff_deleted');
            $this->load->view('template/footer');
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
            $row[] = '<center><a class="btn-floating waves-effect waves-light blue" onclick="restore_person('."'".$person->id."'".')" href="javascript:void(0)" title="restore staff" ><i class="material-icons">restore</i></a></center>';
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

    public function ajax_list_data(){
        $this->load->helper('date');
        $list   = $this->users->get_datatables('');

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

    public function ajax_edit($id)
    {
        $data = $this->users->get_by_id($id);
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
           // 'updated_at'    => date("Y-m-d h:i:sa")
        );

       $insert = $this->users->save($data);
        // service assign to staff

        //print_r($this->input->post('services'));
         
        foreach ($this->input->post('services') as $key => $value) {
            //print_r($value['primary_id']);
            if($value['primary_id'] == ""){
                $this->db->set('_userID', $insert);
                $this->db->set('service_id', $value['service_id']);
                $this->db->insert('assign_staff_service');
            }
        }


        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update(){

        $data = array(
            'fname'     => $this->input->post('user_fname'),
            'lname'     => $this->input->post('user_lname'),
            'middle'    => $this->input->post('user_mname'),
            'username'  => $this->input->post('user_username'),
            'full_name' => $this->input->post('user_fname').' '.$this->input->post('user_mname').' '.$this->input->post('user_lname'),
            'password'  => ($this->input->post('user_password') == "") ? "" : md5($this->input->post('user_password')),
            'email'     => $this->input->post('user_email'),
            'roles'     => $this->input->post('permission'),
            'updated_at'=> date("Y-m-d h:i:sa")
        );

        foreach ($this->input->post('unselected_service') as $key => $value) {
            if($value['service_id'] != "" && $value['primary_id']){
                $this->db->where('id', $value['primary_id']);
                $this->db->delete('assign_staff_service'); 
            }
        }

        foreach ($this->input->post('services') as $key => $value) {
            if($value['primary_id'] == ""){
                $this->db->set('_userID', $insert);
                $this->db->set('service_id', $value['service_id']);
                $this->db->insert('assign_staff_service');
            }
        }

        // print_r($this->input->post('unselected_service'));
        // print_r($this->input->post('services'));
        // exit;

        $this->users->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->users->delete_by_id($id);
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