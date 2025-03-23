<?php

class BinhLuan {
    public $conn;

    // Kết nối CSDL
    public function __construct() {
        $this->conn = connectDB();
    }
    
    public function themBinhLuan($san_pham_id, $nguoi_dung_id, $noi_dung, $ngay_dang, $trang_thai) {
        $sql = "INSERT INTO binh_luans (san_pham_id, nguoi_dung_id, noi_dung, ngay_dang, trang_thai) 
                  VALUES (:san_pham_id, :nguoi_dung_id, :noi_dung, :ngay_dang, :trang_thai)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':san_pham_id', $san_pham_id);
        $stmt->bindParam(':nguoi_dung_id', $nguoi_dung_id);
        $stmt->bindParam(':noi_dung', $noi_dung);
        $stmt->bindParam(':ngay_dang', $ngay_dang);
        $stmt->bindParam(':trang_thai', $trang_thai);
        // var_dump($stmt);die();

        return $stmt->execute();
    }
    public function layBinhLuanTheoSanPham($san_pham_id) {
        try {
            $sql = "SELECT * FROM binh_luans 
                    WHERE san_pham_id = :san_pham_id AND trang_thai = 1 
                    ORDER BY ngay_dang DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->execute();
    
            // Lấy tất cả các bình luận
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Kiểm tra nếu không có bình luận nào
            if (empty($result)) {
                return []; // Trả về mảng rỗng nếu không có dữ liệu
            }
            return $result; // Trả về danh sách bình luận
        } catch (PDOException $e) {
            // Ghi log hoặc xử lý ngoại lệ nếu cần
            echo "Lỗi khi lấy bình luận: " . $e->getMessage();
        }
    }
    
    
    


}     