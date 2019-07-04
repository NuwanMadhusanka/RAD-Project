<?php

class Login extends CI_Controller {

	public function index(){
		//$this->viewStudent();
	}

	function login(){

		//$this->load->model('LoginModel','',TRUE);
		//$isValidUser['data']=$this->LoginModel->isValidUser($data);
		$CI =& get_instance();
		
		

		$email=$CI->input->post('email');
		$password=$CI->input->post('password');

		$data=array("email"=>$email,"password"=>$password);

		print_r($data);
		// $this->viewStudent();
	}
	
}
