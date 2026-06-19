<?php
require_once '../app/core/Controller.php';

class auth extends Controller
{
    protected $users = [
        'admin' => ['password' => 'admin123'],
    ];

    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if (
                isset($this->users[$username]) &&
                $this->users[$username]['password'] === $password
            ) {
                $_SESSION['username'] = $username;
                
                
                header('Location: /baitap/public/sinhvien/index');
                exit();
            } else {
                $_SESSION['error'] = "Tên đăng nhập hoặc mật khẩu không đúng";
                header('Location: /baitap/public/home/login');
                exit();
            }
        } else {
            $this->view('home/login');
        }
    }

    public function logout() 
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: /baitap/public/home/login');
        exit();
    }
}
?>
