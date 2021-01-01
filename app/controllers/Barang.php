<?php 
class Barang extends Controller{
    public function index(){
        $data['judul'] = 'Data barang';
        $data['user'] = $this->model('User_model')->getDataUser();
        $data['barang'] = $this->model('Barang_model')->getAllBarang();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar',$data);
        $this->view('templates/navbar', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        if(!empty($_POST)) {
          if ($this->model('Barang_model')->tambahDataBarang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('location:' . BASEURL . '/Barang');
            exit;
          } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location:' . BASEURL . '/Barang');
            exit;
          }
        } else {
          header('Location: '. BASEURL . '/Barang');
        }
    }

    public function detail($id){
      $data['judul'] = 'Detail barang';
      $data['user'] = $this->model('User_model')->getDataUser();
      $data['barang'] = $this->model('Barang_model')->getBarangById($id);
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('templates/navbar', $data);
      $this->view('barang/detail', $data);
      $this->view('templates/footer');
    }

    public function edit($id){
      $data['judul'] = 'Edit barang';
      $data['user'] = $this->model('User_model')->getDataUser();
      $data['barang'] = $this->model('Barang_model')->getBarangById($id);
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('templates/navbar', $data);
      $this->view('barang/edit', $data);
      $this->view('templates/footer');
    }

    public function update(){
      if( $this->model('Barang_model')->ubahDataBarang($_POST) > 0 ) {
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASEURL . '/Barang');
        exit;
      } else {
        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASEURL . '/Barang');
        exit;
      }
    }

    public function hapus($id){
        if( $this->model('Barang_model')->hapusDataBarang($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Barang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Barang');
            exit;
        }
    }
}