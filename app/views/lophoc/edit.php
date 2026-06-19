<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark text-center fw-bold">
                    <h4 class="mb-0">Sửa thông tin lớp học</h4>
                </div>
                <div class="card-body">
                    <form action="/PMNM_68PM34_NguyenSonMinh_0018668/public/lophoc/update/<?= $lh['id']; ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Mã lớp:</label>
                            <input type="text" class="form-control" name="malop" value="<?= htmlspecialchars($lh['malop']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tên lớp:</label>
                            <input type="text" class="form-control" name="tenlop" value="<?= htmlspecialchars($lh['tenlop']); ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Ghi chú (Tùy chọn):</label>
                            <textarea class="form-control" name="ghichu" rows="3"><?= htmlspecialchars($lh['ghichu']); ?></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/lophoc/index" class="btn btn-secondary">Hủy bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
