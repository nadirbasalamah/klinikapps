<?php
class Nutrition_records_api extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Nutrition_records_api');
    }
    /**
	 * @function addNutritionRecord(data)
     * @param array data gizi pasien
	 * @return menambahkan data gizi baru
	 */
    public function addNutritionRecord($data)
    {
        $this->db->where('id_patient',$data['id_patient']);
        $query = $this->db->get('nutrition_records',1);
        if ($query->num_rows() == 0) {
            $this->db->insert('nutrition_records',$data);
        if ($this->db->affected_rows() > 0) {
            $res['status'] = true;
            $res['message'] = 'nutrition record added successfully!';
        } else {
            $res['status'] = false;
            $res['message'] = 'nutrition record failed to add!';
        }
        } else {
            //update nutrition record
            $query = $this->updateNutritionRecord($data);
            if ($query) {
                $res['status'] = true;
                $res['message'] = 'nutrition record updated successfully!';
            } else {
                $res['status'] = false;
                $res['message'] = 'nutrition record failed to update!';
            }
        }
        return $res;
    }
    /**
	 * @function updateNutritionRecord(data)
     * @param array data gizi pasien
	 * @return memperbarui data gizi pasien
	 */
    public function updateNutritionRecord($data)
    {
        $this->db->set('bb',$data['bb']);
        $this->db->set('tb',$data['tb']);
        $this->db->set('lila',$data['lila']);
        $this->db->set('imt',$data['imt']);
        $this->db->set('bbi',$data['bbi']);
        $this->db->set('status',$data['status']);
        $this->db->set('fat',$data['fat']);
        $this->db->set('visceral_fat',$data['visceral_fat']);
        $this->db->set('muscle',$data['muscle']);
        $this->db->set('body_age',$data['body_age']);
        $this->db->set('gda',$data['gda']);
        $this->db->set('gdp',$data['gdp']);
        $this->db->set('gd2jpp',$data['gd2jpp']);
        $this->db->set('asam_urat',$data['asam_urat']);
        $this->db->set('trigliserida',$data['trigliserida']);
        $this->db->set('kolesterol',$data['kolesterol']);
        $this->db->set('ldl',$data['ldl']);
        $this->db->set('hdl',$data['hdl']);
        $this->db->set('ureum',$data['ureum']);
        $this->db->set('kreatinin',$data['kreatinin']);
        $this->db->set('sgot',$data['sgot']);
        $this->db->set('sgpt',$data['sgpt']);
        $this->db->set('tensi',$data['tensi']);
        $this->db->set('rr',$data['rr']);
        $this->db->set('suhu',$data['suhu']);
        $this->db->set('lainnya',$data['lainnya']);
        $this->db->set('oedema',$data['oedema']);
        $this->db->set('aktivitas',$data['aktivitas']);
        $this->db->set('durasi_olahraga',$data['durasi_olahraga']);
        $this->db->set('jenis_olahraga',$data['jenis_olahraga']);
        $this->db->set('diagnosa_dahulu',$data['diagnosa_dahulu']);
        $this->db->set('diagnosa_skrg',$data['diagnosa_skrg']);
        $this->db->set('nafsu_makan',$data['nafsu_makan']);
        $this->db->set('frekuensi_makan',$data['frekuensi_makan']);
        $this->db->set('alergi',$data['alergi']);
        $this->db->set('makanan_kesukaan',$data['makanan_kesukaan']);
        $this->db->set('dietary_nasi',$data['dietary_nasi']);
        $this->db->set('dietary_lauk_hewani',$data['dietary_lauk_hewani']);
        $this->db->set('dietary_lauk_nabati',$data['dietary_lauk_nabati']);
        $this->db->set('dietary_sayur',$data['dietary_sayur']);
        $this->db->set('dietary_sumber_minyak',$data['dietary_sumber_minyak']);
        $this->db->set('dietary_minuman',$data['dietary_minuman']);
        $this->db->set('dietary_softdrink',$data['dietary_softdrink']);
        $this->db->set('dietary_jus',$data['dietary_jus']);
        $this->db->set('dietary_suplemen',$data['dietary_suplemen']);
        $this->db->set('dietary_lainnya',$data['dietary_lainnya']);
        $this->db->set('lain_lain',$data['lain_lain']);
        $this->db->set('diagnosa',$data['diagnosa']);
        $this->db->set('angka_tb_bb',$data['angka_tb_bb']);
        $this->db->set('keterangan_tb_bb',$data['keterangan_tb_bb']);
        $this->db->set('angka_bb_u',$data['angka_bb_u']);
        $this->db->set('keterangan_bb_u',$data['keterangan_bb_u']);
        $this->db->set('angka_tb_u',$data['angka_tb_u']);
        $this->db->set('keterangan_tb_u',$data['keterangan_tb_u']);
        $this->db->set('angka_imt_u',$data['angka_imt_u']);
        $this->db->set('keterangan_imt_u',$data['keterangan_imt_u']);
        $this->db->set('angka_hc_u',$data['angka_hc_u']);
        $this->db->set('keterangan_hc_u',$data['keterangan_hc_u']);
        $this->db->set('energi',$data['energi']);
        $this->db->set('keterangan_inter',$data['keterangan_inter']);
        $this->db->set('persen_karbohidrat',$data['persen_karbohidrat']);
        $this->db->set('gram_karbohidrat',$data['gram_karbohidrat']);
        $this->db->set('persen_protein',$data['persen_protein']);
        $this->db->set('gram_protein',$data['gram_protein']);
        $this->db->set('persen_lemak',$data['persen_lemak']);
        $this->db->set('gram_lemak',$data['gram_lemak']);
        $this->db->set('mon_date',$data['mon_date']);
        $this->db->set('result',$data['result']);
        $this->db->where('id_patient',$data['id_patient']);
        $this->db->update('nutrition_records');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
	 * @function getNutritionRecordById(id)
     * @param id pasien
	 * @return mendapatkan data gizi berdasarkan id pasien
	 */
    public function getNutritionRecordById($id)
    {
        $this->db->select('*');
        $this->db->from('patients');
        $this->db->join('nutrition_records','patients.id_patient = nutrition_records.id_patient');
        $this->db->where('patients.id_patient',$id);
        $result = $this->db->get()->result();
        if (empty($result) || is_null($result)) {
            $res['status'] = false;
            $res['message'] = 'Data not found';
        } else {
            $res['status'] = true;
            $res['message'] = 'Data found';
            $res['data'] = $result;
        }
        return $res;
    }
}