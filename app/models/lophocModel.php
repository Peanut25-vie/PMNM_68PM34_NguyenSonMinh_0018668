<?php
require_once __DIR__ . '/../core/DB.php';

class lophocModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = ConnectDB::connect();
    }

    public function paging($limit = 10, $offset = 0, $search = '')
    {
        $query = "SELECT * FROM tbl_lophocs WHERE 1=1";
        $params = [];

        if (!empty($search)) {
            $query .= " AND (malop LIKE :search OR tenlop LIKE :search)";
            $params[':search'] = '%' . $search . '%';
        }

        // Đếm tổng số bản ghi
        $countQuery = str_replace("SELECT *", "SELECT COUNT(*)", $query);
        $stmtCount = $this->conn->prepare($countQuery);
        $stmtCount->execute($params);
        $totalRecords = $stmtCount->fetchColumn();

        // Lấy dữ liệu phân trang
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
            'lophocs' => $result, 
            'totalpage' => $totalPages,
            'totalrecords' => $totalRecords
        ];
    }

    public function create($data)
    {
        $query = "INSERT INTO tbl_lophocs (malop, tenlop, ghichu) VALUES (:malop, :tenlop, :ghichu)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':malop' => $data['malop'],
            ':tenlop' => $data['tenlop'],
            ':ghichu' => $data['ghichu']
        ]);
    }

    public function getLopHocById($id)
    {
        $query = "SELECT * FROM tbl_lophocs WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $query = "UPDATE tbl_lophocs SET malop = :malop, tenlop = :tenlop, ghichu = :ghichu WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':malop' => $data['malop'],
            ':tenlop' => $data['tenlop'],
            ':ghichu' => $data['ghichu'],
            ':id' => $data['id']
        ]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM tbl_lophocs WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
?>
