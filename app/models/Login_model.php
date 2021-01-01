<?php

class Login_model {
    private $table = 'admin';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getLogin(){
        $username = $_REQUEST['username'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }
}