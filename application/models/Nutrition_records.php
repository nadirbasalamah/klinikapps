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