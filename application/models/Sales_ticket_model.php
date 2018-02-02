<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_ticket_model extends CI_Model {
    
	var $table_tickets         = 'encoder_assign_tickets';
    var $column_order_ticket   = array('id','encoder_name','service_name',' status'); 
    var $column_search_ticket  = array('id','encoder_name','service_name',' status');
    var $order_ticket          = array('id' => 'desc');

    var $table_applicant        = 'applicant';
    var $col_applicant          = array('id','name', 'encoder_name',' contact', 'address' , 'email' , 'service', 'status' , 'created_at'); 
    var $col_search_applicant   = array('id','name', 'encoder_name',' contact', 'address' , 'email' , 'service', 'status' , 'created_at');
    var $order_applicant        = array('id' => 'desc');


	public function _tableStafRoles(){
        $query = $this->db->query('SELECT * FROM staff_position');

        if(count($query->result_array()) >= 1){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function _tableStafServices($id){
        
        $records = $this->db->query('SELECT id , service_id FROM assign_staff_service where _userID = '.$id);
        
        $service_id = array_column($records->result_array(), 'service_id');
                    $this->db->where_in('id', $service_id);
        $query  =   $this->db->get('services');
        if(count($query->result_array()) >= 1){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function _tableGetServices($service_id){
        $data =  array();
        $records    = $this->db->query('SELECT id, _userID as user_id FROM assign_staff_service where service_id = '.$service_id);
        $service_id = array_column($records->result_array(), 'user_id');

        $query = $this->db->select('id , full_name');
        $query = $this->db->where_in('id', $service_id);
        $query = $this->db->where('roles', 'encoder');
        $query = $this->db->get('users');

        if(count($query->result_array()) >= 1){
            foreach ($query->result_array() as $key => $value) {
               
                $num_rows = $this->db->where('encoder_id', $value['id']);
                $num_rows = $this->db->count_all_results('encoder_assign_tickets');
                $data[] = array(
                                'id'        => $value['id'],
                                'full_name' => $value['full_name'],
                                'tickets'   => $num_rows
                            );
                
            }
            return $data;
        }else{
            return false;
        }
    }

    public function count_filtered_enroll_tickets()
    {
        $this->get_enroll_ticket();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_enroll_tickets()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if($is_logged_in['user_rights'] == 'encoder'){
            $this->db->where("encoder_id", $is_logged_in['user_id']);
            $this->db->where("status", 'Pending');
        }
        if($is_logged_in['user_rights'] == 'sales'){
            $this->db->where("sales_id", $is_logged_in['user_id']);
        }
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_tickets);
        return $this->db->count_all_results();
    }

    public function get_datatables_enroll_tickets(){

        $this->get_enroll_ticket();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    private function get_enroll_ticket(){

        $is_logged_in = $this->session->userdata('is_logged_in');

        if($is_logged_in['user_rights'] == 'encoder'){
            $this->db->where("encoder_id", $is_logged_in['user_id']);
            $this->db->where("status", 'Pending');
        }
        if($is_logged_in['user_rights'] == 'sales'){
            $this->db->where("sales_id", $is_logged_in['user_id']);
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

    public function save_ticket($data){
        $this->db->insert("encoder_assign_tickets", $data);
        return $this->db->insert_id();
    }

    /*************************END OF ENROLL***************************/
    public function get_datatables_inquire(){

        $this->_all_inquire_applicant_data();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }
    public function count_all_inquire_applicants()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->db->where("sales_id", $is_logged_in['user_id']);
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

    private function _all_inquire_applicant_data(){

        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->db->where("sales_id", $is_logged_in['user_id']);
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

    public function save_inquire_tickets($data){
        $this->db->insert($this->table_applicant, $data);
        return $this->db->insert_id();
    }
}