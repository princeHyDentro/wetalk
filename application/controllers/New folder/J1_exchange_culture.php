<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class J1_exchange_culture extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function create_new_applicant()
    {
        $this->load->model("J1_model");
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            if ($this->uri->segment(3) != "") {
                $data['client'] = $this->J1_model->j1_view_by_id($this->uri->segment(3));
                $this->load->view('template/header');
                $this->load->view('j1_exchange_culture/create_new_applicant',$data);
                $this->load->view('template/footer');   
            } else {
                $this->load->view('template/header');
                $this->load->view('j1_exchange_culture/create_new_applicant');
                $this->load->view('template/footer');
            }
        }
    }
    
    public function update_client()
    {    
        $this->load->model("J1_model");
        if ($this->uri->segment(4) == "upload") {
            $this->do_upload_data();
        }
        if ($this->uri->segment(4) != "") {
            $client_update = array (
                "name" => $_POST["name"],
                "client_address" => $_POST["address"],
                "client_contactno" => $_POST["contact_no"],
                "client_email" => $_POST["email_address"],
                "client_birthdate" => $_POST["birthdate"],
                "client_age" => $_POST["age"],
                "gender_id" => $_POST["gender"],
                "client_yeargraduated" => $_POST["year_graduated"],
                "client_datevisited" =>  $_POST["date_visited"],
                "client_school" => $_POST["school"],
                "client_course" => $_POST["course"],
                "status_id" => $_POST["status"],
                "client_month" => $_POST["month"],
                "client_yearapplied" => $_POST["year"],
                "j1_type" => $_POST["j1_type"],
                "client_remarks" => $_POST["message"],
                "client_formno" => $_POST["formno"],
                "client_company" => $_POST["company"],
                "client_referredby" => $_POST["referred_by"]
                );
            $this->J1_model->j1_update($_POST["client_id"],$client_update);
            if ($this->db->affected_rows() > 0) {
                echo "success";
            }
        } else {
            $data['client'] = $this->J1_model->j1_view_by_id($this->uri->segment(3));
            $data['picture'] = $this->J1_model->j1_get_picture($this->uri->segment(3));
            $this->load->view('template/header');
            $this->load->view('j1_exchange_culture/create_new_applicant',$data);
            $this->load->view('template/footer');
        }        
    }
    
    public function delete_client() {
        $this->load->model("J1_model");
        $id = $this->uri->segment(3);
        $data = array(
            "deleted" => 1
            );
        $this->J1_model->j1_delete($id,$data);
        if ($this->db->affected_rows() > 0) {
            header("Location:/wetalk/J1_exchange_culture/view_all_applicant");
        }
    }
    
    public function view_all_applicant()
    {
        $this->load->model("J1_model");
        $is_logged_in = $this->session->userdata('is_logged_in');
        //echo "<pre>"; print_r($is_logged_in); echo "</pre>";
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $data['j1_data'] = $this->J1_model->j1_view(1,$is_logged_in['user_id']);
            $data['status'] = $this->J1_model->j1_status();
            $data['user'] = $this->J1_model->j1_userdata($is_logged_in['user_id']);
            $this->load->view('template/header');
            $this->load->view('j1_exchange_culture/view_applicant',$data);
            $this->load->view('template/footer');
        }
    }
    
    public function report()
    {
        $this->load->model("J1_model");
        $is_logged_in = $this->session->userdata('is_logged_in');
        //echo "<pre>"; print_r($is_logged_in); echo "</pre>";
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $data['j1_data'] = $this->J1_model->j1_view(1,$is_logged_in['user_id']);
            $data['status'] = $this->J1_model->j1_status();
            $data['user'] = $this->J1_model->j1_userdata($is_logged_in['user_id']);
            $this->load->view('template/header');
            $this->load->view('j1_exchange_culture/report',$data);
            $this->load->view('template/footer');
        }
    }
    
    public function insert_new_j1exchangeculture() {
        $this->load->model("J1_model");
        $is_logged_in = $this->session->userdata('is_logged_in');

        $data = array(
            "user_id"       =>$is_logged_in['user_id'],
            "cl_type_id"    =>1,
            "status_id"     =>$_POST['status'],
            "client_course" => $_POST["course"],
            "pic_id"        =>$_POST["pic_id"],
            "name"          => $_POST['name'],
            "client_address" => $_POST['address'],
            "client_contactno"  => $_POST['contact_no'],
            "client_email"      => $_POST['email_address'],
            "gender_id"         => $_POST['gender'],
            "client_datevisited" => $_POST['date_visited'],
            "client_school" => $_POST['school'],
            "client_month" => $_POST['month'],
            "client_remarks" => $_POST['message'],
            "client_datecreated" => date('Y-m-d'),
            "client_of" => "",
            "client_birthdate" => $_POST['birthdate'],
            "client_yeargraduated" => $_POST['year_graduated'],
            "client_yearapplied" => $_POST['year'],
            "client_formno" => $_POST['formno'],
            "client_age" => $_POST["age"],
            "client_referredby" => $_POST["referred_by"],
            "client_company" => $_POST["company"],
            "password"  => md5($this->randomPassword())
            );
        $this->J1_model->j1_insert($data);
        if ($this->db->affected_rows() > 0) {
            echo $this->db->insert_id();
        }
    }
    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 10; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
    public function do_upload_data(){
        
        $this->load->model("J1_model");
        
        $config['upload_path']= './upload/';
        $config['allowed_types']='gif|jpg|png';
        $this->load->library('upload',$config);
        
        if($this->upload->do_upload("file")){
        $data = array('upload_data' => $this->upload->data());
        $data1 = array(
           'pic_path' => $data['upload_data']['file_name']
        ); 
        if ($this->uri->segment(5) != "") {
           $this->J1_model->j1_updatePic($this->uri->segment(5),$data1);
        } else {            
           $this->J1_model->j1_insertPic($data1);
        }
        $id = $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            echo $id;
        } else {
           echo "";
        }
        }
    }
}