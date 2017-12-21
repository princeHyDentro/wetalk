<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services_model extends CI_Model {
	var $table          = 'services';
    var $column_order   = array('id','service_name','service_desc','created_at','updated_at'); 
    var $column_search  = array('id','service_name');
    var $order          = array('id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	private function _get_datatables_query(){

		$this->db->from($this->table);
        $this->db->where("deleted_at",NULL);

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


    /*deleted services*/
    public function get_delete_datatables()
    {
        $this->_get_service_datatables_query();
        
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        return $query->result();
    }
    public function deleted_count_filtered()
    {
        $this->_get_service_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
   	private function _get_service_datatables_query(){

		$this->db->from($this->table);
        $this->db->where("deleted_at !=",NULL);

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

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
   
    /*end deleted services*/


    /*CRUD*/

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
        $data  = array('deleted_at' =>date('Y-m-d H:i:s') );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
     public function resotore_by_id($id)
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        
        $data  = array('deleted_at' => NULL );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
    public function get_by_id($id)
    {
        $data = array();

        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get()->result_array();
        return $query; 
    }
}