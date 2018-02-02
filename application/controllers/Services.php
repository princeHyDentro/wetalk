<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('services_model','services');
    }

    public function index()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $this->load->view('template/header');
            $this->load->view('services/add_service.php');
        }
    }
    public function deleted_services(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $this->load->view('template/header');
            $this->load->view('services/delete_service.php');
        }
    }
    public function view_services()
    {
        $this->load->view('template/header');
        $this->load->view('services/view_services.php');
    }

    public function list_of_services(){
         $this->load->helper('date');
        $list   = $this->services->get_datatables('');

        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $services) {
            
            $no++;
            $row = array();

            $row[] = $services->id;
            $row[] = $services->service_name;
            $row[] =  nice_date($services->created_at, 'Y-m-d');
            $row[] =  ($services->updated_at != NULL) ? nice_date($services->updated_at, 'Y-m-d') : '';


            //add html for action
            $row[] = '<a class="btn-floating waves-effect waves-light blue" onclick="edit_service('."'".$services->id."'".')" href="javascript:void(0)" title="Edit" ><i class="material-icons">edit</i></a> | <a class="btn-floating waves-effect waves-light red" href="javascript:void(0)" title="Delete" onclick="delete_service('."'".$services->id."'".')"><i class="material-icons">delete</i></a>';
            $row[] = '<button class="btn waves-effect waves-light" type="button" onclick="descriptionClick('."'".$services->id."'".')" data-badge-caption="show details" href="javascript:void(0)">Open</button>';
            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->services->count_all(),
            "recordsFiltered"   => $this->services->count_filtered(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

    public function ajax_list_data(){
        $this->load->helper('date');
        $list   = $this->services->get_datatables('');

        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $services) {

            $no++;
            $row = array();

            $row[] = $services->id;
            $row[] = $services->service_name;
            $row[] =  nice_date($services->created_at, 'Y-m-d');
            $row[] =  ($services->updated_at != NULL) ? nice_date($services->updated_at, 'Y-m-d') : '';
            $row[] = '<button class="btn waves-effect waves-light" type="button" onclick="descriptionClick('."'".$services->id."'".')" data-badge-caption="show details" href="javascript:void(0)">Open</button>';

            $data[] = $row;

        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->services->count_all(),
            "recordsFiltered"   => $this->services->count_filtered(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

    /*deleted services*/
    public function ajax_deleted_services(){

        $this->load->helper('date');
        $list   = $this->services->get_delete_datatables();

        $data   = array();
        $no     = $_POST['start'];

        foreach ($list as $services) {
            $no++;
            $row = array();

            $row[] = $services->id;
            $row[] = $services->service_name;
            $row[] = '<span class="new badge" onclick="descriptionClick('."'".$services->id."'".')" data-badge-caption="show details" ></span>';
            $row[] = nice_date($services->deleted_at, 'Y-m-d');

            //add html for action
            $row[] = '<center><a class="btn-floating waves-effect waves-light blue" onclick="restore('."'".$services->id."'".')" href="javascript:void(0)" title="restore staff" ><i class="material-icons">restore</i></a></center>';
            $data[] = $row;
        }
    
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->services->count_all(),
            "recordsFiltered"   => $this->services->deleted_count_filtered(),//for entries label
            "data"              => $data,
        );

        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->services->get_by_id($id);
        echo json_encode($data);
    }
    public function ajax_add(){

        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->_validate();

        $data = array(
            'service_name'  => $this->input->post('service-name'),
            'service_desc'  => $this->input->post('service-description'),
        );
       $insert = $this->services->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        $data = array(
            'service_name'  => $this->input->post('service-name'),
            'service_desc'  => $this->input->post('service-description'),
            'updated_at'    => date("Y-m-d h:i:s")
        );

        $this->services->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->services->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_restore($id)
    {
        $this->services->resotore_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function description($id){
        $data = $this->services->get_service_desc($id);
        echo json_encode($data);
    }

    private function _validate(){
        $data = array();
        $data['error_string']   = array();
        $data['inputerror']     = array();
        $data['status']         = TRUE;
        
        if($this->input->post('service-name') == '')
        {
            $data['inputerror'][] = 'service-name';
            $data['error_string'][] = 'Service name is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('service-description') == '')
        {
            $data['inputerror'][] = 'service-description';
            $data['error_string'][] = 'Service description is required';
            $data['status'] = FALSE;
        }
        
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}
