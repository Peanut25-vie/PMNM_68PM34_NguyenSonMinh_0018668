<?php
require_once '../app/core/Controller.php';
class sinhvien extends Controller
{
  public function index($limit = 5, $offset = 0, $search = '')
  {
    $sinhvienModel = $this->model('sinhvienModel');

    $result = $sinhvienModel->paging($limit, $offset, $search);
    $sinhviens = $result['sinhviens'];
    $totalpage = $result['totalpage'];
    //trả về view
    //require_once '../app/views/sinhvien/index.php';
    $this->view("layout/masterlayout", ['viewname' => 'sinhvien/index', 'sinhviens' => $sinhviens, 'title' => 'Danh sách sinh viên', 'totalpage' => $totalpage]);
  }

  public function create()
  {
    require_once '../app/views/sinhvien/create.php';
  }
  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'hoten' => $_POST['hoten'],
        'gioitinh' => $_POST['gioitinh'],
        'mssv' => $_POST['mssv']
      ];
      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->create($data);
      if ($result) {
        $_SESSION['success'] = "Thêm sinh viên thành công!";
        header("Location: /sinhvien/index");
        exit();
      } else {
        $_SESSION['error'] = "Thêm sinh viên thất bại!";
      }
    }
  }
}
