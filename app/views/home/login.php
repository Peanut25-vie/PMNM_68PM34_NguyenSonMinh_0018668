<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        padding-top: 100px;
        text-align: center;
    }

    form {
        background: white;
        width: 320px;
        margin: auto;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    label {
        display: block;
        text-align: left;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    p {
        margin-bottom: 15px;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <h1>Đăng nhập</h1>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";

        unset($_SESSION['error']);
    }
    ?>
    <form action="/auth/login" method="post">

        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>

        <br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>

        <br><br>

        <input type="submit" value="Đăng nhập">

    </form>
</body>


</html>
