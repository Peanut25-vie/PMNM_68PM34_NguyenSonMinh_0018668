<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-secondary m-0">Danh sách lớp học</h3>
        <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/lophoc/create" class="btn btn-success fw-medium">+ Thêm lớp học</a>
    </div>

    <?php
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <div class="card p-3 mb-4 bg-white border-0 shadow-sm">
        <form method="GET" action="/PMNM_68PM34_NguyenSonMinh_0018668/public/lophoc/index" class="row g-3 align-items-center">
            <div class="col-md-5">
                <input type="text" name="search" class="form-control" placeholder="Tìm theo mã lớp hoặc tên lớp..." value="<?= htmlspecialchars($search); ?>">
            </div>
            
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary px-3">Tìm kiếm</button>
                <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/lophoc/index" class="btn btn-light border px-3">Đặt lại</a>
            </div>
        </form>
    </div>

    <div class="card shadow-sm border-0 mb-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0" style="background-color: #eafcf1;">
                <thead style="background-color: #616161; color: #fff;">
                    <tr>
                        <th width="10%">STT</th>
                        <th width="15%">Mã lớp</th>
                        <th width="30%">Tên lớp</th>
                        <th width="30%">Ghi chú</th>
                        <th width="15%">Thao tác</th>
                    </tr>
                      </thead>
                <tbody>
                    <?php if (!empty($lophocs)): ?>
                        <?php 
                        $stt = $offset + 1;
                        foreach ($lophocs as $lh): 
                        ?>
                            <tr>
                                <td class="text-secondary fw-bold"><?= $stt++; ?></td>
                                <td>
                                    <span class="badge bg-secondary text-white px-3 py-2 rounded-1">
                                        <?= htmlspecialchars($lh['malop']); ?>
                                    </span>
                                </td>
                                <td class="text-start ps-4 text-success fw-medium"><?= htmlspecialchars($lh['tenlop']); ?></td>
                                <td class="text-start text-muted"><?= htmlspecialchars($lh['ghichu']); ?></td>
                                <td>
                                    <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/lophoc/edit/<?= $lh['id']; ?>" class="btn btn-warning btn-sm fw-medium text-dark px-2 py-1">Sửa</a>
                                    <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/lophoc/delete/<?= $lh['id']; ?>" class="btn btn-danger btn-sm fw-medium px-2 py-1" onclick="return confirm('Bạn có chắc muốn xóa lớp học này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center py-4 text-muted">Không tìm thấy lớp học nào.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
