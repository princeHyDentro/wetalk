<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
  class J1_Model extends CI_Model {
      
	  public function j1_insert($data) {
		  $this->db->insert("client",$data);
	  }
	  
	  public function j1_update($id,$data) {
	      $this->db->where("client_id",$id);
		  $this->db->update("client",$data);
	  }
	  
	  public function j1_view($id,$user_id) {
	      $result = $this->db->query("select * from client where cl_type_id =".$id. " and user_id =".$user_id." and deleted = 0");
		  if ($result->num_rows() > 0) {
			  return $result->result();
		  }
	  }
	  
	  public function j1_status() {
		  $status = array();
		  $result = $this->db->query("select * from status");
		  if ($result->num_rows() > 0) {
			 foreach ($result->result() as $row) {
			    $status[] = $row->status;
			 }
			 return $status;
		  }
	  }
	  
	  public function j1_userdata($id) {
		  $result = $this->db->query("select * from users where user_id =".$id);
		  if ($result->num_rows() > 0) {
			  return $result->result();
		  }
	  }
	  
	  public function j1_view_by_id($id) {
		  $result = $this->db->query("select * from client where client_id =".$id);
		  if ($result->num_rows() > 0) {
			  return $result->result();
		  }
	  }
	  
	  public function j1_delete($id,$data) {
		  $this->db->where("client_id",$id);
		  $this->db->update("client",$data);
	  }
	  
	  public function j1_insertPic($data) {
		  $this->db->insert("pictures",$data);
	  }
	  
	  public function j1_updatePic($id,$data) {
		  $this->db->where("pic_id",$id);
		  $this->db->update("pictures",$data);
	  }
	  
	  public function j1_get_picture($client_id) {
		  $client_pic_id = $this->db->query("select pic_id from client where client_id =".$client_id);
		  if ($client_pic_id->num_rows() > 0) {
			  $row = $client_pic_id->row();
			  $picture = $this->db->query("select * from pictures where pic_id=".$row->pic_id);
			  if ($picture->num_rows() > 0) {
				  return $picture->result();
			  }
		  }
	  }
  }

?>