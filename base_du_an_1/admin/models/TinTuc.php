<?php

class TinTuc {
    public $conn;

    // Kết nối CSDL
    public function __construct() {
        $this->conn = connectDB();
    }

    // Danh sách danh mục
    public function getAll(){
        try {
            //code...
            $sql = 'SELECT * FROM tin_tucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    // Cập nhật dữ liệu vào CSDL
    public function updateData($id,$tieu_de_bai_viet,$ngay_dang,$trang_thai,$hinh_anh,$noi_dung){
        try {
            if ($hinh_anh!='') {
                $sql = 'UPDATE `tin_tucs` SET tieu_de_bai_viet= :tieu_de_bai_viet,ngay_dang= :ngay_dang,trang_thai= :trang_thai,
                hinh_anh= :hinh_anh,noi_dung= :noi_dung WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                // Gán giá trị vào tham số
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':tieu_de_bai_viet', $tieu_de_bai_viet);
                $stmt->bindParam(':ngay_dang', $ngay_dang);
                $stmt->bindParam(':trang_thai', $trang_thai);
                $stmt->bindParam(':hinh_anh', $hinh_anh);
                $stmt->bindParam(':noi_dung', $noi_dung);
            }else{
                $sql = 'UPDATE `tin_tucs` SET tieu_de_bai_viet= :tieu_de_bai_viet,
                ngay_dang= :ngay_dang,trang_thai= :trang_thai,noi_dung= :noi_dung WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                // Gán giá trị vào tham số
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':tieu_de_bai_viet', $tieu_de_bai_viet);
                $stmt->bindParam(':ngay_dang', $ngay_dang);
                $stmt->bindParam(':trang_thai', $trang_thai);
                $stmt->bindParam(':noi_dung', $noi_dung);
            }
            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    // Thêm dữ liệu vào CSDL
    public function postData($tieu_de_bai_viet,$ngay_dang,$trang_thai,$hinh_anh,$noi_dung){
        try {
            //code...
            $sql = 'INSERT INTO tin_tucs (tieu_de_bai_viet,ngay_dang,trang_thai,hinh_anh,noi_dung) 
            VALUES (:tieu_de_bai_viet, :ngay_dang, :trang_thai, :hinh_anh, :noi_dung)';

            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào tham số
            $stmt->bindParam(':tieu_de_bai_viet', $tieu_de_bai_viet);
            $stmt->bindParam(':ngay_dang', $ngay_dang);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':noi_dung', $noi_dung);

            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }


    // Lấy thông tin chi tiết 
    public function getDetailData($id){
        try {
            $sql = 'SELECT * FROM tin_tucs WHERE id = :id';
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
            $sql = 'DELETE FROM tin_tucs WHERE id = :id';
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