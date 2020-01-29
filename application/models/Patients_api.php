<?php
class Patients_api extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Patients_api');
    }
    /**
	 * @function getPatientById(id)
     * @param id pasien
	 * @return mendapatkan data pasien berdasarkan id
	 */
    public function getPatientById($id)
    {
        $this->db->where('id_patient',$id);
        $result = $this->db->get('patients',1)->result();
        if (empty($result) || is_null($result)) {
            $res['status'] = false;
            $res['message'] = 'Data not found!';
        } else {
            $res['status'] = true;
            $res['message'] = 'Data found!';
            $res['data'] = $result;
        }
        return $res;
    }
    /**
	 * @function getAllPatients()
	 * @return mendapatkan seluruh data pasien
	 */
    public function getAllPatients()
    {
        $result = $this->db->get('patients')->result();
        if (empty($result) || is_null($result)) {
            $res['status'] = false;
            $res['message'] = 'Data not found!';
        } else {
            $res['status'] = true;
            $res['message'] = 'Data found!';
            $res['data'] = $result;
        }
        return $res;
    }
    /**
	 * @function deletePatient(id)
     * @param id pasien
	 * @return menghapus data pasien berdasarkan id
	 */
    public function deletePatient($id)
    {
        $this->db->where('id_patient',$id);
        $query = $this->db->delete('patients');
        if ($query) {
            $res['status'] = true;
			$res['message'] = 'patient deleted successfully!';
        } else {
            $res['status'] = false;
			$res['message'] = 'delete failed, patient not found!';
        }
        return $res;
    }
    /**
	 * @function updatePatient(data)
     * @param array data pasien yang telah diperbarui
	 * @return mengubah data pasien
	 */
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

        if ($this->db->affected_rows() > 0) {
            $res['status'] = true;
            $res['message'] = 'patient updated successfully!';
        } else {
            $res['status'] = false;
            $res['message'] = 'patient update failed!';
        }
        return $res;
    }
    /**
	 * @function addPatient(data)
     * @param array data pasien baru
	 * @return menambahkan data pasien baru
	 */
    public function addPatient($data)
    {
        $this->db->where('fullname',$data['fullname']);
        $query = $this->db->get('patients',1);
        if ($query->num_rows() == 0) {
        $this->db->insert('patients', $data);
        if ($this->db->affected_rows() > 0) {
            $res['status'] = true;
            $res['message'] = 'patient added successfully!';
        }
        } else {
            $res['status'] = false;
            $res['message'] = 'patient failed to add, patient data exist!';
        }
        return $res;
    }
    /**
	 * @function getPatientByName(fullname)
     * @param nama lengkap pasien
	 * @return mendapatkan data pasien berdasarkan nama
	 */
    public function getPatientByName($fullname)
    {
        $this->db->like('fullname',$fullname);
        $query = $this->db->get('patients')->result();
        if (empty($query) || is_null($query)) {
            $res['status'] = false;
            $res['message'] = 'Data not found!';    
        } else {
            $res['status'] = true;
            $res['message'] = 'Data found!';
            $res['data'] = $query; 
        }
        return $res;
    }
}