# # Hệ thống Quản lý Sinh viên và Lớp học (PHP MVC)

Đây là bài tập lớn xây dựng hệ thống quản lý sinh viên và lớp học sử dụng kiến trúc MVC thuần bằng PHP.

## ⚙️ Hướng dẫn cài đặt và chạy mã nguồn

Để chạy được project này trên máy tính của bạn (sử dụng XAMPP), vui lòng làm chính xác theo các bước sau:

**Bước 1:** Tải mã nguồn về máy (Download ZIP) hoặc Clone repository này.

**Bước 2:** Giải nén và copy thư mục mã nguồn vào bên trong thư mục `htdocs` của XAMPP (thường là `C:\xampp\htdocs\` hoặc `D:\xampp\htdocs\`).

**Bước 3 (CỰC KỲ QUAN TRỌNG):** Bạn bắt buộc phải đổi tên thư mục mã nguồn vừa copy vào htdocs thành **`baitap`**. 
*(Nếu không đổi tên, hệ thống điều hướng Routing sẽ bị lỗi 404 Not Found).*

**Bước 4: Thiết lập Cơ sở dữ liệu**
1. Mở XAMPP, chạy Apache và MySQL.
2. Truy cập `http://localhost/phpmyadmin` (hoặc cổng tương ứng của bạn).
3. Tạo một database mới có tên là: `68PM34`
4. Chạy các file mã lệnh SQL (hoặc import) để tạo bảng `tbl_sinhviens` và `tbl_lophocs`.

**Bước 5: Chạy ứng dụng**
Mở trình duyệt và truy cập vào đường dẫn: 
👉 `http://localhost:8080/baitap/public/` *(Lưu ý sửa lại `8080` thành cổng Apache trên máy bạn nếu khác).*

Tài khoản đăng nhập mặc định:
- Username: `admin`
- Password: `admin123`
