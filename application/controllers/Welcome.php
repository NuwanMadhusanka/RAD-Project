<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$dataTitle['title']="SchoolDrive";
		$this->load->view('parts/header.php',$dataTitle);
		$this->load->view('login.php');
	}
}
