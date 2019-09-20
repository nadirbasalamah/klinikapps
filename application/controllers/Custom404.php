<?php 
class Custom404 extends CI_Controller 
{
 public function __construct() 
 {
    parent::__construct(); 
 } 
/**
	 * @function index()
	 * @return menampilkan halaman 404 ketika mengakses alamat url yang tidak tersedia
	 */
 public function index() 
 { 
    $this->output->set_status_header('404'); 
    $this->load->view('main/not_found');
 } 
} 