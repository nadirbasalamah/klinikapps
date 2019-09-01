<?php
class Patients extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Patients');
    }
    
    public function getPatientById($id)
    {
        $this->db->where('id_patient',$id);
        $query = $this->db->get('patients',1);
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return null;
        }
    }

    public function getAllPatients()
    {
        $query = $this->db->get('patients');
        if ($query->num_rows() >= 1) {
        return $query->result_array();
        } else {
        return null;
        }
    }

    public function deletePatient($id)
    {
        $this->db->where('id_patient',$id);
        $query = $this->db->delete('patients');
        if ($query) {
        return true;
        } else {
        return false;
        }
    }

    public function updatePatient($data)
    {
        $this->db->set('fullname',$data['fullname']);
        $this->db->set('address',$data['address']);
        $this->db->set('phone_number',$data['phone_number']);
        $this->db->set('email',$data['email']);
        $this->db->set('education',$data['education']);
        $this->db->set('job',$data['job']);
        $this->db->set('religion',$data['religion']);
        $this->db->where('id_patient',$data['id']);
        $this->db->update('patients');
    }

    public function addPatient($data)
    {
        $this->db->where('fullname',$data['fullname']);
        $query = $this->db->get('patients',1);
        if ($query->num_rows() == 0) {
        $this->db->insert('patients', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        } else {
            return false;
        }
    }

    public function addBatchPatients($data = array())
    {
        $jumlah_data = count($data);

        if ($jumlah_data > 0) {
            $this->db->insert_batch('patients', $data);
        }

    }

    public function getPatientByName($fullname)
    {
        $this->db->where('fullname',$fullname);
        $query = $this->db->get('patients',1);
        if ($query->num_rows() == 1) {
        return $query->result_array();
        } else {
        return null;
        }
    }
}