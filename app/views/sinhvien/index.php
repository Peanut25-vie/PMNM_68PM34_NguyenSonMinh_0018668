<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> </title>
    <style>
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #4f46e5;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef2ff;
            transition: 0.2s;
        }
    </style>
</head>

<body>
    <h1><?php echo $title; ?> </h1>
    <table>

        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>MSSV</th>
        </tr>
        <?php foreach ($sinhviens as $sv): ?>
            <tr>
                <td><?php echo $sv['id']; ?></td>
                <td><?php echo $sv['hoten']; ?></td>
                <td><?php echo $sv['gioitinh']; ?></td>
                <td><?php echo $sv['mssv']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
