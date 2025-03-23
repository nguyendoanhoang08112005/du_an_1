<?php

class KhuyenMai {
    public $conn;

    // Kết nối CSDL
    public function __construct() {
        $this->conn = connectDB();
    }

    // Danh sách danh mục
    public function getAll(){
        try {
            //code...
            $sql = 'SELECT * FROM khuyen_mais';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    // Cập nhật dữ liệu vào CSDL
    public function updateData($id,$ten_khuyen_mai,$gia_tri,$ngay_bat_dau,$ngay_ket_thuc,$mo_ta,$trang_thai){
        try {
            //code...
            $sql = 'UPDATE `khuyen_mais` SET ten_khuyen_mai= :ten_khuyen_mai,
            gia_tri= :gia_tri,ngay_bat_dau= :ngay_bat_dau,ngay_ket_thuc= :ngay_ket_thuc,mo_ta= :mo_ta,trang_thai= :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_khuyen_mai', $ten_khuyen_mai);
            $stmt->bindParam(':gia_tri', $gia_tri);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);
        

            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    // Thêm dữ liệu vào CSDL
    public function postData($ten_khuyen_mai,$gia_tri,$ngay_bat_dau,$ngay_ket_thuc,$mo_ta,$trang_thai){
        try {
            //code...
            $sql = 'INSERT INTO khuyen_mais (ten_khuyen_mai,gia_tri,ngay_bat_dau,ngay_ket_thuc,mo_ta,trang_thai) 
            VALUES (:ten_khuyen_mai, :gia_tri, :ngay_bat_dau, :ngay_ket_thuc, :mo_ta, :trang_thai)';

            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào tham số
            $stmt->bindParam(':ten_khuyen_mai', $ten_khuyen_mai);
            $stmt->bindParam(':gia_tri', $gia_tri);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }


    // Lấy thông tin chi tiết 
    public function getDetailData($id){
        try {
            $sql = 'SELECT * FROM khuyen_mais WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    // // Xóa dữ liệu trong CSDL
    public function deleteData($id){
        try {
            $sql = 'DELETE FROM khuyen_mais WHERE id = :id';
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