<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encoder_model extends CI_Model {
	
	/*----------------------------------TICKETS---------------------------------------------*/
    var $table_tickets         = 'encoder_assign_tickets';
    var $column_order_ticket   = array('id','sales_name','service_name',' status'); 
    var $column_search_ticket  = array('id','encoder_name','service_name',' status');
    var $order_ticket          = array('id' => 'desc');

    var $table_applicant 		= 'applicant';
    var $col_applicant   		= array('id','name', 'encoder_name',' contact', 'address' , 'email' , 'service', 'status' , 'created_at'); 
    var $col_search_applicant  	= array('id','name', 'encoder_name',' contact', 'address' , 'email' , 'service', 'status' , 'created_at');
    var $order_applicant        = array('id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function all_pending_tickets(){

        $this->_all_pending_tickest_data();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_enroll_tickets()
    {
        $this->_all_pending_tickest_data();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_enroll_tickets()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->db->where("encoder_id", $is_logged_in['user_id']);
        $this->db->where("status", 'Pending');
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_tickets);
        return $this->db->count_all_results();
    }

    private function _all_pending_tickest_data(){

        $is_logged_in = $this->session->userdata('is_logged_in');

        if($is_logged_in['user_rights'] == 'encoder'){
            $this->db->where("encoder_id", $is_logged_in['user_id']);
            $this->db->where("status", 'Pending');
        }
        
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_tickets);

        $i = 0;

        foreach ($this->column_search_ticket as $item){

            if($_POST['search']['value'])
            {

                    if($i===0)
                    {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    }else{
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_ticket) - 1 == $i)
                
                       $this->db->group_end();
            }
                    $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order_ticket[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    /*----------------------------------END-------------------------------------------------*/



    /*---------------------------FOR ENROLLED APPLICANT--------------------*/

    public function all_enroll_applicants(){

        $this->_all_enroll_applicant_data();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    private function _all_enroll_applicant_data(){

        $is_logged_in = $this->session->userdata('is_logged_in');

        $this->db->where("encoder_id", $is_logged_in['user_id']);
        $this->db->where("status", 'Enrolled');
        
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_applicant);

        $i = 0;

        foreach ($this->col_search_applicant as $item){

            if($_POST['search']['value'])
            {

                    if($i===0)
                    {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    }else{
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->col_search_applicant) - 1 == $i)
                
                       $this->db->group_end();
            }
                    $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->col_applicant[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order_applicant)){
            $order = $this->order_applicant;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function count_all_enroll_applicants()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->db->where("encoder_id", $is_logged_in['user_id']);
        $this->db->where("status", 'Enrolled');
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_applicant);
        return $this->db->count_all_results();
    }

    public function count_filtered_enroll_applicants()
    {
        $this->_all_enroll_applicant_data();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function enrolled_applicant($data){
        $this->db->insert($this->table_applicant, $data);
        return $this->db->insert_id();
    }
    /*---------------------------END FOR ENROLLED APPLICANT--------------------*/

    /*---------------------------FOR INQUIRED APPLICANT--------------------*/

    public function all_inquire_applicants(){

        $this->_all_inquire_applicant_data();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    private function _all_inquire_applicant_data(){

        $is_logged_in = $this->session->userdata('is_logged_in');

        //$this->db->where("encoder_id", $is_logged_in['user_id']);
        $this->db->where("status", 'Inquired');
        
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_applicant);

        $i = 0;

        foreach ($this->col_search_applicant as $item){

            if($_POST['search']['value'])
            {

                    if($i===0)
                    {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    }else{
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->col_search_applicant) - 1 == $i)
                
                       $this->db->group_end();
            }
                    $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->col_applicant[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order_applicant)){
            $order = $this->order_applicant;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function count_all_inquire_applicants()
    {
       // $is_logged_in = $this->session->userdata('is_logged_in');
        //$this->db->where("encoder_id", $is_logged_in['user_id']);
        $this->db->where("status", 'Inquired');
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_applicant);
        return $this->db->count_all_results();
    }

    public function count_filtered_inquire_applicants()
    {
        $this->_all_inquire_applicant_data();
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    /*---------------------------END FOR INQUIRED APPLICANT--------------------*/

    public function ticket_info($ticket_id){
        $this->db->where("id", $ticket_id);
        $this->db->where("deleted_at", NULL);
        $this->db->from("encoder_assign_tickets");
        $query = $this->db->get();
        return $query->result_array();
    }
}