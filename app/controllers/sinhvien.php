<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../views/middleware.php';

class sinhvien extends Controller
{
    public function __construct()
    {
        middleware::checklogin();
    }

    public function index()
    {
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $lophoc = isset($_GET['lophoc']) ? trim($_GET['lophoc']) : '';

        $offset = ($page - 1) * $limit;

        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset, $search, $lophoc);
        $classes = $sinhvienModel->getUniqueClasses();

        $this->view("layout/masterlayout", [
            'viewname' => 'sinhvien/index',
            'title' => 'Danh sách sinh viên',
            'sinhviens' => $result['sinhviens'],
            'totalpage' => $result['totalpage'],
            'totalrecords' => $result['totalrecords'],
            'classes' => $classes,
            'limit' => $limit,
            'page' => $page,
            'search' => $search,
            'lophoc' => $lophoc,
            'offset' => $offset
        ]);
    }

    public function create()
    {
        $this->view("layout/masterlayout", [
            'viewname' => 'sinhvien/create',
            'title' => 'Thêm sinh viên'
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'hoten' => trim($_POST['hoten']),
                'gioitinh' => trim($_POST['gioitinh']),
                'mssv' => trim($_POST['mssv']),
                'lophoc' => !empty($_POST['lophoc']) ? trim($_POST['lophoc']) : null
            ];
            
            $sinhvienModel = $this->model('sinhvienModel');
            if ($sinhvienModel->create($data)) {
                $_SESSION['success'] = "Thêm sinh viên thành công!";
                header("Location: /PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index");
            } else {
                $_SESSION['error'] = "Thêm sinh viên thất bại!";
                header("Location: /PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/create");
            }
            exit();
        }
    }

    public function edit($id)
    {
        $sinhvienModel = $this->model('sinhvienModel');
        $sv = $sinhvienModel->getSinhVienById($id);
        
        if ($sv) {
            $this->view("layout/masterlayout", [
                'viewname' => 'sinhvien/edit',
                'title' => 'Sửa sinh viên',
                'sv' => $sv
            ]);
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,
                'hoten' => trim($_POST['hoten']),
                'gioitinh' => trim($_POST['gioitinh']),
                'mssv' => trim($_POST['mssv']),
                'lophoc' => !empty($_POST['lophoc']) ? trim($_POST['lophoc']) : null
            ];
            
            $sinhvienModel = $this->model('sinhvienModel');
            $sinhvienModel->update($data);
            
            $_SESSION['success'] = "Cập nhật sinh viên thành công!";
            header("Location: /PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index");
            exit();
        }
    }

    public function delete($id)
    {
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvienModel->delete($id);
        
        $_SESSION['success'] = "Đã xóa sinh viên thành công!";
        header("Location: /PMNM_68PM34_NguyenSonMinh_0018668/public/sinhvien/index");
        exit();
    }
}
?>
