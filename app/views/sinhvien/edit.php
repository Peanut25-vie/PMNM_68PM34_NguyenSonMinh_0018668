<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark text-center fw-bold">
                    <h4 class="mb-0">Sửa thông tin sinh viên</h4>
                </div>
                <div class="card-body">
                    <form action="/baitap/public/sinhvien/update/<?= $sv['id']; ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Họ tên:</label>
                            <input type="text" class="form-control" name="hoten" value="<?= htmlspecialchars($sv['hoten']); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Giới tính:</label>
                            <select class="form-select" name="gioitinh" required>
                                <option value="Nam" <?= $sv['gioitinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                                <option value="Nữ" <?= $sv['gioitinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">MSSV:</label>
                            <input type="text" class="form-control" name="mssv" value="<?= htmlspecialchars($sv['mssv']); ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Lớp học (Không bắt buộc):</label>
                            <input type="text" class="form-control" name="lophoc" value="<?= htmlspecialchars($sv['lophoc'] ?? ''); ?>">
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Lưu cập nhật</button>
                            <a href="/baitap/public/sinhvien/index" class="btn btn-secondary">Hủy bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
