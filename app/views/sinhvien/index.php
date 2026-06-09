<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center text-uppercase fw-bold text-secondary mb-4">
            <?= $title; ?>
        </h1>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped text-center align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">MSSV</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sinhviens as $sv): ?>
                                <tr>
                                    <td class="fw-medium"><?= $sv['id']; ?></td>
                                    <td><?= $sv['hoten']; ?></td>
                                    <td>
                                        <span class="badge bg-info text-dark rounded-pill px-3">
                                            <?= $sv['gioitinh']; ?>
                                        </span>
                                    </td>
                                    <td><?= $sv['mssv']; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="/sinhvien/edit/<?= $sv['id']; ?>" class="btn btn-warning btn-sm text-dark fw-medium">
                                                Sửa
                                            </a>
                                            <a href="/sinhvien/delete/<?= $sv['id']; ?>" class="btn btn-danger btn-sm fw-medium"
                                               onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                                                Xóa
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <?php
                $pagesize = 5;
                for ($i = 1; $i <= $totalpage; $i++): 
                    $offset = ($i - 1) * $pagesize;
                ?>
                    <li class="page-item">
                        <a class="page-link shadow-sm text-dark" href="/sinhvien/index/<?= $pagesize; ?>/<?= $offset; ?>">
                            <?= $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
