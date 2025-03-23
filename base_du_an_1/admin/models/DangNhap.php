<?php

class DangNhap
{
    public $conn;

    //kết nối CSDL

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = 'SELECT * FROM nguoi_dungs WHERE email = :email ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
                if ($mat_khau == $user['mat_khau']) {
                    if ($user['chuc_vu_id'] == "Admin") {
                        if ($user['trang_thai'] == "Hoạt động") {
                            return $user['email'];
                        } else {               
                            return 'Tài khoản bị cấm';
                        }
                    } else {
                        return 'Tài khoản không có quyền đăng nhập';
                    }
                } else {
                    return 'Đăng nhập sai thông tin mật khẩu hoặc tài khoản';
                }               

        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
    


}