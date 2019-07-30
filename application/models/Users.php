<?php
class Users extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Users');
    }
}