<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");


class Dashboard extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('registration_model','users');
    }

    public function index(){
        $data = array();
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{

            $this->load->model("Dashboard_model");
            $data['services'] = $this->Dashboard_model->services();
            $this->load->view('template/header');
            $this->load->view('dashboard/dashboard', $data);
        }	
    }

    public function chart_js_months($selected){
        $this->load->model("Dashboard_model");
        $list    = $this->Dashboard_model->chart_js_data($selected);
        $data    = array();
        $enroll  = array();
        $inquire = array();

       
        $january    = 0;
        $february   = 0;
        $march      = 0;
        $april      = 0;
        $may        = 0;
        $june       = 0;
        $july       = 0;
        $august     = 0;
        $september  = 0;
        $october    = 0;
        $november   = 0;
        $decembe    = 0;

        $january1    = 0;
        $february1   = 0;
        $march1      = 0;
        $april1      = 0;
        $may1        = 0;
        $june1       = 0;
        $july1       = 0;
        $august1     = 0;
        $september1  = 0;
        $october1    = 0;
        $november1   = 0;
        $decembe1    = 0;

        if(COUNT($list) > 0){
            foreach ($list as $key => $row) {

                if($row['status'] == "Enrolled"){
                    if($row['monthName'] == "January"){
                        $january1    = (int)$row['total'];
                    }
                    if($row['monthName'] == "February"){
                        $february1   = (int)$row['total'];
                    }
                    if($row['monthName'] == "March"){
                        $march1      = (int)$row['total'];
                    }
                    if($row['monthName'] == "April"){
                        $april1      = (int)$row['total'];
                    }
                    if($row['monthName'] == "May"){
                        $may1        = (int)$row['total'];
                    }
                    if($row['monthName'] == "June"){
                        $june1       = (int)$row['total'];
                    }
                    if($row['monthName'] == "July"){
                        $july1       = (int)$row['total'];
                    }
                    if($row['monthName'] == "August"){
                        $august1     = (int)$row['total'];
                    }
                    if($row['monthName'] == "September"){
                        $september1  = (int)$row['total'];
                    }
                    if($row['monthName'] == "October"){
                        $october1    = (int)$row['total'];
                    }
                    if($row['monthName'] == "November"){
                        $november1   = (int)$row['total'];
                    }
                    if($row['monthName'] == "December"){
                        $decembe1    = (int)$row['total'];
                    }

                    $enroll = array(
                        $january1    ,
                        $february1   ,
                        $march1      ,
                        $april1      ,
                        $may1        ,
                        $june1       ,
                        $july1       ,
                        $august1     ,
                        $september1  ,
                        $october1    ,
                        $november1   ,
                        $decembe1    ,
                    );
                }

                if($row['status'] == "Inquired"){
                    
                    if($row['monthName'] == "January"){
                        $january    = (int)$row['total'];
                    }
                    if($row['monthName'] == "February"){
                        $february   = (int)$row['total'];
                    }
                    if($row['monthName'] == "March"){
                        $march      = (int)$row['total'];
                    }
                    if($row['monthName'] == "April"){
                        $april      = (int)$row['total'];
                    }
                    if($row['monthName'] == "May"){
                        $may        = (int)$row['total'];
                    }
                    if($row['monthName'] == "June"){
                        $june       = (int)$row['total'];
                    }
                    if($row['monthName'] == "July"){
                        $july       = (int)$row['total'];
                    }
                    if($row['monthName'] == "August"){
                        $august     = (int)$row['total'];
                    }
                    if($row['monthName'] == "September"){
                        $september  = (int)$row['total'];
                    }
                    if($row['monthName'] == "October"){
                        $october    = (int)$row['total'];
                    }
                    if($row['monthName'] == "November"){
                        $november   = (int)$row['total'];
                    }
                    if($row['monthName'] == "December"){
                        $decembe    = (int)$row['total'];
                    }

                    $inquire = array(
                        $january    ,
                        $february   ,
                        $march      ,
                        $april      ,
                        $may        ,
                        $june       ,
                        $july       ,
                        $august     ,
                        $september  ,
                        $october    ,
                        $november   ,
                        $decembe    ,
                    );
                }
            }
        }else{

            $enroll = array(
                        $january1    ,
                        $february1   ,
                        $march1      ,
                        $april1      ,
                        $may1        ,
                        $june1       ,
                        $july1       ,
                        $august1     ,
                        $september1  ,
                        $october1    ,
                        $november1   ,
                        $decembe1    ,
                    );

            $inquire = array(
                        $january    ,
                        $february   ,
                        $march      ,
                        $april      ,
                        $may        ,
                        $june       ,
                        $july       ,
                        $august     ,
                        $september  ,
                        $october    ,
                        $november   ,
                        $decembe    ,
                    );

        }
        

        $data['enroll']     = $enroll;
        $data['inquire']    = $inquire;

        $data['title']      = "TLC WETALK (".date("Y")." Monthly Results)";
        echo json_encode($data);
    }

    public function chart_js_weeks($selected){
        // $list    = $this->Dashboard_model->chart_js_weeks();
        $monday     = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $tuesday    = date( 'Y-m-d', strtotime( 'tuesday this week' ) );
        $wednesday  = date( 'Y-m-d', strtotime( 'wednesday this week' ) );
        $thursday   = date( 'Y-m-d', strtotime( 'wednesday this week' ) );
        $friday     = date( 'Y-m-d', strtotime( 'thursday this week' ) );
        $sturday    = date( 'Y-m-d', strtotime( 'sturday this week' ) );
        $sunday     = date( 'Y-m-d', strtotime( 'sunday this week' ) );

        $enroll_total  = 0;
        $inquire_total = 0;

        if($monday){
           
            $monday_data = $this->db->select('COUNT(id) as total ,status, created_at, DAYNAME(created_at) as Days');
            $monday_data = $this->db->from('applicant');
            if($selected !== "All"){
            $this->db->where("service_id", $selected);
            }
            $monday_data = $this->db->where("DATE(created_at)" , DATE($monday));
            $monday_data = $this->db->group_by(array("Days" , "status")); 
            $monday_data = $this->db->order_by("WEEKDAY(created_at)", "asc");
            $monday_data = $this->db->get()->result_array();

            if(COUNT($monday_data) > 0){
                $monday_inquire        = 'Inquired';
                $monday_enroll         = 'Enrolled';
                $monday_inquire_total  = 0;
                $monday_enroll_total   = 0;

                if($monday_data[0]['status'] == 'Inquired'){

                    $monday_inquire        = $monday_data[0]['status'];
                    $monday_inquire_total  = $monday_data[0]['total'];

                }elseif(isset($monday_data[1]['status']) == 'Inquired'){

                    $monday_inquire_total  = $monday_data[1]['total'];
                    $monday_inquire        = $monday_data[1]['status'];

                }

                if($monday_data[0]['status'] == 'Enrolled'){
                    $monday_enroll_total   = $monday_data[0]['total'];
                    $monday_enroll         = $monday_data[0]['status'];
                }elseif(isset($monday_data[1]['status']) == 'Enrolled'){
                    $monday_enroll_total   = $monday_data[1]['total'];
                    $monday_enroll         = $monday_data[1]['status'];
                }

                $monday_data = array(
                                array('total' => $monday_inquire_total , 'status' => $monday_inquire),
                                array('total' => $monday_enroll_total , 'status' => $monday_enroll)
                            );
            }else{
                $monday_data = array(
                    array('total' => $enroll_total , 'status' => 'Enrolled'),
                    array('total' => $inquire_total , 'status' => 'Inquired')
                );
            }
        }
        

        if($tuesday){
            $tuesday_data = $this->db->select('COUNT(id) as total ,status, DAYNAME(created_at) as Days');
            $tuesday_data = $this->db->from('applicant');
            if($selected !== "All"){
            $this->db->where("service_id", $selected);
            }
            $tuesday_data = $this->db->where("DATE(created_at)" , DATE($tuesday));
            $tuesday_data = $this->db->group_by(array("Days" , "status")); 
            $tuesday_data = $this->db->order_by("WEEKDAY(created_at)", "asc");
            $tuesday_data = $this->db->get()->result_array();

            if(COUNT($tuesday_data) > 0){
                $tuesday_inquire        = 'Inquired';
                $tuesday_enroll         = 'Enrolled';
                $tuesday_inquire_total  = 0;
                $tuesday_enroll_total   = 0;

                if($tuesday_data[0]['status'] == 'Inquired'){
                    $tuesday_inquire        = $tuesday_data[0]['status'];
                    $tuesday_inquire_total  = $tuesday_data[0]['total'];
                }elseif(isset($tuesday_data[1]['status']) == 'Inquired'){
                    $tuesday_inquire_total  = $tuesday_data[1]['total'];
                    $tuesday_inquire        = $tuesday_data[1]['status'];
                }

                if($tuesday_data[0]['status'] == 'Enrolled'){
                    $tuesday_enroll_total   = $tuesday_data[0]['total'];
                    $tuesday_enroll         = $tuesday_data[0]['status'];
                }elseif(isset($tuesday_data[1]['status']) == 'Enrolled'){
                    $tuesday_enroll_total   = $tuesday_data[1]['total'];
                    $tuesday_enroll         = $tuesday_data[1]['status'];
                }

                $tuesday_data = array(
                                array('total' => $tuesday_inquire_total , 'status' => $tuesday_inquire),
                                array('total' => $tuesday_enroll_total , 'status' => $tuesday_enroll)
                            );
            }else{
                $tuesday_data = array(
                    array('total' => $enroll_total , 'status' => 'Enrolled'),
                    array('total' => $inquire_total , 'status' => 'Inquired')
                );
            }
        }

        if($wednesday){
            $wednesday_data = $this->db->select('COUNT(id) as total ,status, created_at, DAYNAME(created_at) as Days');
            $wednesday_data = $this->db->from('applicant');
            if($selected !== "All"){
            $this->db->where("service_id", $selected);
            }
            $wednesday_data = $this->db->where("DATE(created_at)" , DATE($wednesday));
            $wednesday_data = $this->db->group_by(array("Days" , "status")); 
            $wednesday_data = $this->db->order_by("WEEKDAY(created_at)", "asc");
            $wednesday_data = $this->db->get()->result_array();

            if(COUNT($wednesday_data) > 0){
                $wednesday_inquire        = 'Inquired';
                $wednesday_enroll         = 'Enrolled';
                $wednesday_inquire_total  = 0;
                $wednesday_enroll_total   = 0;

                if($wednesday_data[0]['status'] == 'Inquired'){

                    $wednesday_inquire        = $wednesday_data[0]['status'];
                    $wednesday_inquire_total  = $wednesday_data[0]['total'];
                    $wednesday_inquire_created_at     = $wednesday_data[0]['created_at'];

                }elseif(isset($wednesday_data[1]['status']) == 'Inquired'){
                    $wednesday_inquire_total  = $wednesday_data[1]['total'];
                    $wednesday_inquire        = $wednesday_data[1]['status'];
                }

                if($wednesday_data[0]['status'] == 'Enrolled'){
                    $wednesday_enroll_total   = $wednesday_data[0]['total'];
                    $wednesday_enroll         = $wednesday_data[0]['status'];
                }elseif(isset($wednesday_data[1]['status']) == 'Enrolled'){
                    $wednesday_enroll_total   = $wednesday_data[1]['total'];
                    $wednesday_enroll         = $wednesday_data[1]['status'];
                }


                $wednesday_data = array(
                                array('total' => $wednesday_inquire_total , 'status' => $wednesday_inquire),
                                array('total' => $wednesday_enroll_total , 'status' => $wednesday_enroll)
                            );
            }else{
                $wednesday_data = array(
                    array('total' => $enroll_total , 'status' => 'Enrolled' ),
                    array('total' => $inquire_total , 'status' => 'Inquired' )
                );
            }
        }

        if($thursday){
            $thursday_data = $this->db->select('COUNT(id) as total ,status, created_at, DAYNAME(created_at) as Days');
            $thursday_data = $this->db->from('applicant');
            if($selected !== "All"){
            $this->db->where("service_id", $selected);
            }
            $thursday_data = $this->db->where("DATE(created_at)" , DATE($thursday));
            $thursday_data = $this->db->group_by(array("Days" , "status")); 
            $thursday_data = $this->db->order_by("WEEKDAY(created_at)", "asc");
            $thursday_data = $this->db->get()->result_array();

            if(COUNT($thursday_data) > 0){
                $thursday_inquire        = 'Inquired';
                $thursday_enroll         = 'Enrolled';
                $thursday_inquire_total  = 0;
                $thursday_enroll_total   = 0;

                if($thursday_data[0]['status'] == 'Inquired'){
                    $thursday_inquire        = $thursday_data[0]['status'];
                    $thursday_inquire_total  = $thursday_data[0]['total'];
                }elseif(isset($thursday_data[1]['status']) == 'Inquired'){
                    $thursday_inquire_total  = $thursday_data[1]['total'];
                    $thursday_inquire        = $thursday_data[1]['status'];
                }

                if($thursday_data[0]['status'] == 'Enrolled'){
                    $thursday_enroll_total   = $thursday_data[0]['total'];
                    $thursday_enroll         = $thursday_data[0]['status'];
                }elseif(isset($thursday_data[1]['status']) == 'Enrolled'){
                    $thursday_enroll_total   = $thursday_data[1]['total'];
                    $thursday_enroll         = $thursday_data[1]['status'];
                }

                $thursday_data = array(
                                array('total' => $thursday_inquire_total , 'status' => $thursday_inquire),
                                array('total' => $thursday_enroll_total , 'status' => $thursday_enroll)
                            );
            }else{
                $thursday_data = array(
                    array('total' => $enroll_total , 'status' => 'Enrolled'),
                    array('total' => $inquire_total , 'status' => 'Inquired')
                );
            }
        }

        if($friday){
            $friday_data = $this->db->select('COUNT(id) as total ,status, created_at, DAYNAME(created_at) as Days');
            $friday_data = $this->db->from('applicant');
            if($selected !== "All"){
            $this->db->where("service_id", $selected);
            }
            $friday_data = $this->db->where("DATE(created_at)" , DATE($friday));
            $friday_data = $this->db->group_by(array("Days" , "status")); 
            $friday_data = $this->db->order_by("WEEKDAY(created_at)", "asc");
            $friday_data = $this->db->get()->result_array();

            if(COUNT($friday_data) > 0){
                $thursday_inquire        = 'Inquired';
                $thursday_enroll         = 'Enrolled';
                $thursday_inquire_total  = 0;
                $thursday_enroll_total   = 0;

                if($friday_data[0]['status'] == 'Inquired'){
                    $thursday_inquire        = $friday_data[0]['status'];
                    $thursday_inquire_total  = $friday_data[0]['total'];
                }elseif(isset($friday_data[1]['status']) == 'Inquired'){
                    $thursday_inquire_total  = $friday_data[1]['total'];
                    $thursday_inquire        = $friday_data[1]['status'];
                }

                if($friday_data[0]['status'] == 'Enrolled'){
                    $thursday_enroll_total   = $friday_data[0]['total'];
                    $thursday_enroll         = $friday_data[0]['status'];
                }elseif(isset($friday_data[1]['status']) == 'Enrolled'){
                    $thursday_enroll_total   = $friday_data[1]['total'];
                    $thursday_enroll         = $friday_data[1]['status'];
                }

                $friday_data = array(
                                array('total' => $thursday_inquire_total , 'status' => $thursday_inquire),
                                array('total' => $thursday_enroll_total , 'status' => $thursday_enroll)
                            );
            }else{
                $friday_data = array(
                    array('total' => $enroll_total , 'status' => 'Enrolled'),
                    array('total' => $inquire_total , 'status' => 'Inquired')
                );
            }
        }

        if($sturday){
            $sturday_data = $this->db->select('COUNT(id) as total ,status, created_at, DAYNAME(created_at) as Days');
            $sturday_data = $this->db->from('applicant');
            if($selected !== "All"){
            $this->db->where("service_id", $selected);
            }
            $sturday_data = $this->db->where("DATE(created_at)" , DATE($sturday));
            $sturday_data = $this->db->group_by(array("Days" , "status")); 
            $sturday_data = $this->db->order_by("WEEKDAY(created_at)", "asc");
            $sturday_data = $this->db->get()->result_array();

            if(COUNT($sturday_data) > 0){
                $thursday_inquire        = 'Inquired';
                $thursday_enroll         = 'Enrolled';
                $thursday_inquire_total  = 0;
                $thursday_enroll_total   = 0;

                if($sturday_data[0]['status'] == 'Inquired'){
                    $thursday_inquire        = $sturday_data[0]['status'];
                    $thursday_inquire_total  = $sturday_data[0]['total'];
                }elseif(isset($sturday_data[1]['status']) == 'Inquired'){
                    $thursday_inquire_total  = $sturday_data[1]['total'];
                    $thursday_inquire        = $sturday_data[1]['status'];
                }

                if($sturday_data[0]['status'] == 'Enrolled'){
                    $thursday_enroll_total   = $sturday_data[0]['total'];
                    $thursday_enroll         = $sturday_data[0]['status'];
                }elseif(isset($sturday_data[1]['status']) == 'Enrolled'){
                    $thursday_enroll_total   = $sturday_data[1]['total'];
                    $thursday_enroll         = $sturday_data[1]['status'];
                }

                $sturday_data = array(
                                array('total' => $thursday_inquire_total , 'status' => $thursday_inquire),
                                array('total' => $thursday_enroll_total , 'status' => $thursday_enroll)
                            );
            }else{
                $sturday_data = array(
                    array('total' => $enroll_total , 'status' => 'Enrolled'),
                    array('total' => $inquire_total , 'status' => 'Inquired')
                );
            }
        }

        if($sunday){
            $sunday_data = $this->db->select('COUNT(id) as total ,status, created_at, DAYNAME(created_at) as Days');
            $sunday_data = $this->db->from('applicant');
            if($selected !== "All"){
            $this->db->where("service_id", $selected);
            }
            $sunday_data = $this->db->where("DATE(created_at)" , DATE($sunday));
            $sunday_data = $this->db->group_by(array("Days" , "status")); 
            $sunday_data = $this->db->order_by("WEEKDAY(created_at)", "asc");
            $sunday_data = $this->db->get()->result_array();

            if(COUNT($sunday_data) > 0){
                $thursday_inquire        = 'Inquired';
                $thursday_enroll         = 'Enrolled';
                $thursday_inquire_total  = 0;
                $thursday_enroll_total   = 0;

                if($sunday_data[0]['status'] == 'Inquired'){
                    $thursday_inquire        = $sunday_data[0]['status'];
                    $thursday_inquire_total  = $sunday_data[0]['total'];
                }elseif(isset($sunday_data[1]['status']) == 'Inquired'){
                    $thursday_inquire_total  = $sunday_data[1]['total'];
                    $thursday_inquire        = $sunday_data[1]['status'];
                }

                if($sunday_data[0]['status'] == 'Enrolled'){
                    $thursday_enroll_total   = $sunday_data[0]['total'];
                    $thursday_enroll         = $sunday_data[0]['status'];
                }elseif(isset($sunday_data[1]['status']) == 'Enrolled'){
                    $thursday_enroll_total   = $sunday_data[1]['total'];
                    $thursday_enroll         = $sunday_data[1]['status'];
                }

                $sunday_data = array(
                                array('total' => $thursday_inquire_total , 'status' => $thursday_inquire),
                                array('total' => $thursday_enroll_total , 'status'  => $thursday_enroll)
                            );
            }else{
                $sunday_data = array(
                    array('total' => $enroll_total , 'status' => 'Enrolled'),
                    array('total' => $inquire_total , 'status' => 'Inquired')
                );
            }
        }

        $weeks = array_merge($monday_data , $tuesday_data , $wednesday_data , $thursday_data , $friday_data , $sturday_data , $sunday_data);

        $data    = array();
        $enroll  = array();
        $inquire = array();

        foreach ($weeks as $key => $row) {
            if($row['status'] == "Enrolled"){
                $enroll[] = (int)$row['total'];
            }
            if($row['status'] == "Inquired"){
                $inquire[] = (int)$row['total'];
            }
        }

        $data['enroll']     = $enroll;
        $data['inquire']    = $inquire;

        $data['title']      = "TLC WETALK (".date("Y")." Daily and Weekly Results)";
        echo json_encode($data);
    }

    public function chart_js_yearly($selected){

        $this->load->model("Dashboard_model");

        $list    = $this->Dashboard_model->chart_js_yearly($selected);

        $data    = array();
        $enroll  = array();
        $inquire = array();

        if(COUNT($list) > 0){
            foreach ($list as $key => $row) {
                $enroll[] = (int)$row['total'];
            }
        }else{
            $enroll = array(0,0);
        }
        
        $data['result'] = $enroll;


        $data['title']      = "TLC WETALK (".date("Y")." Yearly Results)";
        echo json_encode($data);
    }

    public function password_reset(){
        $this->load->library('email');

        $emailTo  = $this->input->post('userEmail');
        $userID   = $this->input->post('userID');
        $newPass  = $this->input->post('new_password');
        $template_message = $this->reset_template($userID);

        $data = array(
          'password' => ($newPass == "") ? "" : md5($newPass),
          'flag' => 1,
      );
        $result = $this->users->update(array('id' => $userID), $data);


        if($result){
            $subject   = "Password Reset";
            $headers   = "MIME-Version: 1.0" . "\r\n";
            $headers  .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers  .= 'From: <no-reply@tlcwetalk.com>' . "\r\n";

            $mail = mail($emailTo   ,$subject,$template_message ,$headers);

            if($mail){
                echo 'Message has been sent';
            }else{
                echo 'Message could not be sent.';
            }
        }else{
          echo 'You enter the same password as before.';
      }
    }

    public function confirm(){
        $data = array('flag' => 0);
        $userID = base64_decode($_GET['key']);

        $this->users->update(array('id' => $userID), $data);

        $this->load->view('template/header');
        $this->load->view('password_confirm');
        $this->load->view('template/footer');
    }

    private function reset_template($userID){
        $template = '<table class="m_4689066358319766396container" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:rgb(234,234,234);margin-top:0"> 
        <tbody>
        <tr> 
        <td align="center"> 

        <table class="" width="600" cellpadding="0" cellspacing="0" border="0"> 

        <tbody>
        <tr> 
        <td class="" bgcolor="#ffffff"> 
        <table class="" width="100%" cellpadding="0" cellspacing="0" border="0"> 

        <tbody>
        <tr> 
        <td class="" align="center" style="padding:46px 0 0 0"></td> 
        </tr> 


        <tr> 
        <td class="" style="font-family:Helvetica,Arial,sans;font-weight:bold;font-size:32px;color:rgb(34,31,31);line-height:36px;padding:40px 90px 10px 90px"> Password updated! </td> 
        </tr> 


        <tr> 
        <td class="" style="padding:22px 90px 0 90px;font-family:Helvetica Neue,Helvetica,Roboto,Segoe UI,sans-serif;font-size:18px;line-height:24px;color:rgb(34,31,31)"> Hello, </td> 
        </tr> 


        <tr> 
        <td class="" style="padding:22px 90px 0 90px;font-family:Helvetica Neue,Helvetica,Roboto,Segoe UI,sans-serif;font-size:18px;line-height:24px;color:rgb(34,31,31)"> We’ve changed your password, as you asked. For security purposes, you need to confirm these changes to activate the new account password, <a href="'.base_url("dashboard/confirm?key=").''.base64_encode($userID).'">Confirm</a>. </td> 
        </tr> 


        <tr> 
        <td class="" style="padding:22px 90px 0 90px;font-family:Helvetica Neue,Helvetica,Roboto,Segoe UI,sans-serif;font-size:18px;line-height:24px;color:rgb(34,31,31)"> If you did not ask to change your password we are here to help secure your account, just <a href="#">contact us</a>. </td> 
        </tr> 


        <tr> 
        <td class="" style="padding:22px 90px 0 90px;font-family:Helvetica Neue,Helvetica,Roboto,Segoe UI,sans-serif;font-size:18px;line-height:24px;color:rgb(34,31,31)"> –Your friends at TLC @WETALK INC </td> 
        </tr> 


        <tr> 
        <td class="" style="padding:50px 90px 38px 90px"> <a class="" href="#" style="text-decoration:none;color:inherit" target="_blank" data-saferedirecturl=""> 
        <table class="m_4689066358319766396escape-hatch-mild-table" width="100%" cellpadding="0" cellspacing="0" border="0"> 
        <tbody>
        <tr> 
        <td class="r" colspan="2" style="background-color:rgb(229,9,20);height:3px;font-size:0;line-height:0"> <img src="https://ci3.googleusercontent.com/proxy/2YUGL1Mub2isMZV4fDJv7iL_5yGuLnqfg0nfTkIDyqOXlLJIB4zGkOwRK16ZcF7MT-Shcu7WjweoVdpSN9btM6qER9C2J6ZR9A=s0-d-e1-ft#http://cdn.nflximg.com/us/email/hitch/red-pixel.jpg" alt="" width="420" height="1" style="border-collapse:collapse;display:block;border:none;outline:none;width:100%;border-style:none" class="CToWUd"> </td> 
        </tr>                          
        </tbody>
        </table> </a> </td> 
        </tr>                        
        </tbody>
        </table> </td> 
        </tr> 
        </tbody>
        </table> 
        <table class="" width="600" cellpadding="0" cellspacing="0" border="0">        
        <tbody>
        <tr> 
        <td class=""></td> 
        </tr> 
        </tbody>
        </table> </td> 
        </tr> 
        </tbody>
        </table>';
      return $template;

    }

}