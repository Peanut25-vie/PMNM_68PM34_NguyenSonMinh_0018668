<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Thêm sinh viên mới</h4>
                </div>
                <div class="card-body">
                    <form action="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/store" method="POST">
                        <div class="mb-3">
                            <label for="mssv" class="form-label fw-bold">MSSV:</label>
                            <input type="text" class="form-control" id="mssv" name="mssv" placeholder="Nhập MSSV..." required>
                        </div>
                        <div class="mb-3">
                            <label for="hoten" class="form-label fw-bold">Họ tên:</label>
                            <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Nhập họ và tên..." required>
                        </div>
                        <div class="mb-3">
                            <label for="gioitinh" class="form-label fw-bold">Giới tính:</label>
                            <select class="form-select" id="gioitinh" name="gioitinh" required>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="lophoc" class="form-label fw-bold">Lớp học (Không bắt buộc):</label>
                            <input type="text" class="form-control" id="lophoc" name="lophoc" placeholder="Ví dụ: Công nghệ thông tin 001">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Lưu sinh viên</button>
                            <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index" class="btn btn-secondary">Quay lại danh sách</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
