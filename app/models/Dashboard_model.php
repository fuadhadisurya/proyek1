<?php

class Dashboard_model {
    private $table = 'transaksi';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getTotalBarang(){
        $this->db->query('SELECT COUNT(*) AS jumlah FROM barang');
        return $this->db->single();
    }

    public function getTotalPinjam(){
        $this->db->query('SELECT COUNT(*) AS jumlah FROM ' . $this->table);
        return $this->db->single();
    }

    public function getPinjamAktif(){
        $this->db->query('SELECT COUNT(*) AS jumlah FROM ' . $this->table . ' WHERE status = :status');
        $this->db->bind('status', 'Dipinjam');
        return $this->db->single();
    }

    public function getPinjamSelesai(){
        $this->db->query('SELECT COUNT(*) AS jumlah FROM ' . $this->table . ' WHERE status = :status');
        $this->db->bind('status', 'Selesai');
        return $this->db->single();
    }
}