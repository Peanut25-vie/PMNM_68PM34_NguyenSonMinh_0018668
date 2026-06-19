<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white text-center fw-bold">
                    <h4 class="mb-0">Thêm lớp học mới</h4>
                </div>
                <div class="card-body">
                    <form action="/PMNM_68PM34_NguyenSonMinh_0018668/public/lophoc/store" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Mã lớp:</label>
                            <input type="text" class="form-control" name="malop" placeholder="Ví dụ: CNTT01" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tên lớp:</label>
                            <input type="text" class="form-control" name="tenlop" placeholder="Ví dụ: Công nghệ thông tin K01" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Ghi chú (Tùy chọn):</label>
                            <textarea class="form-control" name="ghichu" rows="3"></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Lưu lớp học</button>
                            <a href="/PMNM_68PM34_NguyenSonMinh_0018668/public/lophoc/index" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
