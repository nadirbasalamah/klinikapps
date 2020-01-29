<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_api extends CI_Controller {
    public function __construct() {
		parent::__construct();
		/**
		 * Mengimpor berbagai dependensi :
		 * 1. form untuk mengirim form request dari pengguna
		 * 2. url untuk pemetaan alamat url
		 */
		$this->load->helper('form');
		$this->load->helper('url');
		/**
		 * Mengimpor berbagai model : Users, Patients dan Nutrition_records
		 */
		$this->load->model('Users_api');
        $this->load->model('Patients_api');
        $this->load->model('Nutrition_records_api');
    }
}