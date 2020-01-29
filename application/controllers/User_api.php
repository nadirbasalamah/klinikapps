<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_api extends CI_Controller {
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
		 * Mengimpor berbagai model : Users,Patients dan Nutrition_records
		 */
		$this->load->model('Users_api');
		$this->load->model('Patients_api');
		$this->load->model('Nutrition_records_api');
    }
    /**
	 * @function decrypt(string)
	 * @param string kata sandi pengguna
	 * @return melakukan decrypt kata sandi pengguna
	 */
	function decrypt($string)
	{
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'This is my secret key';
		$secret_iv = 'This is my secret iv';
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		return $output;
	}
	/**
	 * @function createPassword(passwd)
	 * @param string kata sandi pengguna
	 * @return melakukan enkripsi kata sandi pengguna
	 */
	public function createPassword($passwd) 
	{
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'This is my secret key';
		$secret_iv = 'This is my secret iv'; 
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_encrypt($passwd, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
		return $output;
    }
    /**
	 * @function registerUser()
	 * @return melakukan registrasi pengguna baru
	 */
	public function registerUser() {
        $data = array(
        'id' => 0,
        'role' => 'user',
        'fullname' => $this->input->post('fullname'),
        'username' => $this->input->post('username'),
        'password' => $this->createPassword($this->input->post('password')),
        'birthdate' => $this->input->post('birthdate'),
        'gender' => $this->input->post('gender'),
        'age' => $this->input->post('age'),
        'phone_number' => $this->input->post('phone_number'),
        'email' => $this->input->post('email'),
        'address' => $this->input->post('address'),
        'id_number' => $this->input->post('id_number'),
        'id_type' => $this->input->post('id_type'),
        'profile_picture' => "default.png"
    );
    if(strpos($data['fullname'], 'Dr.') !== false) {
        $data['role'] = 'doctor';
        $result = $this->Users_api->registration($data);
    } else {
        $result = $this->Users_api->registration($data);
    }
		echo json_encode($result);
    }
    /**
	 * @function loginUser()
	 * @return melakukan login pengguna
	 */
	public function loginUser() {
		$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->createPassword($this->input->post('password'))
		);
		$result = $this->Users_api->login($data);
		echo json_encode($result);
    }
    /**
		 * @function editProfile()
		 * @return menyimpan perubahan data profil pengguna
		 */
	public function editProfile($id) {
        $data = array(
            'id' => $id,
            'username' => $this->input->post('username'),
            'password' => $this->createPassword($this->input->post('password')),
            'phone_number' => $this->input->post('phone_number'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address')
        );
		$result = $this->Users_api->updateProfile($data);
		echo json_encode($result);
	}
	/**
	 * @function getUserById(id)
	 * @return menampilkan data profil pengguna berdasarkan id pengguna
	 */
    public function getUserById($id)
    {
		$data = $this->Users_api->getUserById($id);
		echo json_encode($data);   
    }
	/**
	 * @function getNutritionRecordById(id)
	 * @return menampilkan data rekaman gizi berdasarkan id pasien
	 */
    public function getNutritionRecordById($id)
    {
        $data = $this->Nutrition_records_api->getNutritionRecordById($id);
        echo json_encode($data);
    }
}