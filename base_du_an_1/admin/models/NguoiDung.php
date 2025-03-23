<?php

class NguoiDung {
    public $conn;

    // Kết nối CSDL
    public function __construct() {
        $this->conn = connectDB();
    }

    // Danh sách danh mục
    public function getAll(){
        try {
            //code...
            $sql = 'SELECT * FROM nguoi_dungs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    // Cập nhật dữ liệu vào CSDL
    public function updateData($id,$trang_thai,$chuc_vu_id){
        try {
            
                $sql = 'UPDATE `nguoi_dungs` SET trang_thai = :trang_thai,chuc_vu_id = :chuc_vu_id WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                // Gán giá trị vào tham số
                $stmt->bindParam(':id', $id);
                // $stmt->bindParam(':ho_ten', $ho_ten);
                // $stmt->bindParam(':anh_dai_dien', $anh_dai_dien);
                // $stmt->bindParam(':ngay_sinh', $ngay_sinh);
                // $stmt->bindParam(':email', $email);
                // $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
                // $stmt->bindParam(':gioi_tinh', $gioi_tinh);
                // $stmt->bindParam(':dia_chi', $dia_chi);
                // $stmt->bindParam(':mat_khau', $mat_khau);
                $stmt->bindParam(':trang_thai', $trang_thai);
                $stmt->bindParam(':chuc_vu_id', $chuc_vu_id);
            
                // $sql = 'UPDATE `nguoi_dungs` SET trang_thai = :trang_thai,chuc_vu_id = :chuc_vu_id WHERE id = :id';
                // $stmt = $this->conn->prepare($sql);
                // // Gán giá trị vào tham số
                // $stmt->bindParam(':id', $id);
                // // $stmt->bindParam(':ho_ten', $ho_ten);
                // // $stmt->bindParam(':ngay_sinh', $ngay_sinh);
                // // $stmt->bindParam(':email', $email);
                // // $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
                // // $stmt->bindParam(':gioi_tinh', $gioi_tinh);
                // // $stmt->bindParam(':dia_chi', $dia_chi);
                // // $stmt->bindParam(':mat_khau', $mat_khau);
                // $stmt->bindParam(':trang_thai', $trang_thai);
                // $stmt->bindParam(':chuc_vu_id', $chuc_vu_id);
            


            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }
    // Thêm dữ liệu vào CSDL
    public function postData($ho_ten,$anh_dai_dien,$ngay_sinh,$email,$so_dien_thoai,$gioi_tinh,$dia_chi,$mat_khau,$trang_thai,$chuc_vu_id){
        try {
            //code...
            $sql = 'INSERT INTO nguoi_dungs (ho_ten,anh_dai_dien,ngay_sinh,email,so_dien_thoai,gioi_tinh,dia_chi,mat_khau,trang_thai,chuc_vu_id) 
            VALUES (:ho_ten, :anh_dai_dien, :ngay_sinh, :email, :so_dien_thoai, :gioi_tinh, :dia_chi, :mat_khau, :trang_thai, :chuc_vu_id)';

            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào tham số
            $stmt->bindParam(':ho_ten', $ho_ten);
            $stmt->bindParam(':anh_dai_dien', $anh_dai_dien);
            $stmt->bindParam(':ngay_sinh', $ngay_sinh);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':gioi_tinh', $gioi_tinh);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':chuc_vu_id', $chuc_vu_id);

            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();}
    }


    // Lấy thông tin chi tiết 
    public function getDetailData($id){
        try {
            $sql = 'SELECT * FROM nguoi_dungs WHERE id = :id';
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
            $sql = 'DELETE FROM nguoi_dungs WHERE id = :id';
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