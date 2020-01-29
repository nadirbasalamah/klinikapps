<?php
class Articles_api extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Articles_api');
    }
    /**
	 * @function addArticle(data)
     * @param array data artikel
	 * @return menambahkan data artikel gizi terbaru
	 */
    public function addArticle($data)
    {
        $this->db->insert('articles',$data);
        if ($this->db->affected_rows() > 0) {
            $res['status'] = true;
            $res['message'] = 'article added successfully!';
        } else {
            $res['status'] = false;
            $res['message'] = 'article failed to add!';
        }
        return $res;
    }
    /**
	 * @function updateArticle(data)
     * @param array data artikel
	 * @return memperbarui data artikel gizi
	 */
    public function updateArticle($data)
    {
        $this->db->set('title',$data['title']);
        $this->db->set('description',$data['description']);
        // $this->db->set('image',$data['image']);
        $this->db->set('source',$data['source']);
        $this->db->where('id',$data['id']);
        $this->db->update('articles');

        if ($this->db->affected_rows() > 0) {
            $res['status'] = true;
            $res['message'] = 'article updated successfully!';
        } else {
            $res['status'] = false;
            $res['message'] = 'article failed to update!';
        }
        return $res;
    }
    /**
	 * @function getAllArticles()
	 * @return mendapatkan seluruh data artikel gizi
	 */
    public function getAllArticles()
    {
        $result = $this->db->get('articles')->result();
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
	 * @function getArticleById(id)
     * @param id artikel
	 * @return mendapatkan data artikel berdasarkan id
	 */
    public function getArticleById($id)
    {
        $this->db->where('id',$id);
        $result = $this->db->get('articles',1)->result();
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
	 * @function deleteArticle(id)
     * @param id artikel
	 * @return menghapus data artikel berdasarkan id
	 */
    public function deleteArticle($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('articles');
        if ($query) {
            $res['status'] = true;
			$res['message'] = 'article deleted successfully!';
        } else {
            $res['status'] = false;
			$res['message'] = 'delete failed, article not found!';
        }
        return $res;
    }
}