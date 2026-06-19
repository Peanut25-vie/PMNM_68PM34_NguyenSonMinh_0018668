<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../views/middleware.php'; 

class home extends Controller {
    public function index() {
        
        header('Location: /PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index');
        exit();
    }

    public function about() {
        echo "Đây là trang giới thiệu";
    }

    public function login() {
        middleware::checklogout(); 
        $this->view('home/login');
    }
}
?>
