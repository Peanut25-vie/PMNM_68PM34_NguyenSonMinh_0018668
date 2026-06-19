<?php
class middleware
{
    public static function checklogin()
    {
        // Khởi động session nếu chưa có
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Khai báo các trang công khai (cập nhật kèm thư mục XAMPP)
        $publicPages = ['/PMNM_68PM34_NguyenSonMinh_0018668/public/home/login', '/PMNM_68PM34_NguyenSonMinh_0018668/public/auth/login'];
        $currentUri = explode('?', $_SERVER['REQUEST_URI'])[0];

        // Nếu chưa đăng nhập và cố vào trang ẩn -> Đá về form login
        if (!isset($_SESSION['username']) && !in_array($currentUri, $publicPages)) {
            header('Location: /PMNM_68PM34_NguyenSonMinh_0018668/public/home/login');
            exit();
        }
    }

    public static function checklogout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Đã đăng nhập rồi thì đẩy thẳng vào trang danh sách sinh viên
        if (isset($_SESSION['username'])) {
            header('Location: /PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index');
            exit();
        }
    }
}
?>
