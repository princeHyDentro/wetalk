<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration_model','users');
    }

    public function employee_registration_form()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $data['employee_result'] = $this->get_employee_data();

            $this->load->view('template/header');
            $this->load->view('registration/registration_form',$data);
            $this->load->view('template/footer');
        }
    }
    public function get_employee_data(){
       $list = $this->users->employees_table();
       return $list;
   }

   public function ajax_list_data()
   {
    $list = $this->users->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $person) {
        $no++;
        $row = array();
        $row[] = $person->user_id;
        $row[] = $person->user_fname;
        $row[] = $person->user_lname;
        $row[] = $person->user_mname;
        $row[] = $person->user_username;
        $row[] = $person->user_email;
        $row[] = $person->user_rights;
        $row[] = $person->user_datecreated;
        $row[] = $person->user_updateddate;
        
            //add html for action
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->user_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
        $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->user_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
        $data[] = $row;
    }
    
    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->users->count_all(),
        "recordsFiltered" => $this->users->count_filtered(),
        "data" => $data,
    );
        //output to json format
    echo json_encode($output);
}

public function ajax_edit($id)
{
    $data = $this->users->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
}

public function ajax_add()
{
    $this->_validate();
    $data = array(
        'user_fname' => $this->input->post('user_fname'),
        'user_lname' => $this->input->post('user_lname'),
        'user_mname' => $this->input->post('user_mname'),
        'user_username' => $this->input->post('user_username'),
        'user_password' => md5($this->input->post('user_password')),
        'user_email' => $this->input->post('user_email'),
        'user_rights' => $this->input->post('permission'),
                // 'dob' => $this->input->post('dob'),
    );
    $insert = $this->users->save($data);
    echo json_encode(array("status" => TRUE));
}

public function ajax_update()
{
        //$this->_validate();
    $data = array(
        'user_fname' => $this->input->post('user_fname'),
        'user_lname' => $this->input->post('user_lname'),
        'user_mname' => $this->input->post('user_mname'),
        'user_username' => $this->input->post('user_username'),
        'user_password' => ($this->input->post('user_password') == "") ? "" : md5($this->input->post('user_password')),
        'user_email' => $this->input->post('user_email'),
        'user_rights' => $this->input->post('permission'),
    );
    $this->users->update(array('user_id' => $this->input->post('id')), $data);
    echo json_encode(array("status" => TRUE));
}

public function ajax_delete($id)
{
    $this->users->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}


private function _validate()
{
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;
    
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