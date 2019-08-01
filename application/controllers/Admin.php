<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('url'); 		
		
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->load->model('Users');
	}

	public function index()
	{
		$this->load->view('admin/index');
	}	

	public function viewStudents()
	{
		$data['students'] = $this->Users->getAllStudents();
		$this->load->view('admin/students_list',$data);
	}

	public function editProfile()
	{
		$this->load->view('admin/edit_profile');
	}

}