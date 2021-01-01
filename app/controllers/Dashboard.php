<?php 
class Dashboard extends Controller{
    public function index(){
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->model('User_model')->getDataUser();
        $data['totalBarang'] =  $this->model('Dashboard_model')->getTotalBarang();
        $data['totalPeminjaman'] =  $this->model('Dashboard_model')->getTotalPinjam();
        $data['pinjamAktif'] =  $this->model('Dashboard_model')->getPinjamAktif();
        $data['pinjamSelesai'] =  $this->model('Dashboard_model')->getPinjamSelesai();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar',$data);
        $this->view('templates/navbar',$data);
        $this->view('dashboard/index',$data);
        $this->view('templates/footer');
    }
}