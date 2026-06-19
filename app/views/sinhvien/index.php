<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-secondary m-0">
            Danh sách sinh viên <span class="badge bg-secondary fs-6 rounded-pill"><?= $totalrecords; ?></span>
        </h3>
        <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/create" class="btn btn-success fw-medium">+ Thêm sinh viên</a>
    </div>

    <?php
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <div class="card p-3 mb-4 bg-white border-0 shadow-sm">
        <form method="GET" action="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index" class="row g-3 align-items-center">
            <input type="hidden" name="limit" value="<?= $limit; ?>">
            
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Tìm theo tên hoặc MSSV..." value="<?= htmlspecialchars($search); ?>">
            </div>
            
            <div class="col-md-3">
                <select name="lophoc" class="form-select">
                    <option value="">-- Tất cả lớp --</option>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?= htmlspecialchars($class); ?>" <?= $lophoc === $class ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($class); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary px-3">Tìm kiếm</button>
                <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index" class="btn btn-light border px-3">Đặt lại</a>
            </div>

            <div class="col-md-2 text-end">
                <label class="small me-1">Hiển thị:</label>
                <select class="form-select d-inline-block w-auto form-select-sm" onchange="location = this.value;">
                    <option value="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index?limit=5&search=<?= urlencode($search); ?>&lophoc=<?= urlencode($lophoc); ?>" <?= $limit == 5 ? 'selected' : ''; ?>>5/trang</option>
                    <option value="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index?limit=10&search=<?= urlencode($search); ?>&lophoc=<?= urlencode($lophoc); ?>" <?= $limit == 10 ? 'selected' : ''; ?>>10/trang</option>
                    <option value="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index?limit=20&search=<?= urlencode($search); ?>&lophoc=<?= urlencode($lophoc); ?>" <?= $limit == 20 ? 'selected' : ''; ?>>20/trang</option>
                </select>
            </div>
        </form>
    </div>

    <div class="card shadow-sm border-0 mb-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0" style="background-color: #fcfcfc;">
                <thead style="background-color: #616161; color: #fff;">
                    <tr>
                        <th width="5%">STT</th>
                        <th width="15%">MSSV <span>▲▼</span></th>
                        <th width="25%">Họ tên</th>
                        <th width="15%">Giới tính</th>
                        <th width="25%">Lớp học</th>
                        <th width="15%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sinhviens)): ?>
                        <?php 
                        $stt = $offset + 1;
                        foreach ($sinhviens as $sv): 
                        ?>
                            <tr>
                                <td class="text-secondary fw-bold"><?= $stt++; ?></td>
                                <td class="fw-medium text-dark"><?= htmlspecialchars($sv['mssv']); ?></td>
                                <td class="text-start ps-4"><?= htmlspecialchars($sv['hoten']); ?></td>
                                <td><?= htmlspecialchars($sv['gioitinh']); ?></td>
                                <td>
                                    <?php if (!empty($sv['lophoc'])): ?>
                                        <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index?lophoc=<?= urlencode($sv['lophoc']); ?>" class="badge bg-info text-decoration-none text-dark px-3 py-2 rounded-1">
                                            <?= htmlspecialchars($sv['lophoc']); ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted fst-italic small">Chưa phân lớp</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/edit/<?= $sv['id']; ?>" class="btn btn-warning btn-sm fw-medium text-dark px-2 py-1">Sửa</a>
                                    <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/delete/<?= $sv['id']; ?>" class="btn btn-danger btn-sm fw-medium px-2 py-1" onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Không tìm thấy sinh viên nào phù hợp.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="small text-secondary">
            <?php 
            $from = $totalrecords > 0 ? $offset + 1 : 0;
            $to = min($offset + $limit, $totalrecords);
            echo "Hiển thị $from-$to trong $totalrecords bản ghi";
            ?>
        </div>
        
        <?php if ($totalpage > 1): ?>
            <nav>
                <ul class="pagination pagination-sm m-0">
                    <li class="page-item <?= $page <= 1 ? 'disabled' : ''; ?>">
                        <a class="page-link text-dark" href="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index?page=<?= $page - 1; ?>&limit=<?= $limit; ?>&search=<?= urlencode($search); ?>&lophoc=<?= urlencode($lophoc); ?>">&lt;</a>
                    </li>

                    <?php for ($i = 1; $i <= $totalpage; $i++): ?>
                        <li class="page-item <?= $page == $i ? 'active' : ''; ?>">
                            <a class="page-link <?= $page == $i ? 'bg-primary text-white border-primary' : 'text-dark'; ?>" 
                               href="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index?page=<?= $i; ?>&limit=<?= $limit; ?>&search=<?= urlencode($search); ?>&lophoc=<?= urlencode($lophoc); ?>">
                                <?= $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item <?= $page >= $totalpage ? 'disabled' : ''; ?>">
                        <a class="page-link text-dark" href="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index?page=<?= $page + 1; ?>&limit=<?= $limit; ?>&search=<?= urlencode($search); ?>&lophoc=<?= urlencode($lophoc); ?>">&gt;</a>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</div>
