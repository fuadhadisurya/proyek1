<?php 
class Transaksi extends Controller{
    public function index(){
        $data['judul'] = 'Data Peminjaman';
        $data['transaksi'] = $this->model('Transaksi_model')->getTransaksiSelesai();
        $data['user'] = $this->model('User_model')->getDataUser();
        $this->view('templates/header',$data);
        $this->view('templates/sidebar',$data);
        $this->view('templates/navbar',$data);
        $this->view('transaksi/index',$data);
        $this->view('templates/footer');
    }

    public function dataAktif(){
        $data['judul'] = 'Data Peminjaman Aktif';
        $data['transaksi'] = $this->model('Transaksi_model')->getTransaksiAktif();
        $data['user'] = $this->model('User_model')->getDataUser();
        $this->view('templates/header',$data);
        $this->view('templates/sidebar',$data);
        $this->view('templates/navbar',$data);
        $this->view('transaksi/index',$data);
        $this->view('templates/footer');
    }

    public function tambah(){
        $data['judul'] = 'Formulir Peminjaman';
        $data['user'] = $this->model('User_model')->getDataUser();
        $this->view('templates/header',$data);
        $this->view('templates/sidebar',$data);
        $this->view('templates/navbar',$data);
        $this->view('transaksi/tambah');
        $this->view('templates/footer');
    }

    public function prosesTambah(){
        if(!empty($_POST)) {
            if($this->model('Transaksi_model')->ambilStok($_POST) > 0){
                if ($this->model('Transaksi_model')->tambahDataTransaksi($_POST) > 0 && $this->model('Transaksi_model')->tambahDataMultiplePinjam($_POST) > 0) {
                    Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                    header('location:' . BASEURL . '/Transaksi/dataAktif');
                    exit;
                } else {
                    Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                    header('location:' . BASEURL . '/Transaksi/tambah');
                    exit;
                }
            }
        } else {
            header('Location: '. BASEURL . '/Transaksi/tambah');
        }
          
    }

    public function detail($id){
        $data['judul'] = 'Detail Transaksi';
        $data['user'] = $this->model('User_model')->getDataUser();
        $data['transaksi'] = $this->model('Transaksi_model')->getTransaksiById($id);
        $data['barang'] = $this->model('Transaksi_model')->getEditTransaksiById($id);
        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('templates/navbar',$data);
        $this->view('transaksi/detail',$data);
        $this->view('templates/footer');
    }

    public function edit($id){
        $data['judul'] = 'Update Transaksi';
        $data['user'] = $this->model('User_model')->getDataUser();
        $data['transaksi'] = $this->model('Transaksi_model')->getTransaksiById($id);
        $data['barang'] = $this->model('Transaksi_model')->getEditTransaksiById($id);
        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('templates/navbar',$data);
        $this->view('transaksi/edit',$data);
        $this->view('templates/footer');
    }

    public function update(){
        if( $this->model('Transaksi_model')->ubahDataTransaksi($_POST) > 0 || $this->model('Transaksi_model')->ubahDataMultiple($_POST) > 0 ) {
            if($_POST['status'] == 'Selesai'){
                $this->model('Transaksi_model')->kembaliStok($_POST) > 0;
                $this->model('Transaksi_model')->updateTglKembali($_POST) > 0;
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . '/Transaksi');
                exit;
            } else {
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . '/Transaksi/dataAktif ');
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/Transaksi');
            exit;
        } 
    }

    public function hapus($id){
        if($this->model('Transaksi_model')->kembaliStokHapus($id)){
            if( $this->model('Transaksi_model')->hapusDataTransaksi($id) > 0 && $this->model('Transaksi_model')->hapusDataMultiplePinjam($id) > 0 ) {
                Flasher::setFlash('berhasil', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/Transaksi/dataAktif');
                exit;
            } else {
                Flasher::setFlash('gagal', 'dihapus', 'danger');
                header('Location: ' . BASEURL . '/Transaksi/dataAktif');
                exit;
            } 
        }
    }
    
}