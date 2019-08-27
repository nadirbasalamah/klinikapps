<?php
class Monitoring extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Monitoring');
    }

    public function getMonitoringDataById($id)
    {
        $this->db->where('id_student',$id);
        $query = $this->db->get('monitoring',1);
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return null;
        }
    }

    public function addMonitoringData($data)
    {
        $query = $this->db->insert('monitoring',$data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteMonitoringData($id)
    {
        $this->db->where('id_student',$id);
        $query = $this->db->delete('monitoring');
        if ($query) {
        return true;
        } else {
        return false;
        }
    }
}