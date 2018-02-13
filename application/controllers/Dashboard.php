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
            $this->load->view('template/header');
            $this->load->view('dashboard/dashboard');
        }	
    }

    public function chart_js_months(){
        $this->load->model("Dashboard_model");
        $list    = $this->Dashboard_model->chart_js_data();
        $data    = array();
        $enroll  = array();
        $inquire = array();

        foreach ($list as $key => $row) {
            if($row['status'] == "Enrolled"){
                $enroll[] = (int)$row['total'];
            }

            if($row['status'] == "Inquired"){
                $inquire[] = (int)$row['total'];
            }
        }

        $data['enroll']     = $enroll;
        $data['inquire']    = $inquire;
        $data['title']      = "TLC WETALK (".date("Y")." Result)";
        echo json_encode($data);
    }

    public function chart_js_weeks(){
        // $list    = $this->Dashboard_model->chart_js_weeks();
  
        $monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $friday = date( 'Y-m-d', strtotime( 'sunday this week' ) );


        // $this->db->select("created_at , status, COUNT(id) as total");
        // $this->db->from('applicant');
        // $this->db->where("Year(created_at)", date("Y"));
        // $this->db->group_by(array("created_at","Year(created_at)" , "status")); 
        // $this->db->order_by("Month(created_at)", "asc");
        
       // $query = $this->db->query('SELECT id, status  FROM applicant WHERE created_at BETWEEN subdate(curdate(),dayofweek(curdate())+5) AND subdate(curdate(),dayofweek(curdate())-1)');
       // $this->db->where("created_at >= DATE_SUB(NOW(),INTERVAL 1 HOUR)", NULL, FALSE);
       // $data = $query->result();
        
 
        echo "<pre>";
        print_r($data);

        // foreach ($data as $key => $value) {
        //            echo "<pre>";
        //             print_r($value);
        //         if($value['created_at'] === $monday){
                 
        //         }
        // }

 
        // return $today;
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