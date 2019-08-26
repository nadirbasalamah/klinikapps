<?php
class Nutrition_records extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Nutrition_records');
    }

    public function addNutritionRecord($data)
    {
        $this->db->where('id_student',$data['id_student']);
        $query = $this->db->get('nutrition_records',1);
        if ($query->num_rows() == 0) {
            $this->db->insert('nutrition_records',$data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        } else {
            //update nutrition record
            $query = $this->updateNutritionRecord($data);
            if ($query) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function updateNutritionRecord($data)
    {
        //TODO: update record nutrition (all of them)
        $this->db->set('bb',$data['bb']);
        $this->db->set('tb',$data['tb']);
        $this->db->set('lila',$data['lila']);
        $this->db->set('imt',$data['imt']);
        $this->db->set('bbi',$data['bbi']);
        $this->db->set('status',$data['status']);
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
        $this->db->set('energi',$data['energi']);
        $this->db->set('persen_karbohidrat',$data['persen_karbohidrat']);
        $this->db->set('gram_karbohidrat',$data['gram_karbohidrat']);
        $this->db->set('persen_protein',$data['persen_protein']);
        $this->db->set('gram_protein',$data['gram_protein']);
        $this->db->set('persen_lemak',$data['persen_lemak']);
        $this->db->set('gram_lemak',$data['gram_lemak']);
        $this->db->where('id_student',$data['id_student']);
        $this->db->update('nutrition_records');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getNutritionRecordById($id)
    {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('nutrition_records','students.id_student = nutrition_records.id_student');
        $this->db->where('students.id_student',$id);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return null;
        }
    }

}