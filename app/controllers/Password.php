<?php 
class Password extends Controller{
    public function index(){
        $data['judul'] = 'Ganti Password';
        $data['user'] = $this->model('User_model')->getDataUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/navbar',$data);
        $this->view('password/index');
        $this->view('templates/footer');
    }

    public function update(){
        if($_REQUEST['password'] == $_REQUEST['confirmPassword']){
            if($this->model('Password_model')->ubahPassword($_POST) > 0){
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('location:' . BASEURL . '/Password');
                exit;
            } else {
                Flasher::setFlash('gagal', 'diubah', 'danger');
                header('location:' . BASEURL . '/Password');
                exit;
            }    
        } else {
            Flasher::setFlash('gagal', 'diubah. Pastikan password dengan konfirmasi password sama', 'danger');
            header('location:' . BASEURL . '/Password');
            exit;
        }
    }
}