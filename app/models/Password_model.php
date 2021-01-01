<?php

class Password_model {
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

    public function ubahPassword(){
        $password = md5($_REQUEST['password']);
        $query = "UPDATE admin SET password = :password WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('password', $password);
        $this->db->bind('id', $_SESSION['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}