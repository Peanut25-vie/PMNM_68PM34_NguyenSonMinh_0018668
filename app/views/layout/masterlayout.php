<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1 0 auto;
           
            width: 80%;
           
            max-width: 1100px;
            margin: 20px auto;
            padding: 20px;
        }

       
        footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body>
    <?php require_once '../app/views/layout/partial/header.php'; ?>

    <div class="content">
        <?php
        require_once '../app/views/' . $viewname . '.php';
        ?>
    </div>

    <?php require_once '../app/views/layout/partial/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
