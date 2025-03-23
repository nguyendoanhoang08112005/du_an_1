<?php

class  DangNhapClient
{
    public $conn;

    //kết nối CSDL

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function checkdangki($ho_ten,$email,$so_dien_thoai, $ngay_sinh,$dia_chi, $password,$chuc_vu_id, $trang_thai,$file_thumb,$gioi_tinh) {
        // var_dump($chuc_vu_id);die;
        try {
            $sql = 'INSERT INTO nguoi_dungs (ho_ten,email,so_dien_thoai,mat_khau,ngay_sinh,dia_chi,chuc_vu_id,trang_thai,anh_dai_dien,gioi_tinh)
             VALUES (:ho_ten,:email,:so_dien_thoai,:mat_khau,:ngay_sinh,:dia_chi,:chuc_vu_id,:trang_thai,:anh_dai_dien,:gioi_tinh) ';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ho_ten', $ho_ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':ngay_sinh',$ngay_sinh );
            $stmt->bindParam(':dia_chi',$dia_chi );
            $stmt->bindParam(':mat_khau',$password );
            $stmt->bindParam(':chuc_vu_id',$chuc_vu_id );
            $stmt->bindParam(':trang_thai',$trang_thai );
            $stmt->bindParam(':anh_dai_dien',$file_thumb );
            $stmt->bindParam(':gioi_tinh',$gioi_tinh );

            $stmt->execute();

        } catch (PDOException $e){
            echo 'loi: '.$e->getMessage();
        }
    }

    public function checkLoginClient($email, $mat_khau)
    {
        try {
            $sql = 'SELECT * FROM nguoi_dungs WHERE email = :email ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
                if ($mat_khau == $user['mat_khau']) {
                    if ($user['chuc_vu_id'] == "Người dùng") {
                        if ($user['trang_thai'] == "Hoạt động") {
                            return $user ;
                        } else {               
                            return 'Tài khoản bị cấm';
                        }
                    } else {
                        return 'Đăng nhập sai thông tin mật khẩu hoặc tài khoản';
                    }
                } else {
                    return 'Đăng nhập sai thông tin mật khẩu hoặc tài khoản';
                }               

        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function getDetailAnh($id){
        try {
            $sql = 'SELECT *
            FROM nguoi_dungs  WHERE id = :id ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function checkSua($id, $ho_ten,$email,$so_dien_thoai, $dia_chi,$ngay_sinh, $gioi_tinh,$mat_khau,$new_file ) {
        try {

        $sql = 'UPDATE nguoi_dungs SET ho_ten =:ho_ten, email =:email, so_dien_thoai =:so_dien_thoai,
        dia_chi =:dia_chi, ngay_sinh =:ngay_sinh, gioi_tinh =:gioi_tinh, mat_khau =:mat_khau, anh_dai_dien =:anh_dai_dien
        WHERE id =:id';

        
          $stmt = $this->conn->prepare($sql);
    
                //gán gtri vào các tham số
                $stmt->bindParam(':id', $id);
              
                $stmt->bindParam(':ho_ten', $ho_ten);
    
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
               
                $stmt->bindParam(':dia_chi', $dia_chi);
                $stmt->bindParam(':ngay_sinh', $ngay_sinh);
                $stmt->bindParam(':gioi_tinh', $gioi_tinh);
                $stmt->bindParam(':mat_khau', $mat_khau);
                $stmt->bindParam(':anh_dai_dien', $new_file);
                $stmt->execute();
    
                return true;
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();

        }
        
    }
    public function showclient($id)
{
    try {
        $sql = 'SELECT * FROM nguoi_dungs WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(); // Lấy dữ liệu dạng mảng
    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
        return false;
    }
}

    public function checkEmailExists($email) {
        $sql = "SELECT * FROM nguoi_dungs WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->rowCount() > 0;
    }
    
    public function checkPhoneExists($phone) {
        $sql = "SELECT * FROM nguoi_dungs WHERE so_dien_thoai = :phone";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['phone' => $phone]);
        return $stmt->rowCount() > 0;
    }    

}