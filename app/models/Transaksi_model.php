<?php

class Transaksi_model {
    private $table = 'transaksi';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getTransaksiAktif(){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE status = :status');
        $this->db->bind('status', 'Dipinjam');
        return $this->db->resultSet();
    }

    public function getTransaksiSelesai(){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE status = :status');
        $this->db->bind('status', 'Selesai');
        return $this->db->resultSet();
    }
    
    public function getTransaksiById($id){
        $this->db->query('SELECT transaksi.*, multiple_pinjam.id_transaksi, multiple_pinjam.kode_barang, multiple_pinjam.jumlah, multiple_pinjam.satuan, multiple_pinjam.keterangan FROM ' . $this->table . ' INNER JOIN multiple_pinjam ON transaksi.id = multiple_pinjam.id_transaksi WHERE transaksi.id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getEditTransaksiById($id){
        $this->db->query('SELECT transaksi.*, multiple_pinjam.id_transaksi, multiple_pinjam.kode_barang, multiple_pinjam.jumlah, multiple_pinjam.satuan, multiple_pinjam.keterangan FROM ' . $this->table . ' INNER JOIN multiple_pinjam ON transaksi.id = multiple_pinjam.id_transaksi WHERE transaksi.id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function tambahDataTransaksi($data){
        $query = "INSERT INTO transaksi VALUES (null, :pemohon, :unit_kerja, :nama_kegiatan, :hari, :tanggal, :pukul, :penanggung_jawab, :noHp, CURRENT_TIMESTAMP, null, :status)";
        $this->db->query($query);
        $this->db->bind('pemohon', $data['pemohon']);
        $this->db->bind('unit_kerja', $data['unitKerja']);
        $this->db->bind('nama_kegiatan', $data['namaKegiatan']);
        $this->db->bind('hari', $data['hari']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('pukul', $data['pukul']);
        $this->db->bind('penanggung_jawab', $data['penanggungJawab']);
        $this->db->bind('noHp', $data['noHp']);
        $this->db->bind('status', 'Dipinjam');
        
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function getDataLast(){
        $dataLast = $this->db->query('SELECT id FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');
        return $this->db->single();
    }
    
    public function tambahDataMultiplePinjam($data){
        $id_transaksi = $this->getDataLast();
        $kode_barang = $data['kodeBarang'];
        $jumlah = $data['jumlah'];
        $satuan = $data['satuan'];
        $keterangan = $data['keterangan'];
        
        $total = count($kode_barang);
        for($i=0; $i<$total; $i++){
            $query = "INSERT INTO multiple_pinjam VALUES (null, :id_transaksi, :kode_barang, :jumlah, :satuan, :keterangan)";
            $this->db->query($query);
            $this->db->bind('id_transaksi', $id_transaksi["id"]);
            $this->db->bind('kode_barang', $kode_barang[$i]);
            $this->db->bind('jumlah', $jumlah[$i]);
            $this->db->bind('satuan', $satuan[$i]);
            $this->db->bind('keterangan', $keterangan[$i]);
            
            $this->db->execute();
        }
        return $this->db->rowCount();
    }

    public function ubahDataTransaksi($data){
        $query = "UPDATE transaksi SET
                    status = :status
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('status', $data['status']);
        $this->db->bind('id', $data['id']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMultiple($data){
        $keterangan = $data['keterangan'];
        $kode_barang = $data['kodeBarang'];
        
        $total = count($kode_barang);
        for($i=0; $i<$total; $i++){
            $query = "UPDATE multiple_pinjam SET
                    keterangan = :keterangan
                  WHERE kode_barang = :kode_barang";

            $this->db->query($query);
            $this->db->bind('keterangan', $keterangan[$i]);
            $this->db->bind('kode_barang', $kode_barang[$i]);

            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function hapusDataTransaksi($id)
    {
        $query = "DELETE FROM transaksi WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMultiplePinjam($id)
    {
        $query = "DELETE FROM multiple_pinjam WHERE id_transaksi = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getStokByKodeBarang(){
        $kode_barang = $_POST['kodeBarang'];
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        foreach($kode_barang as $data_barang){
            $query="SELECT stok FROM barang WHERE kode_barang='$data_barang'";
            $result=mysqli_query($conn,$query);
            $data_barang = mysqli_fetch_array($result);
            $stok[]=$data_barang['stok'];
        }

        return $stok;
    }

    public function ambilStok($data){
        $kode_barang = $data['kodeBarang'];
        $stok = $this->getStokByKodeBarang();
        $jumlah = $data['jumlah'];
        
        $total = count($kode_barang);
        
        for($i=0; $i<$total; $i++){
            $cek_stok = $stok[$i]-$jumlah[$i];
            if($cek_stok<0){
                Flasher::setFlash('gagal', 'ditambahkan. Stok barang kosong atau kode barang tidak ada', 'danger');
                header('location:' . BASEURL . '/Transaksi/tambah');
                exit;
            }
        }

        for($i=0; $i<$total; $i++){
            $stok_akhir = $stok[$i]-$jumlah[$i];
            $query = "UPDATE barang SET
                        stok = :stok
                    WHERE kode_barang = :kode_barang";

            $this->db->query($query);
            $this->db->bind('stok', $stok_akhir);
            $this->db->bind('kode_barang', $kode_barang[$i]);
            
            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function kembaliStok($data){
        $kode_barang = $data['kodeBarang'];
        $stok = $this->getStokByKodeBarang();
        $jumlah = $data['jumlah'];
        
        $total = count($kode_barang);
        for($i=0; $i<$total; $i++){
            $stok_akhir = $stok[$i]+$jumlah[$i];
            $query = "UPDATE barang SET
                        stok = :stok
                    WHERE kode_barang = :kode_barang";

            $this->db->query($query);
            $this->db->bind('stok', $stok_akhir);
            $this->db->bind('kode_barang', $kode_barang[$i]);
            
            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function getStokByKodeBarangHapus($id){
        $get_barang = $this->getEditTransaksiById($id);
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        foreach($get_barang as $data_barang){
            $kode_barang = $data_barang['kode_barang'];
            $query="SELECT stok, kode_barang FROM barang WHERE kode_barang='$kode_barang'";
            $result=mysqli_query($conn,$query);
            $data = mysqli_fetch_array($result);
            $stok[]=$data['stok'];
        }
        return $stok;
    }

    public function kembaliStokHapus($id){
        $stok = $this->getStokByKodeBarangHapus($id);
        $getFuncTransaksi = $this->getEditTransaksiById($id);
        foreach($getFuncTransaksi as $data){    
            $kode_barang[] = $data['kode_barang'];
            $jumlah[] = $data['jumlah'];
        }
        $total = count($kode_barang);
        
        for($i=0; $i<$total; $i++){
            $stok_akhir = $stok[$i]+$jumlah[$i];
            $query = "UPDATE barang SET
                        stok = :stok
                    WHERE kode_barang = :kode_barang";

            $this->db->query($query);
            $this->db->bind('stok', $stok_akhir);
            $this->db->bind('kode_barang', $kode_barang[$i]);
            
            $this->db->execute();
        }
        
        return $this->db->rowCount();
    }
    
    public function updateTglKembali($data){
        $query = "UPDATE transaksi SET
                    tanggal_kembali = :tanggal_kembali
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('tanggal_kembali', date('Y-m-d H:i:s'));
        $this->db->bind('id', $data['id']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

}