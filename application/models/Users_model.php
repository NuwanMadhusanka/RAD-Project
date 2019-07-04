<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
		public function getAllUsers(){
			$query = $this->db->get('maintain');//data base change
			return $query->result(); 
		}
 
		public function insertuser($user){
			return $this->db->insert('maintain', $user);
		}
 
		public function getUser($id){
			$query = $this->db->get_where('maintain',array('main_id'=>$id));
			return $query->row_array();
		}
 
		public function updateuser($user, $id){
			$this->db->where('maintain.main_id', $id);
			return $this->db->update('maintain', $user);
		}
 
		public function deleteuser($id){
			$this->db->where('maintain.main_id', $id);
			return $this->db->delete('maintain');
		}
 
	}
?>
