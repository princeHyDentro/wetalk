<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	}
	public function index(){
        $this->load->model("Registration_model");
        $data = array();
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login', 'refresh');
            die();
        }else{
            $data['user_information'] = $this->Registration_model->get_by_id($is_logged_in['user_id']);
            $this->load->view('template/header',$data);
            $this->load->view('profile/profile');
        }
	}

    public function update($id){

        $this->db->where('id', $id);
        $this->db->update('users', $_POST);
        echo  $this->db->affected_rows();
    }

    function do_upload($user_id)
    {
   

        $this->load->model("Registration_model");

        $config['upload_path'] = 'assets/profile_picture';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_filename'] = '255';
        // $config['encrypt_name'] = FALSE;
        $config['max_size']     = '1024'; //1 MB
        $new_name               = time().$_FILES["file"]['name'];
        $config['file_name']    = $new_name;


        if (isset($new_name)) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('assets/profile_picture/' . $new_name)) {
                    echo 'File already exists : assets/profile_picture/' . $new_name;
                } else {
                    $this->load->library('upload', $config);
   
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {

                        $data = array("profile_picture" => $new_name);
                        $this->db->where('id', $user_id);
                        $this->db->update('users', $data);

                        echo 'File successfully uploaded : uploads/' . $new_name;
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
    }
}