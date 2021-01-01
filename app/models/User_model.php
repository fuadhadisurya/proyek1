<?php

class User_model {
    private $table = 'admin';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getDataUser(){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $_SESSION['id']);
        return $this->db->single();
    }

}