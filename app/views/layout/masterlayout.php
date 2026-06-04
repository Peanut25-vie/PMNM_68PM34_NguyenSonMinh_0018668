<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> </title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .content {
            width: 60%;
            margin: auto;
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
</body>

</html>
