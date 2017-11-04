<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
  class KBL_model extends CI_Model {
      
	  public function kbl_insert($data) {
		  $this->db->insert("client",$data);
	  }
	  
	  public function kbl_update($id,$data) {
	      $this->db->where("client_id",$id);
		  $this->db->update("client",$data);
	  }
	  
	  public function kbl_view($id) {
	      $result = $this->db->query("select * from client where cl_type_id =".$id. " and deleted = 0");
		  if ($result->num_rows() > 0) {
			  return $result->result();
		  }
	  }
	  
	  public function kbl_status() {
		  $status = array();
		  $result = $this->db->query("select * from status");
		  if ($result->num_rows() > 0) {
			 foreach ($result->result() as $row) {
			    $status[] = $row->status;
			 }
			 return $status;
		  }
	  }
	  
	  public function kbl_userdata($id) {
		  $result = $this->db->query("select * from users where user_id =".$id);
		  if ($result->num_rows() > 0) {
			  return $result->result();
		  }
	  }
	  
	  public function kbl_view_by_id($id) {
		  $result = $this->db->query("select * from client where client_id =".$id);
		  if ($result->num_rows() > 0) {
			  return $result->result();
		  }
	  }
	  
	  public function kbl_delete($id,$data) {
		  $this->db->where("client_id",$id);
		  $this->db->update("client",$data);
	  }
	  
	  public function kbl_insertPic($data) {
		  $this->db->insert("pictures",$data);
	  }

  }

?>