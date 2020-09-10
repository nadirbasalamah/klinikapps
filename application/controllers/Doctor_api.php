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
		 * Mengimpor berbagai model : Users, Patients, Nutrition_records dan Articles
		 */
		$this->load->model('Users_api');
        $this->load->model('Patients_api');
		$this->load->model('Nutrition_records_api');
		$this->load->model('Articles_api');
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
	 * @function viewPatient(id)
	 * @param id pasien
	 * @return mendapatkan data pasien berdasarkan id pasien
	 */
	public function getPatientById($id)
	{
		$data = $this->Patients_api->getPatientById($id);
		echo json_encode($data);
	}
	/**
	 * @function checkImt(imt)
	 * @param double imt pasien
	 * @return menentukan status gizi berdasarkan nilai IMT
	 */
	public function checkImt($imt)
	{
		if ($imt < 18.5) {
			return "underweight";
		} else if($imt >= 18.5 && $imt <= 22.9) {
			return "normal";
		} else if($imt >= 23 && $imt <= 29.9) {
			return "overweight";
		} else {
			return "obese";
		}
	}
	/**
	 * @function updateNutritionRecord(id)
	 * @param id pasien
	 * @return melakukan perubahan data gizi pada pasien tertentu
	 */
	public function updateNutritionRecord($id)
	{
		$bb = $this->input->post('bb');
		
		$tb = $this->input->post('tb');
		$imt = $bb / pow(($tb / 100),2);
		$status = $this->checkImt($imt);
		
		$energi = $this->input->post('energi');
		$persen_karbohidrat = $this->input->post('persen_karbohidrat');
		$gram_karbohidrat = ($persen_karbohidrat / 100) * $energi / 4;

		$persen_protein = $this->input->post('persen_protein');
		$gram_protein = ($persen_protein / 100) * $energi / 4;
		
		$persen_lemak = $this->input->post('persen_lemak');
		$gram_lemak = ($persen_lemak / 100) * $energi / 9;

		$data = array(
			'id' => 0,
			'id_patient' => $id,
			'bb' => $bb,
			'tb' => $tb,
			'lila' => $this->input->post('lila'),
			'imt' => $imt,
			'bbi' => $this->input->post('bbi'),
			'status' => $status,
			'fat' => $this->input->post('fat'),
			'visceral_fat' => $this->input->post('visceral_fat'),
			'muscle' => $this->input->post('muscle'),
			'body_age' => $this->input->post('body_age'),
			'gda' => $this->input->post('gda'), 
			'gdp' => $this->input->post('gdp'), 
			'gd2jpp' => $this->input->post('gd2jpp'), 
			'asam_urat' => $this->input->post('asam_urat'), 
			'trigliserida' => $this->input->post('trigliserida'), 
			'kolesterol' => $this->input->post('kolesterol'), 
			'ldl' => $this->input->post('ldl'), 
			'hdl' => $this->input->post('hdl'), 
			'ureum' => $this->input->post('ureum'), 
			'kreatinin' => $this->input->post('kreatinin'), 
			'sgot' => $this->input->post('sgot'), 
			'sgpt' => $this->input->post('sgpt'), 
			'tensi' => $this->input->post('tensi'), 
			'rr' => $this->input->post('rr'), 
			'suhu' => $this->input->post('suhu'),
			'lainnya' => $this->input->post('lainnya'), 
			'oedema' => $this->input->post('oedema'), 
			'aktivitas' => $this->input->post('aktivitas'), 
			'durasi_olahraga' => $this->input->post('durasi_olahraga'), 
			'jenis_olahraga' => $this->input->post('jenis_olahraga'), 
			'diagnosa_dahulu' => $this->input->post('diagnosa_dahulu'), 
			'diagnosa_skrg' => $this->input->post('diagnosa_skrg'), 
			'nafsu_makan' => $this->input->post('nafsu_makan'), 
			'frekuensi_makan' => $this->input->post('frekuensi_makan'), 
			'alergi' => $this->input->post('alergi'), 
			'makanan_kesukaan' => $this->input->post('makanan_kesukaan'), 
			'dietary_nasi' => preg_replace('~(?<=\s)\s~', '&nbsp;', $this->input->post('dietary_nasi')) , 
			'dietary_lauk_hewani' => $this->input->post('dietary_lauk_hewani'), 
			'dietary_lauk_nabati' => $this->input->post('dietary_lauk_nabati'), 
			'dietary_sayur' => $this->input->post('dietary_sayur'), 
			'dietary_sumber_minyak' => $this->input->post('dietary_sumber_minyak'), 
			'dietary_minuman' => $this->input->post('dietary_minuman'), 
			'dietary_softdrink' => $this->input->post('dietary_softdrink'), 
			'dietary_jus' => $this->input->post('dietary_jus'), 
			'dietary_suplemen' => $this->input->post('dietary_suplemen'), 
			'dietary_lainnya' => $this->input->post('dietary_lainnya'), 
			'lain_lain' => $this->input->post('lain_lain'), 
			'diagnosa' => $this->input->post('diagnosa'),
			'angka_tb_bb' => $this->input->post('angka_tb_bb'),
			'keterangan_tb_bb' => $this->input->post('keterangan_tb_bb'),
			'angka_bb_u' => $this->input->post('angka_bb_u'),
			'keterangan_bb_u' => $this->input->post('keterangan_bb_u'),
			'angka_tb_u' => $this->input->post('angka_tb_u'),
			'keterangan_tb_u' => $this->input->post('keterangan_tb_u'),
			'angka_imt_u' => $this->input->post('angka_imt_u'),
			'keterangan_imt_u' => $this->input->post('keterangan_imt_u'),
			'angka_hc_u' => $this->input->post('angka_hc_u'),
			'keterangan_hc_u' => $this->input->post('keterangan_hc_u'), 
			'energi' => $energi, 
			'keterangan_inter' => $this->input->post('keterangan_inter'),
			'persen_karbohidrat' => $persen_karbohidrat,
			'gram_karbohidrat' => $gram_karbohidrat, 
			'persen_protein' => $persen_protein, 
			'gram_protein' => $gram_protein, 
			'persen_lemak' => $persen_lemak,
			'gram_lemak' => $gram_lemak,
			'mon_date' => $this->input->post('mon_date'),
			'result' => $this->input->post('result')
		);
		$result = $this->Nutrition_records_api->addNutritionRecord($data);
		echo json_encode($result);
	}
	/**
	 * @function getPatientByName(fullname)
	 * @return menampilkan daftar pasien berdasarkan nama pasien yang dicari
	 */
	public function getPatientByName($fullname)
	{
		$data = $this->Patients_api->getPatientByName($fullname);
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
	/**
	 * @function getAllArticles()
	 * @return menampilkan seluruh data artikel gizi
	 */
	public function getAllArticles()
	{
		$data = $this->Articles_api->getAllArticles();
		echo json_encode($data);
	}
	/**
	 * @function getAllGuides()
	 * @return menampilkan seluruh data panduan gizi
	 */
	public function getAllGuides()
	{
		$data = $this->Articles_api->getAllGuides();
		echo json_encode($data);
	}
	/**
	 * @function getArticleById(id)
	 * @return menampilkan data artikel tertentu
	 */
	public function getArticleById($id)
	{
		$data = $this->Articles_api->getArticleById($id);
		echo json_encode($data);
	}
	/**
	 * @function addArticle()
	 * @return menambahkan data artikel gizi terbaru
	 */
	public function addArticle()
	{
		$data = array(
			'id' => 0,
			'author' => $this->input->post('author'),
			'type' => $this->input->post('type'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'source' => $this->input->post('source')
		);
		$result = $this->Articles_api->addArticle($data);
		echo json_encode($result);
	}
	/**
	 * @function deleteArticle(id)
	 * @return menghapus data artikel tertentu
	 */
	public function deleteArticle($id)
	{
		$result = $this->Articles_api->deleteArticle($id);
		echo json_encode($result);
	}
	/**
	 * @function updateArticle(id)
	 * @return mengubah data artikel
	 */
	public function updateArticle($id)
	{
		$data = array(
			'id' => $id,
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'source' => $this->input->post('source')
		);
		$result = $this->Articles_api->updateArticle($data);
		echo json_encode($result);
	}
}