<?php
class TinTuc{
    public $conn;
    public function __construct(){
        $this->conn=connectDB();
    }
    public function getAllTinTuc(){
        try {
            $sql = 'SELECT id, tieu_de_bai_viet, ngay_dang, hinh_anh FROM tin_tucs;';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getDetailTinTuc($id){
        try {
            $sql = 'SELECT * FROM tin_tucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
}