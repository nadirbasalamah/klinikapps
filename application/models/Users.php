<?php
class Users extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Users');
    }
    /**
	 * @function registration(data)
     * @param array data pengguna baru
	 * @return menambahkan data pengguna baru
	 */
    public function registration($data)
    {
        $this->db->where('username',$data['username']);
        $query = $this->db->get('users',1);
        if ($query->num_rows() == 0) {
        // Query to insert data in database
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0) {
        return true;
        }
        } else {
        return false;
        }    
    }
    /**
	 * @function login(data)
     * @param array data nama pengguna dan kata sandi
	 * @return mencocokkan nama pengguna dan kata sandi dalam basis data
	 */
    public function login($data)
    {
        $this->db->where('username',$data['username']);
        $this->db->where('password',$data['password']);
        $query = $this->db->get('users',1);
        
        if ($query->num_rows() == 1) {
        return true;
        } else {
        return false;
        }        
    }
    /**
	 * @function getUser(username)
     * @param username pengguna
	 * @return mendapatkan data pengguna berdasarkan username
	 */
    public function getUser($username)
    {
        $this->db->where('username',$username);
        $query = $this->db->get('users',1);
        
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return false;
        }
    }
    /**
	 * @function updateProfile(data)
     * @param array data profil pengguna yang diperbarui
	 * @return mengubah data profil pengguna
	 */
    public function updateProfile($data)
    {
        $this->db->set('username',$data['username']);
        $this->db->set('password',$data['password']);
        $this->db->set('phone_number',$data['phone_number']);
        $this->db->set('email',$data['email']);
        $this->db->set('address',$data['address']);
        $this->db->set('profile_picture',$data['profile_picture']);
        $this->db->where('id',$data['id']);
        $this->db->update('users');
    }
}