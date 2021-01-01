<?php

class Profil_model {
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

    public function ubahDataUser(){
        $query = "UPDATE admin SET nama = :nama WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $_REQUEST['nama']);
        $this->db->bind('id', $_SESSION['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}