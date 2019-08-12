<?php
class Blogs extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Blogs');
    }

    public function getAllPosts()
    {
        $query = $this->db->get('blogs');
        if ($query->num_rows() >= 1) {
        return $query->result();
        } else {
        return null;
        }
    }

    public function getPostById($id)
    {
        $this->db->where('id_blog',$id);
        $query = $this->db->get('blogs',1);
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return null;
        }
    }

    public function addPost($data)
    {
        $this->db->where('title',$data['title']);
        $query = $this->db->get('blogs',1);
        if ($query->num_rows() == 0) {
        $this->db->insert('blogs', $data);
        if ($this->db->affected_rows() > 0) {
        return true;
        }
        } else {
        return false;
        }
    }

    public function editPost($data)
    {
        $this->db->set('title',$data['title']);
        $this->db->set('content',$data['content']);
        $this->db->set('reference',$data['reference']);
        $this->db->where('id_blog',$data['id']);
        $this->db->update('blogs');
    }

    public function deletePost($id)
    {
        $this->db->where('id_blog',$id);
        $query = $this->db->delete('blogs');
        if ($query) {
        return true;
        } else {
        return false;
        }
    }
}