<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Dashboard extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	    $this->load->model('registration_model','users');
	}

	public function index()
	{
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login', 'refresh');
			die();
		}else{
			$this->load->view('template/header');
        	$this->load->view('dashboard/dashboard');
       		$this->load->view('template/footer');
		}	
	}
	public function password_reset(){
		$this->load->library('email');
		// $config = array('protocol' => 'smtp',
		// 				'smtp_host' => 'smtp.gmail.com',
		// 				'smtp_user' => 'caranoobenjie@gmail.com',
		// 				'smtp_pass' => 'Dentrobenjie1991',
		// 				'smtp_port' => 587);

		$emailTo 	= $this->input->post('userEmail');
		$userID  	= $this->input->post('userID');
		$newPass 	= $this->input->post('new_password');
		$template 	= $this->reset_template($userID);

		$data = array(
                'user_password' => ($newPass == "") ? "" : md5($newPass),
                'flag' => 1,
            );
        $result = $this->users->update(array('user_id' => $userID), $data);

        if($result){
        	$this->email->from('no-reply@tlcwetalk.com', 'TLCWETALK');
			$this->email->to('b.caranoo@outlook.com');
			$this->email->subject('Change Password');
			$this->email->message($template);
			if($this->email->send()){
		    	echo 'Message has been sent';
		    }else{
		    	//echo $this->email->print_debugger();
		    	echo 'Message could not be sent.';
		    }
        }else{
        	echo 'You enter the same password as before.';
        }
	    
	}
	public function confirm(){
		$data = array(
               
                'flag' => 0
            );
		$userID = base64_decode($_GET['key']);
		
        $this->users->update(array('user_id' => $userID), $data);

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