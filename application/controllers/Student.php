<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function index(){
		$this->viewStudent();
	}

	function viewStudent(){
		//1)get the studentdetails from model
		$this->load->model('StudentModel','',TRUE);
		$data['result']=$this->StudentModel->getData();
		
		//2)pass data to the view
		$dataTitle['title']="StudentDetails";
		$this->load->view('parts/header.php',$dataTitle);
		$this->load->view('student_list',$data);
	}

	function deleteStudent($id){

		//delete the particulr student record using StudentModel Model
		$dataId['id']=$id;
		$this->load->model('StudentModel','',TRUE);
		$this->StudentModel->deleteData($dataId);

		$this->viewStudent();
	}

	function registerStudent(){

		//load the register view
		$dataTitle['title']="StudentRegister";
		$this->load->view('parts/header.php',$dataTitle);
		$this->load->view('student_register');
	}

	//data get from the registration form
	function getDataStudent(){
		$name=$this->input->post('name');
		$school=$this->input->post('school');
		$address=$this->input->post('address');
		$grade=$this->input->post('grade');
		$tel=$this->input->post('tel');
		$email=$this->input->post('email');
		$password=$this->input->post('password');


		$data=array("name"=>$name,"school"=>$school,"address"=>$address,"grade"=>$grade,"tel"=>$tel,"email"=>$email,"password"=>$password,"date"=>date("Y-m-d"));
		$this->load->model('StudentModel','',TRUE);
		$this->StudentModel->saveStudent($data);


		$this->viewStudent();
	}

	//this function relevant for updating form
	function getStudent($id){
		//get the specific student data from the model
		$dataId['id']=$id;
		$this->load->model('StudentModel','',TRUE);
		$data['result']=$this->StudentModel->getStudentDetails($dataId);
		//print_r($data);

		//pass the data updating form
		$dataTitle['title']="StudentUpdate";
		$this->load->view('parts/header.php',$dataTitle);
		$this->load->view('student_update',$data);
	}

	//update student details
	function updateStudent(){
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$school=$this->input->post('school');
		$address=$this->input->post('address');
		$grade=$this->input->post('grade');
		$tel=$this->input->post('tel');
		$email=$this->input->post('email');
		$password=$this->input->post('password');


		$data=array("id"=>$id,"name"=>$name,"school"=>$school,"address"=>$address,"grade"=>$grade,"tel"=>$tel,"email"=>$email,"password"=>$password,"date"=>date("Y-m-d"));
		$this->load->model('StudentModel','',TRUE);
		$this->StudentModel->updateStudent($data);


		$this->viewStudent();
	}
	
}
