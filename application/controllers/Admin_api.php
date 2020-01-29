<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_api extends CI_Controller {
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
		 * Mengimpor berbagai model : Users dan Patients
		 */
		$this->load->model('Users_api');
		$this->load->model('Patients_api');
    }
	/**
	 * @function getAllPatients()
	 * @return mendapatkan data seluruh pasien
	 */
	public function getAllPatients()
	{
		$data = $this->Patients_api->getAllPatients();
		echo json_encode($data);
	}
	/**
	 * @function getPatientById(id)
	 * @param id pasien
	 * @return mendapatkan data pasien berdasarkan id pasien
	 */
	public function getPatientById($id)
	{
		$data = $this->Patients_api->getPatientById($id);
		echo json_encode($data);
	}
	/**
	 * @function deletePatient(id)
	 * @param id pasien
	 * @return menghapus data pasien tertentu
	 */
	public function deletePatient($id)
	{
		$result = $this->Patients_api->deletePatient($id);
		echo json_encode($result);
	}
	/**
	 * @function editPatient(id)
	 * @param id pasien
	 * @return menyimpan perubahan data diri pasien
	 */
	public function editPatient($id)
	{
		$data = array(
			'id' => $id,
			'fullname' => $this->input->post('fullname'),
			'address' => $this->input->post('address'),
			'phone_number' => $this->input->post('phone_number'),
			'email' => $this->input->post('email'),
			'education' => $this->input->post('education'),
			'job' => $this->input->post('job'),
			'religion' => $this->input->post('religion')
		);
		$result = $this->Patients_api->updatePatient($data);
		echo json_encode($result);
	}
	/**
	 * @function addPatient()
	 * @return menambahkan data pasien baru
	 */
	public function addPatient()
	{
		$data = array(
			'id_patient' => 0,
			'rm_number' => $this->input->post('rm_number'),
			'rmgizi_number' => $this->input->post('rmgizi_number'),
			'visitdate' => $this->input->post('visitdate'),
			'referral' => $this->input->post('referral'),
			'fullname' => $this->input->post('fullname'),
			'age' => $this->input->post('age'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'phone_number' => $this->input->post('phone_number'),
			'email' => $this->input->post('email'),
			'birthdate' => $this->input->post('birthdate'),
			'education' => $this->input->post('education'),
			'job' => $this->input->post('job'),
			'religion' => $this->input->post('religion')
		);
		$result = $this->Patients_api->addPatient($data);
		echo json_encode($result);
	}
	/**
	 * @function getPatientByName(fullname)
	 * @return menampilkan data pasien berdasarkan nama pasien yang dicari
	 */
	public function getPatientByName($fullname)
	{
		$data = $this->Patients_api->getPatientByName($fullname);
		echo json_encode($data);
	}
}