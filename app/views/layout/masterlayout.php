<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Hệ thống Quản lý'; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* CSS giúp cố định Footer ở đáy màn hình kể cả khi trang ít dữ liệu */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body>

    <?php 
    if (file_exists('../app/views/layout/partial/header.php')) {
        require_once '../app/views/layout/partial/header.php'; 
    } else {
        echo "<div class='alert alert-warning m-0 rounded-0'>Thiếu file header.php</div>";
    }
    ?>

    <main class="py-4">
        <?php 
        if (isset($viewname) && file_exists('../app/views/' . $viewname . '.php')) {
            // Biến $sinhviens, $totalpage,... đã được giải nén tự động nhờ hàm extract($data) ở Controller
            require_once '../app/views/' . $viewname . '.php';
        } else {
            echo '<div class="container"><div class="alert alert-danger text-center">Giao diện con (View) không tồn tại hoặc chưa được thiết lập chính xác!</div></div>';
        }
        ?>
    </main>

    <?php 
    if (file_exists('../app/views/layout/partial/footer.php')) {
        require_once '../app/views/layout/partial/footer.php'; 
    } else {
        echo "<div class='alert alert-warning m-0 rounded-0'>Thiếu file footer.php</div>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
