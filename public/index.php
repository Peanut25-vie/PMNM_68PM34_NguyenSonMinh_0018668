<?php
// Bắt đầu session ở mức cao nhất
session_start();

// Nhúng bộ khung lõi
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';
require_once '../app/core/DB.php';

// Khởi chạy Routing
$app = new App();
?>
