<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model {
//,'user_fname','user_lname','user_mname','user_username','user_password','user_email','user_rights','user_datecreated','user_updateddate',null,null
    var $table = 'users';
    var $column_order = array('user_id','user_lname','user_username','user_email','user_rights','user_datecreated','user_updateddate'); 
    var $column_search = array('user_fname','user_lname','user_mname','user_username','user_rights');
    var $order = array('user_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function employees_table(){
        $query = $this->db->query('SELECT * FROM users');
        if(count($query->result()) >= 1){
            return $query->result();
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
            $this->db->where("deleted",0);
            $this->db->from($this->table);
        }else{
            $this->db->from($this->table);
            $this->db->where("deleted",0);
            $this->db->where("added_by",$is_logged_in['user_id']);
        }

        $i = 0;
    // print_r($_POST['order']);
    // exit;
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

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
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

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('user_id',$id);
        $query = $this->db->get();

        return $query->row();
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
        $data  = array('deleted' => 1 , 'user_datedeleted' =>date('Y-m-d H:i:s') );
        $this->db->where('user_id', $id);
        $this->db->update($this->table, $data);
    }
}