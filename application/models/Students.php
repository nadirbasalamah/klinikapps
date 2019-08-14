<?php
class Students extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Students');
    }
    
    public function getStudentById($id)
    {
        $this->db->where('id_student',$id);
        $query = $this->db->get('students',1);
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return null;
        }
    }

    public function getAllStudents()
    {
        $query = $this->db->get('students');
        if ($query->num_rows() >= 1) {
        return $query->result_array();
        } else {
        return null;
        }
    }

    public function deleteStudent($id)
    {
        $this->db->where('id_student',$id);
        $query = $this->db->delete('students');
        if ($query) {
        return true;
        } else {
        return false;
        }
    }

    public function updateStudent($data)
    {
        $this->db->set('fullname',$data['fullname']);
        $this->db->set('address',$data['address']);
        $this->db->set('phone_number',$data['phone_number']);
        $this->db->set('email',$data['email']);
        $this->db->set('status',$data['status']);
        $this->db->set('education',$data['education']);
        $this->db->set('job',$data['job']);
        $this->db->set('religion',$data['religion']);
        $this->db->where('id_student',$data['id']);
        $this->db->update('students');
    }

    public function addStudent($data)
    {
        $this->db->where('fullname',$data['fullname']);
        $query = $this->db->get('students',1);
        if ($query->num_rows() == 0) {
        $this->db->insert('students', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        } else {
            return false;
        }
    }

    public function addBatchStudents($data = array())
    {
        $jumlah_data = count($data);

        if ($jumlah_data > 0) {
            $this->db->insert_batch('students', $data);
        }

    }

    public function getStudentByName($fullname)
    {
        $this->db->where('fullname',$fullname);
        $query = $this->db->get('students',1);
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return null;
        }
    }
}