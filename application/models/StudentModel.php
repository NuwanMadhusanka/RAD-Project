<?php

class StudentModel extends CI_Model{

	//get the all student data from db 
	public function getData(){
		 $query=$this->db->get('student');
		 return $query->result();
	}

	//delete the student's data from the database
	public function deleteData($data){
		//delete record user table
		 $this->db->where('student_id',$data['id']);
		 $this->db->delete('user');

		 //delete record in transaction table
		 $this->db->where('student_id',$data['id']);
		 $this->db->delete('transaction');

		//delete record in student table
		 $this->db->where('id',$data['id']);
		 $this->db->delete('student');
	}

	//insert student's data to the database
	public function saveStudent($data){

		 //$this->db->set($data);

		 //insert data to student table
		 $this->db->set('name',$data['name']);
		 $this->db->set('address',$data['address']);
		 $this->db->set('school',$data['school']);
		 $this->db->set('tel',$data['tel']);
		 $this->db->set('date',$data['date']);
		 $this->db->set('grade',$data['grade']);
		 $this->db->set('month',$data['month']);
		 $this->db->set('fee',$data['fee']);
		 $this->db->insert('student');

		//get registered student 
		$this->db->where('address',$data['address']);
		$this->db->where('name',$data['name']);
		$query=$this->db->get('student');
		$arr=$query->result();
		//print_r($arr);
		//print($arr['result']['id']);

		 //insert data to user table
		 $this->db->set('password',$data['password']);
		 $this->db->set('email',$data['email']);
		 $this->db->set('role',2);
		 $this->db->set('student_id',$arr['0']->id);
		 $this->db->insert('user');
	}

	//get specific student's data from the database
	public function getStudentDetails($data){
		$this->db->select('student.id');
		$this->db->select('name');
		$this->db->select('address');
		$this->db->select('tel');
		$this->db->select('school');
		$this->db->select('grade');
		$this->db->select('fee');
		$this->db->select('email');
		$this->db->select('password');
		$this->db->from('student');
		$this->db->where('student.id',$data['id']);
		$this->db->join('user','user.student_id=student.id');
		$query=$this->db->get();

		return $query->result();
	}

	//update specifc student's details
	public function updateStudent($data){
		//print_r($data);
		//create data structure for student
		$arr=array('name'=>$data['name'],'school'=>$data['school'],'grade'=>$data['grade'],'tel'=>$data['tel'],'address'=>$data['address'],'fee'=>$data['fee']);
		
		$this->db->where('id', $data['id']);
		$this->db->update('student', $arr);

		//user
		$arr1=array('email'=>$data['email'],'password'=>$data['password']);
		$this->db->where('student_id',$data['id']);
		$this->db->update('user',$arr1);
	}
}
