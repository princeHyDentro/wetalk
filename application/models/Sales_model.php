<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

    var $table_applicant        = 'applicant';
    var $col_applicant          = array('id','name', 'encoder_name',' contact', 'address' , 'email' , 'service', 'status' , 'created_at'); 
    var $col_search_applicant   = array('id','name', 'encoder_name',' contact', 'address' , 'email' , 'service', 'status' , 'created_at');
    var $order_applicant        = array('id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        $this->load->helper('url');
        $this->load->view('ticket/create_enroll_applicant');
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

    public function _tableStafRoles(){
        $query = $this->db->query('SELECT * FROM staff_position');

        if(count($query->result_array()) >= 1){
            return $query->result_array();
        }else{
            return false;
        }
    }

	private function _get_list_tickets_datatables_query(){

        $is_logged_in = $this->session->userdata('is_logged_in');

		$this->db->from($this->table_applicant);

        $i = 0;

        foreach ($this->column_search as $item){

            if($_POST['search']['value'])
            {

                    if($i===0)
                    {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    }else{
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search) - 1 == $i)
                
                       $this->db->group_end(); 
            }
                    $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

	public function get_datatables_tickets()
    {
        $this->_get_list_tickets_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

	function count_filtered_tickets()
    {
        $this->_get_list_tickets_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_inquire()
    {
        $this->db->where("status","inquire");
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

	public function count_all_tickets()
    {
     	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    /***********************deleted staff************************/
    private function _get_dl_datatables_query(){

        $is_logged_in = $this->session->userdata('is_logged_in');

        if($is_logged_in['user_rights'] == "super"){
            $this->db->where("deleted_at !=",NULL);
            $this->db->from($this->table);
        }else{
            $this->db->from($this->table);
            $this->db->where("deleted_at !=",NULL);
            $this->db->where("created_by",$is_logged_in['user_id']);
        }

        $i = 0;
  
        foreach ($this->column_search as $item){

            if($_POST['search']['value'])
            {
                    if($i===0)
                    {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    }else{
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search) - 1 == $i)

                       $this->db->group_end();
            }
                    $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_dl_datatables()
    {
        $this->_get_dl_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }
    public function dl_count_filtered()
    {
        $this->_get_dl_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    /**********************END******************************/

    public function get_by_id($id)
    {
        $data = array();
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query['user_info'] = $this->db->get()->result_array();
        return $query; 
    }

    public function resotore_by_id($id){
        $is_logged_in = $this->session->userdata('is_logged_in');
        
        $data  = array('deleted_by' => NULL , 'deleted_at' => NULL );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }


    /*************************FOR ENROLLED APPLICANT**********************/

    public function sales_list_of_all_enroll_applicant(){

        $this->sales_enroll_list();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    private function sales_enroll_list(){

        $is_logged_in = $this->session->userdata('is_logged_in');

        $this->db->where("sales_id", $is_logged_in['user_id']);
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

    public function count_all_enroll_applicants(){

        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->db->where("sales_id", $is_logged_in['user_id']);
        $this->db->where("status", 'Enrolled');
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_applicant);
        return $this->db->count_all_results();
    }

    public function count_filtered_enroll_applicants(){
        $this->sales_enroll_list();
        $query = $this->db->get();
        return $query->num_rows();
    }

    /******************************END FOR ENROLLED APPLICANT*********************/

    /*---------------------------FOR INQUIRED APPLICANT--------------------*/
    public function all_inquire_list(){
        $this->all_inquire_list_data();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    private function all_inquire_list_data(){

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

    public function count_all_inquire_list(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        $this->db->where("sales_id", $is_logged_in['user_id']);
        $this->db->where("status", 'Inquired');
        $this->db->where("deleted_at", NULL);
        $this->db->from($this->table_applicant);
        return $this->db->count_all_results();
    }

    public function count_filtered_inquire_list(){
        $this->all_inquire_list_data();
        $query = $this->db->get();
        return $query->num_rows();
    }

    /************************END FOR INQUIRED APPLICANT**********************/
}