<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class UserDriver extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Users_model');
	}
 
	public function index(){
		$data['users'] = $this->Users_model->getAllUsers();
		$this->load->view('user_list.php', $data);
	}
 
	public function addnew(){
		$this->load->view('addform.php');
	}
 
	public function insert(){
		$user['title'] = $this->input->post('title');
		$user['amount'] = $this->input->post('amount');
		$user['date'] = $this->input->post('date');
 
		$query = $this->Users_model->insertuser($user);
 
		if($query){
			header('location:'.base_url()."index.php/UserDriver/");
		}
 
	}
 
	public function edit($id){
		$data['user'] = $this->Users_model->getUser($id);
		$this->load->view('editform', $data);
	}
 
	public function update($id){
		$user['title'] = $this->input->post('title');
		$user['amount'] = $this->input->post('amount');
		$user['date'] = $this->input->post('date');
 
		$query = $this->Users_model->updateuser($user, $id);
 
		if($query){
			header('location:'.base_url()."index.php/UserDriver/");
		}
	}
 
	public function delete($id){
		$query = $this->Users_model->deleteuser($id);
 
		if($query){
			header('location:'.base_url()."index.php/UserDriver/");
		}
	}
}
 
 
?>