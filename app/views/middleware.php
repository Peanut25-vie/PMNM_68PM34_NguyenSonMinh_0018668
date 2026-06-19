<?php
class middleware
{
    public static function checklogin()
    {
      
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

       
        $publicPages = ['/baitap/public/home/login', '/baitap/public/auth/login'];
        $currentUri = explode('?', $_SERVER['REQUEST_URI'])[0];

        
        if (!isset($_SESSION['username']) && !in_array($currentUri, $publicPages)) {
            header('Location: /baitap/public/home/login');
            exit();
        }
    }

    public static function checklogout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
       
        if (isset($_SESSION['username'])) {
            header('Location: /baitap/public/sinhvien/index');
            exit();
        }
    }
}
?>
