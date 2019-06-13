<?php

class StudentModel extends CI_Model{

	//get the all student data from db 
	public function getData(){
		 $query=$this->db->get('student');
		 return $query->result();
	}

	//delete the student's data from the database
	public function deleteData($data){
		//delete student_month record
		 $this->db->where('student_id',$data['id']);
		 $this->db->delete('student_month');

		 $this->db->where('id',$data['id']);
		 $this->db->delete('student');
	}

	//insert student's data to the database
	public function saveStudent($data){

		 $this->db->set($data);
   		 $this->db->insert('student');
	}

	//get specific student's data from the database
	public function getStudentDetails($data){
		$this->db->where('id',$data['id']);
		$query=$this->db->get('student');

		return $query->result();
	}

	//update specifc student's details
	public function updateStudent($data){
		$this->db->where('id', $data['id']);
		$this->db->update('student', $data);
	}
}
