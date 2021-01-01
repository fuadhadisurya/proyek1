<?php

class Barang_model {
    private $table = 'barang';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllBarang(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function uploadPict()
    {
        $fileName = $_FILES['gambar']['name'];
        $tempName = $_FILES['gambar']['tmp_name'];
        $sizeFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];

        /* cek kalau belum upload foto */

        if ($error === 4) {
            echo "<script>
            aler('Upload gambar terlebih dahulu!');
            </script>";
            return false;
        }

        if ($sizeFile > 2000000) {
            echo "<script>
            aler('Ukuran terlalu besar! Maks. Ukuran File 2MB!');
            </script>";
            return false;
        }

        /* cek ekstensi gambar */
        $validFileType = ['jpg', 'jpeg', 'png', 'gif'];
        $fileType = explode('.', $fileName);
        $fileType = strtolower(end($fileType));


        if (in_array($fileType, $validFileType) === false) {
            echo "<script>
            aler('Upload Gagal! Yang diupload bukan gambar!');
            </script>";
            return false;
        }

        /* generate nama acak untuk nama file nya */
        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $fileType;

        move_uploaded_file($tempName, PATH . '/img/barang/' . $newFileName);

        return $newFileName;
    }

    public function tambahDataBarang($data){
        $pictField = $this->uploadPict(); 
        $query = "INSERT INTO barang VALUES (null, :kode_barang, :nama, :merk, :model, :jumlah, :stok, :gambar)";
        $this->db->query($query);
        $this->db->bind('kode_barang', $data['kodeBarang']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('merk', $data['merk']);
        $this->db->bind('model', $data['model']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('gambar', $pictField);

        if ($pictField === false){
            return false;
        }

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getBarangById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataBarang($data){
        $pictField = $this->uploadPict();

        if($pictField == false){
            $query = "UPDATE barang SET
                    kode_barang = :kode_barang,
                    nama = :nama,
                    merk = :merk,
                    model = :model,
                    jumlah = :jumlah,
                    stok = :stok
                  WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('kode_barang', $data['kode_barang']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('merk', $data['merk']);
            $this->db->bind('model', $data['model']);
            $this->db->bind('jumlah', $data['jumlah']);
            $this->db->bind('stok', $data['stok']);
            $this->db->bind('id', $data['id']);

            $this->db->execute();
        } else {
            $query = "UPDATE barang SET
                    kode_barang = :kode_barang,
                    nama = :nama,
                    merk = :merk,
                    model = :model,
                    jumlah = :jumlah,
                    stok = :stok,
                    gambar = :gambar
                  WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('kode_barang', $data['kode_barang']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('merk', $data['merk']);
            $this->db->bind('model', $data['model']);
            $this->db->bind('jumlah', $data['jumlah']);
            $this->db->bind('stok', $data['stok']);
            $this->db->bind('gambar', $pictField);
            $this->db->bind('id', $data['id']);

            unlink(PATH . '/img/barang/' . $data['gambarLama']);

            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function hapusDataBarang($id)
    {
        $idGambar = $this->getBarangById($id);
        $un=unlink(PATH . '/img/barang/' . $idGambar['gambar']);
        
        $query = "DELETE FROM barang WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}