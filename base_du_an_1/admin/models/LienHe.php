<?php

class LienHe {
    public $conn;

    // Kết nối CSDL
    public function __construct() {
        $this->conn = connectDB();
    }

    // Danh sách danh mục
    public function getAll(){
        try {
            //code...
            $sql = 'SELECT * FROM lien_hes';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    // Cập nhật dữ liệu vào CSDL
    public function updateData($id,$email,$so_dien_thoai,$dia_chi,$noi_dung){
        try {
            //code...
            $sql = 'UPDATE `lien_hes` SET email= :email,
            so_dien_thoai= :so_dien_thoai,dia_chi= :dia_chi,noi_dung= :noi_dung WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':noi_dung', $noi_dung);


            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    // Thêm dữ liệu vào CSDL
    public function postData($email,$so_dien_thoai,$dia_chi,$noi_dung){
        try {
            //code...
            $sql = 'INSERT INTO lien_hes (email,so_dien_thoai,dia_chi,noi_dung) 
            VALUES (:email, :so_dien_thoai, :dia_chi, :noi_dung)';

            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào tham số
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':noi_dung', $noi_dung);
            var_dump($sql);
            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }


    // Lấy thông tin chi tiết 
    public function getDetailData($id){
        try {
            $sql = 'SELECT * FROM lien_hes WHERE id = :id';
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
            $sql = 'DELETE FROM lien_hes WHERE id = :id';
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