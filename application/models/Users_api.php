<?php
class Users_api extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Users_api');
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
        
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0) {
            $res['status'] = true;
		    $res['message'] = 'User registered successfully!';
        }
        } else {
            $res['status'] = false;
		    $res['message'] = 'User already registered!';
        }
        return $res;    
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
            $res['status'] = true;
            $res['message'] = 'Login success!';
            $res['data'] = $query->result();
        } else {
            $res['status'] = false;
            $res['message'] = 'Login failed, username or password incorrect!';
        }        
        return $res;
    }

    public function getUserById($id)
    {
        $this->db->where('id',$id);
        $result = $this->db->get('users',1)->result();
        
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
        $this->db->where('id',$data['id']);
        $this->db->update('users');

        if ($this->db->affected_rows() > 0) {
            $res['status'] = true;
			$res['message'] = 'Profile updated successfully!';
        } else {
            $res['status'] = false;
			$res['message'] = 'Profile update failed!';
        }    
        return $res;
    }
}