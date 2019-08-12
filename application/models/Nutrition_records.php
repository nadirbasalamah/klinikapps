<?php
class Nutrition_records extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Nutrition_records');
    }

    public function addNutritionRecord($data)
    {
        $query = $this->db->insert('monitoring',$data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function updateNutritionRecord($data)
    {
        //TODO: update record nutrition
    }
}