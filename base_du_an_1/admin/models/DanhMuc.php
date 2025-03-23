<?php

class DanhMuc {
    public $conn;

    // Kết nối CSDL
    public function __construct() {
        $this->conn = connectDB();
    }

    // Danh sách danh mục
    public function getAll(){
        try {
            //code...
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    // Cập nhật dữ liệu vào CSDL
    public function updateData($id,$ten_danh_muc,$trang_thai){
        try {
            //code...
            $sql = 'UPDATE `danh_mucs` SET ten_danh_muc= :ten_danh_muc, trang_thai= :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    
    
    // Lấy thông tin chi tiết 
    public function getDetailData($id){
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
        }

        // Thêm dữ liệu vào CSDL
        public function postData($ten_danh_muc,$trang_thai){
            try {
                //code...
                $sql = 'INSERT INTO danh_mucs (ten_danh_muc, trang_thai) VALUES (:ten_danh_muc, :trang_thai)';
                $stmt = $this->conn->prepare($sql);
                // Gán giá trị vào tham số
                $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
                $stmt->bindParam(':trang_thai', $trang_thai);
    
                $stmt->execute();
                return  true;
            } catch (PDOException $e) {
                echo "Thất bại" . $e->getMessage();}
        }
        
        // Xóa dữ liệu trong CSDL
    public function deleteData($id){
        try {
            $sql = 'DELETE FROM danh_mucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }

    // Hủy kết nối CSDL
    public function __destruct() {
        $this -> conn = null;
    }
}