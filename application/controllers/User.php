<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		/**
		 * Mengimpor berbagai dependensi :
		 * 1. form untuk mengirim form request dari pengguna
		 * 2. url untuk pemetaan alamat url
		 * 3. library session untuk menyimpan session pengguna
		 */
		$this->load->helper('form');
		$this->load->helper('url'); 		
		
		$this->load->library('session');
		/**
		 * Mengimpor berbagai model : Users,Patients dan Nutrition_records
		 */
		$this->load->model('Users');
		$this->load->model('Patients');
		$this->load->model('Nutrition_records');
	}
	/**
	 * @function index()
	 * @return menampilkan halaman awal / halaman login
	 */
	public function index()
	{
		$this->load->view('main/index');
	}
	/**
	 * @function register()
	 * @return menampilkan halaman registrasi
	 */
	public function register()
	{
		$data['message_display'] = "";
		$this->load->view('main/register',$data);
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
	 * @function new_user_registration()
	 * @return melakukan registrasi pengguna baru
	 */
	public function new_user_registration() {
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
			$result = $this->Users->registration($data);
		} else {
			$result = $this->Users->registration($data);
		}
		if ($result == TRUE) {
			$this->load->view('main/index', $data);
		} else {
			$data['message_display'] = 'Username telah digunakan, silahkan pilih username yang lain!';
			$this->load->view('main/register', $data);
		}
	}
	/**
	 * @function index()
	 * @return melakukan login pengguna
	 */
	public function user_login_process() {
	
		if(isset($this->session->userdata['logged_in'])){
				$this->load->view('user/index');
		}	else {
				$this->load->view('main/index');
		}
		$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->createPassword($this->input->post('password'))
		);
		$result = $this->Users->login($data);
		if ($result == TRUE) {
		$username = $this->input->post('username');
		$result = $this->Users->getUser($username);
		if ($result != false) {

		$session_data = array(
		'username' => $result[0]->username,
		'fullname' => $result[0]->fullname,
		'id' => $result[0]->id,
		'password' => $this->decrypt($result[0]->password),
		'profile_picture' => $result[0]->profile_picture,
		'role' => $result[0]->role,
		'phone_number' => $result[0]->phone_number,
		'email' => $result[0]->email,
		'address' => $result[0]->address
		);
		// Add user data in session
		$this->session->set_userdata('logged_in', $session_data);
		if ($result[0]->role == 'admin') {
			redirect(base_url('Admin/index'),'refresh');
		} else if($result[0]->role == 'doctor') {
			redirect(base_url('Doctor/index'),'refresh');
		} else {
			redirect(base_url('User/viewDashboard'),'refresh');
		}
		}
		} else {
			echo("<script>alert('Username atau password Anda Salah!')</script>");
			redirect(base_url('User/index'), 'refresh');
		}
		
		}
		
		/**
		 * @function logout()
		 * @return melakukan logout
		 */
		public function logout() {
		
		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->load->view('main/index');
		}
		/**
		 * @function viewDashboard()
		 * @return menampilkan halaman dashboard untuk pengunjung
		 */
		public function viewDashboard()
		{
			$this->load->view('user/index');
		}
		/**
		 * @function editProfile()
		 * @return menampilkan halaman edit profil pengguna
		 */
		public function editProfile()
		{
			$this->load->view('user/edit_profile');
		}
		/**
		 * @function edit()
		 * @return menyimpan perubahan data profil pengguna
		 */
		public function edit()
		{
			$new_name = time().$_FILES["profile_picture"]['name'];
            $config['upload_path'] = FCPATH ."./profile_pictures/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config); 
            $this->upload->initialize($config);        
            if ( ! $this->upload->do_upload('profile_picture'))  {
                $file_loc = $this->session->userdata['logged_in']['profile_picture'];
            }
            else
            { 
            $upload_data = $this->upload->data();
            $file_loc = $upload_data['file_name'];
			}
			$data = array(
				'id' => $this->session->userdata['logged_in']['id'],
				'username' => $this->input->post('username'),
				'password' => $this->createPassword($this->input->post('password')),
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'profile_picture' => $file_loc
			);
			$role = $this->session->userdata['logged_in']['role'];
			$this->Users->updateProfile($data);
			echo("<script>alert('Data profil berhasil diubah!')</script>");
			$this->session->userdata['logged_in']['username'] = $data['username'];
			$this->session->userdata['logged_in']['password'] = $this->decrypt($data['password']);
			$this->session->userdata['logged_in']['phone_number'] = $data['phone_number'];
			$this->session->userdata['logged_in']['email'] = $data['email'];
			$this->session->userdata['logged_in']['address'] = $data['address'];
			$this->session->userdata['logged_in']['profile_picture'] = $file_loc;
			if ($role == 'admin') {
				redirect(base_url('Admin/index'),'refresh');
			} else if($role == 'doctor') {
				redirect(base_url('Doctor/index'),'refresh');
			} else {
				redirect(base_url('User/viewDashboard'),'refresh');
			}
		}
		/**
		 * @function viewNutritionRecord()
		 * @return menampilkan data gizi pasien kepada pengguna (pengunjung)
		 */
		public function viewNutritionRecord()
		{
			$fullname = $this->session->userdata['logged_in']['fullname'];
			$data['patient'] = $this->Nutrition_records->getNutritionRecordByName($fullname);
			$this->load->view('user/patient_page',$data);
		}
		/**
		 * @function sendMessage()
		 * @return mengirim pesan kepada ahli gizi
		 */
		public function sendMessage()
		{
			$phone_number = "6281348026017";
			$message = $this->input->post('message');
			$link = " https://api.whatsapp.com/send?phone=". $phone_number . "&text=" . rawurlencode($message);
			header("location:" . $link);
		}
}