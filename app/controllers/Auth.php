<?php
class Auth extends Controller {
    public function logout(){ 
        session_destroy();
        header('location:' . BASEURL . '/Login');
    }
}