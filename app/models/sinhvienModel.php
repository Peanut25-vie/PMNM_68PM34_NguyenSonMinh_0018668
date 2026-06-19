<?php
require_once '../app/core/DB.php';

class sinhvienModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB::Connect();
    }

    public function create($data)
    {
        $query = "INSERT INTO tbl_sinhviens (hoten, gioitinh, mssv, lophoc) VALUES (:hoten, :gioitinh, :mssv, :lophoc)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':hoten' => $data['hoten'],
            ':gioitinh' => $data['gioitinh'],
            ':mssv' => $data['mssv'],
            ':lophoc' => isset($data['lophoc']) ? $data['lophoc'] : null
        ]);
    }

    // Hàm lấy dữ liệu có lọc tìm kiếm và phân trang
    public function paging($limit = 10, $offset = 0, $search = '', $lophoc = '')
    {
        $query = "SELECT * FROM tbl_sinhviens WHERE 1=1";
        $params = [];

        if (!empty($search)) {
            $query .= " AND (hoten LIKE :search OR mssv LIKE :search)";
            $params[':search'] = '%' . $search . '%';
        }

        if (!empty($lophoc)) {
            $query .= " AND lophoc = :lophoc";
            $params[':lophoc'] = $lophoc;
        }

        // Tính tổng số bản ghi
        $countQuery = str_replace("SELECT *", "SELECT COUNT(*)", $query);
        $stmtCount = $this->conn->prepare($countQuery);
        $stmtCount->execute($params);
        $totalRecords = $stmtCount->fetchColumn();

        // Truy vấn lấy dữ liệu
        $query .= " LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);

        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val);
        }
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $totalPages = ceil($totalRecords / $limit);

        return [
            'sinhviens' => $result, 
            'totalpage' => $totalPages,
            'totalrecords' => $totalRecords
        ];
    }

    public function getUniqueClasses()
    {
        $query = "SELECT DISTINCT lophoc FROM tbl_sinhviens WHERE lophoc IS NOT NULL AND lophoc != ''";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getSinhVienById($id)
    {
        $query = "SELECT * FROM tbl_sinhviens WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $query = "UPDATE tbl_sinhviens SET hoten = :hoten, gioitinh = :gioitinh, mssv = :mssv, lophoc = :lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':hoten' => $data['hoten'],
            ':gioitinh' => $data['gioitinh'],
            ':mssv' => $data['mssv'],
            ':lophoc' => isset($data['lophoc']) ? $data['lophoc'] : null,
            ':id' => $data['id']
        ]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM tbl_sinhviens WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
?>
