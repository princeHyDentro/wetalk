<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

    var $table          = 'applicant';
    var $column_order   = array('id','name','contact','	address','email	','service','status'); 
    var $column_search  = array('id','name','contact','address','email','service','status');
    var $order          = array('id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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
   
    public function index(){
        $this->load->helper('url');
        $this->load->view('ticket/create_enroll_applicant');
    }

    private function _get_inquire_datatables_query(){

        $is_logged_in = $this->session->userdata('is_logged_in');

		$this->db->where("status","inquire");
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item){

            if($_POST['search']['value']) // if datatable send POST for search
            {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }else{
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search) - 1 == $i) //last loop
                
                       $this->db->group_end(); //close bracket
            }
                    $i++;
        }
       // print_r($this->column_order[$_POST['order']['0']['column']]);
              //  $sort = $_POST['order'][0];

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

	private function _get_list_tickets_datatables_query(){

        $is_logged_in = $this->session->userdata('is_logged_in');

		$this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item){

            if($_POST['search']['value']) // if datatable send POST for search
            {

                    if($i===0) // first loop
                    {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    }else{
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search) - 1 == $i) //last loop
                
                       $this->db->group_end(); //close bracket
            }
                    $i++;
        }
        // print_r($this->column_order[$_POST['order']['0']['column']]);
        //  $sort = $_POST['order'][0];

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }


    public function get_datatables_inquire()
    {
        $this->_get_inquire_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }
	

	public function get_datatables_tickets()
    {
        $this->_get_list_tickets_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_enroll()
    {
        $this->_get_enroll_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	function count_filtered_inquire()
    {
        $this->_get_inquire_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
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
	
	public function count_all_enroll()
    {
        $this->db->where("status","enroll");
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }
	
	public function count_all_tickets()
    {
     	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    /*deleted staff*/
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

            if($_POST['search']['value']) // if datatable send POST for search
            {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }else{
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search) - 1 == $i) //last loop
                
                       $this->db->group_end(); //close bracket
            }
                    $i++;
        }
        // print_r($this->column_order[$_POST['order']['0']['column']]);
        //         $sort = $_POST['order'][0];

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_dl_datatables()
    {
        $this->_get_dl_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }
    function dl_count_filtered()
    {
        $this->_get_dl_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
   
    /*end deleted staff*/

    public function get_by_id($id)
    {
        $data = array();

        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query['user_info'] = $this->db->get()->result_array();
       
        /*$this->db->from('assign_staff_service');
        $this->db->where('_userID',$id);
        $query['services'] = $this->db->get()->result_array();*/
        
        return $query; 
    }

    public function save_ticket($data){
        $this->db->insert("encoder_assign_tickets", $data);
        return $this->db->insert_id();
    }

    public function save($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data){
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id){
        //$data  = array('deleted_by' => 1 , 'deleted_at' =>date('Y-m-d H:i:s') );
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function resotore_by_id($id){
        $is_logged_in = $this->session->userdata('is_logged_in');
        
        $data  = array('deleted_by' => NULL , 'deleted_at' => NULL );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }



    /*----------------------------------TICKETS---------------------------------------------*/
    
    var $table_tickets         = 'encoder_assign_tickets';
    var $column_order_ticket   = array('id','encoder_name','service_name',' status'); 
    var $column_search_ticket  = array('id','encoder_name','service_name',' status');
    var $order_ticket          = array('id' => 'desc');

    public function get_datatables_enroll_tickets(){

        $this->_get_enroll_ticket_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_enroll_tickets()
    {
        $this->_get_enroll_ticket_datatables_query();
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

    private function _get_enroll_ticket_datatables_query(){

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

            if($_POST['search']['value']) // if datatable send POST for search
            {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }else{
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_ticket) - 1 == $i) //last loop
                
                       $this->db->group_end(); //close bracket
            }
                    $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_ticket[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    /*----------------------------------END-------------------------------------------------*/
}