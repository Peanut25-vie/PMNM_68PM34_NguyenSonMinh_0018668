<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <style>
        /* Sử dụng CSS Variables để code hiện đại và dễ thay đổi màu sắc khi cần */
        :root {
            --footer-bg: #4A22D4;
            --footer-color: #ffffff;
            --link-color: #e0d4ff;
            --link-hover: #ffffff;
        }

        .site-footer {
            background-color: var(--footer-bg);
            color: var(--footer-color);
            padding: 35px 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }

        .footer-links a {
            color: var(--link-color);
            text-decoration: none;
            transition: color 0.2s ease, text-decoration 0.2s ease;
        }

        .footer-links a:hover {
            color: var(--link-hover);
            text-decoration: underline;
        }

        /* Định dạng lại dấu gạch dọc tách biệt các liên kết */
        .footer-divider {
            margin: 0 8px;
            opacity: 0.6;
        }
    </style>
</head>

<body>

    <footer class="site-footer">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <p class="mb-2">&copy; <?= date("Y"); ?> QLSinhVien. All Rights Reserved.</p>
                    <p class="footer-links mb-0 small">
                        Developed by <strong>Nguyễn Sơn Minh</strong> 
                        <span class="footer-divider">|</span>
                        <a href="#">Chính sách bảo mật</a> 
                        <span class="footer-divider">|</span>
                        <a href="#">Liên hệ</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
