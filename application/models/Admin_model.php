<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    /*----------------------------------TICKETS---------------------------------------------*/
    var $table_tickets         = 'admin_tickets';
    var $column_order_ticket   = array('id','service_name','requestor_name', 'desc', 'status' , 'request_for' , 'created_at'); 
    var $column_search_ticket  = array('id','service_name','requestor_name', 'desc', 'status', 'request_for', 'created_at');
    var $order_ticket          = array('id' => 'desc');

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
        $this->db->where("status !=", 'Complete');
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_tickets);
        return $this->db->count_all_results();
    }

    private function _all_pending_tickest_data(){

        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->db->where("status !=", 'Complete');
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


    /*----------------------COMPLETE TICKETS-----------------------------*/

    public function all_complete_tickets(){

        $this->_all_complete_tickest_data();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_complete_tickets()
    {
        $this->_all_pending_tickest_data();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_complete_tickets()
    {
        $this->db->where("status !=", 'Complete');
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_tickets);
        return $this->db->count_all_results();
    }

    private function _all_complete_tickest_data(){

        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->db->where("status", 'Complete');
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

     public function applicant_info($id){
        $data = array();
        $this->db->where("id", $id);
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_tickets);
        $query = $this->db->get();

        foreach ($query->result_array() as $key => $value) {
      
            $this->db->where("id", $value['requestor_id']);
            $this->db->where("deleted_at", NULL);
            $this->db->from('users');
            $value['requestor_type'] = $this->db->get()->result_array()[0]['roles'];
            $data = $value;
        }
        return $data;
    }

    public function insert_admin_notification($data){
        $insert = $this->db->insert('stream_notification_callback', $data);
        return $insert;
    }

    public function update_applicant_ticket($applicant_id, $requestor_id, $data){
        $this->db->where('id', $applicant_id);
        $this->db->where('requestor_ticket_id', $requestor_id);
        $this->db->update('applicant', $data);
    }

    public function update_admin_ticket_status($id, $data){
        $this->db->where('id', $id);
        $this->db->update('admin_tickets', $data);
    }

    public function update_administrator_reason($id, $data){
        $this->db->where('id', $id);
        $this->db->update('stream_notification_callback', $data);
    }

    public function get_administrator_reason($id){ 
        $data = array();     
        $this->db->where("id", $id);
        $this->db->from('stream_notification_callback');
        $query = $this->db->get()->result_array()[0];

        $data['reason'] = $query;
   

        $this->db->select("name , status");
        $this->db->where("id", $query['applicant_id']);
        $this->db->from('applicant');
        $data['applicant'] = $this->db->get()->result_array()[0];

        // echo "<pre>";
        // print_r($query);
        // print_r($query_user);
        // echo "</pre>";
  
        return $data;
    }

    public function notify_status($id){      
        $this->db->where("deleted_at", NULL);
        $this->db->where("requestor_id", $id);
        $this->db->from('stream_notification_callback');
        $query = $this->db->get()->result_array();
        return $query;
    }
}