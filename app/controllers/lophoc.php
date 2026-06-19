<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../views/middleware.php';

class lophoc extends Controller
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

        $offset = ($page - 1) * $limit;

        $lophocModel = $this->model('lophocModel');
        $result = $lophocModel->paging($limit, $offset, $search);

        $this->view("layout/masterlayout", [
            'viewname' => 'lophoc/index',
            'title' => 'Danh sách lớp học',
            'lophocs' => $result['lophocs'],
            'totalpage' => $result['totalpage'],
            'totalrecords' => $result['totalrecords'],
            'limit' => $limit,
            'page' => $page,
            'search' => $search,
            'offset' => $offset
        ]);
    }

    public function create()
    {
        $this->view("layout/masterlayout", [
            'viewname' => 'lophoc/create',
            'title' => 'Thêm lớp học'
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'malop' => trim($_POST['malop']),
                'tenlop' => trim($_POST['tenlop']),
                'ghichu' => trim($_POST['ghichu'])
            ];
            
            $lophocModel = $this->model('lophocModel');
            if ($lophocModel->create($data)) {
                $_SESSION['success'] = "Thêm lớp học thành công!";
                header("Location: /baitap/public/lophoc/index");
            } else {
                $_SESSION['error'] = "Thêm lớp học thất bại!";
                header("Location: /baitap/public/lophoc/create");
            }
            exit();
        }
    }

    public function edit($id)
    {
        $lophocModel = $this->model('lophocModel');
        $lh = $lophocModel->getLopHocById($id);
        
        if ($lh) {
            $this->view("layout/masterlayout", [
                'viewname' => 'lophoc/edit',
                'title' => 'Sửa lớp học',
                'lh' => $lh
            ]);
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,
                'malop' => trim($_POST['malop']),
                'tenlop' => trim($_POST['tenlop']),
                'ghichu' => trim($_POST['ghichu'])
            ];
            
            $lophocModel = $this->model('lophocModel');
            $lophocModel->update($data);
            
            $_SESSION['success'] = "Cập nhật lớp học thành công!";
            header("Location: /baitap/public/lophoc/index");
            exit();
        }
    }

    public function delete($id)
    {
        $lophocModel = $this->model('lophocModel');
        $lophocModel->delete($id);
        
        $_SESSION['success'] = "Đã xóa lớp học thành công!";
        header("Location: /baitap/public/lophoc/index");
        exit();
    }
}
?>
