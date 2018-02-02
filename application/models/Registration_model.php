<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model {

    var $table          = 'users';
    var $column_order   = array('id','full_name','username','email','roles','created_at','updated_at'); 
    var $column_search  = array('id','full_name','middle','username','roles');
    var $order          = array('id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function _tableStafServices(){
        $query = $this->db->query('SELECT * FROM services');

        if(count($query->result_array()) >= 1){
            return $query->result_array();
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
        $this->load->view('registration/registration_form');
    }

    private function _get_datatables_query(){

        $is_logged_in = $this->session->userdata('is_logged_in');


        if($is_logged_in['user_rights'] == "super"){
            $this->db->where("deleted_at",NULL);
            $this->db->from($this->table);
        }else{
            $this->db->from($this->table);
            $this->db->where("deleted_at",NULL);
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
        //  $sort = $_POST['order'][0];

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
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
       
        $this->db->from('assign_staff_service');
        $this->db->where('_userID',$id);
        $query['services'] = $this->db->get()->result_array();
        
        return $query; 
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $data  = array('deleted_by' => 1 , 'deleted_at' =>date('Y-m-d H:i:s') );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
     public function resotore_by_id($id)
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        
        $data  = array('deleted_by' => NULL , 'deleted_at' => NULL );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
}