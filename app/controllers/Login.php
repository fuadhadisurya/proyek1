<?php
class Login extends Controller {
    public function index(){ 
        $this->view('login/index');
    }

    public function proses(){
        $data['user'] = $this->model('Login_model')->getLogin();

        if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
            if($_REQUEST['username'] == $data['user']['username'] && md5($_REQUEST['password']) == $data['user']['password']){
                session_start();
                $_SESSION['username'] = $data['user']['username'];
                $_SESSION['id'] = $data['user']['id'];
                $_SESSION['nama'] = $data['user']['nama'];
                header('location:' . BASEURL . '/Dashboard');
            }
            else{
                Flasher::setFlash('Gagal', 'login', 'danger');
                header('location:' . BASEURL . '/Login');
                exit;
            }
        }
    }
}