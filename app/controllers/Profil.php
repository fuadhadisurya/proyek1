<?php 
class Profil extends Controller{
    public function index(){
        $data['judul'] = 'Profil';
        $data['user'] = $this->model('User_model')->getDataUser(); 
        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('templates/navbar',$data);
        $this->view('profil/index',$data);
        $this->view('templates/footer');
    }

    public function update(){
        if($this->model('Profil_model')->ubahDataUser($_POST) > 0){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('location:' . BASEURL . '/Profil');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location:' . BASEURL . '/Profil');
            exit;
        }    
    }
}