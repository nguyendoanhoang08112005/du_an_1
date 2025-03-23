<?php

class DonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDonHang()
    {
        try {
            $sql = 'SELECT don_hangs.*,
            phuong_thuc_thanh_toans.ten_phuong_thuc,
            trang_thai_thanh_toans.thanh_toan,
            trang_thai_don_hangs.ten_trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            INNER JOIN trang_thai_thanh_toans ON don_hangs.thanh_toan_id = trang_thai_thanh_toans.id
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
            ORDER BY don_hangs.id DESC
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }


    public function getDetailDonHang($don_hang_id)
    {
        try {
            $sql = 'SELECT don_hangs.*,
                            trang_thai_don_hangs.ten_trang_thai,
                            nguoi_dungs.ho_ten,
                            nguoi_dungs.email,
                            nguoi_dungs.so_dien_thoai,
                            phuong_thuc_thanh_toans.ten_phuong_thuc
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            INNER JOIN nguoi_dungs ON don_hangs.nguoi_dung_id = nguoi_dungs.id
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
            WHERE don_hangs.id = :id ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $don_hang_id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getListSpDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham
            FROM chi_tiet_don_hangs
            INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_don_hangs.don_hang_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

   
    public function updateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id)
    {
        try {
            // var_dump($id);die;
            $sql = 'UPDATE don_hangs SET
            ten_nguoi_nhan = :ten_nguoi_nhan,
            sdt_nguoi_nhan = :sdt_nguoi_nhan,
            email_nguoi_nhan = :email_nguoi_nhan,
            dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan,
            ghi_chu = :ghi_chu,
            trang_thai_id = :trang_thai_id
            WHERE id = :id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt);die;

            $stmt->execute([ ':ten_nguoi_nhan' => $ten_nguoi_nhan,
            ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
            ':email_nguoi_nhan' => $email_nguoi_nhan,
            ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
            ':ghi_chu' => $ghi_chu,
            ':trang_thai_id' => $trang_thai_id,
            ':id' => $id
        ]);

            // Lấy id đơn hàng vừa thêm
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }



    public function getDonHangFromKhachHang($id)
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            WHERE don_hangs.nguoi_dung_id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function countTrangThaiDonHang() {
        try {
            $sql = 'SELECT COUNT(*) as count FROM don_hangs WHERE trang_thai_id = 5';

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả đếm
        $result = $stmt->fetch();

        // Trả về tổng số lượng đơn hàng thành công
        return $result['count'];
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }

     public function countChoXacNhan() {
        try {
            $sql = 'SELECT COUNT(*) as choXacNhan FROM don_hangs WHERE trang_thai_id = 1';

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả đếm
        $result = $stmt->fetch();

        // Trả về tổng số lượng đơn hàng thành công
        return $result['choXacNhan'];
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }

     public function countDaXacNhan() {
        try {
            $sql = 'SELECT COUNT(*) as daXacNhan FROM don_hangs WHERE trang_thai_id = 2';

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả đếm
        $result = $stmt->fetch();

        // Trả về tổng số lượng đơn hàng thành công
        return $result['daXacNhan'];
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }

     public function countDangGiao() {
        try {
            $sql = 'SELECT COUNT(*) as dangGiao FROM don_hangs WHERE trang_thai_id = 3';

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả đếm
        $result = $stmt->fetch();

        // Trả về tổng số lượng đơn hàng thành công
        return $result['dangGiao'];
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }

     public function countDaGiao() {
        try {
            $sql = 'SELECT COUNT(*) as daGiao FROM don_hangs WHERE trang_thai_id = 4';

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả đếm
        $result = $stmt->fetch();

        // Trả về tổng số lượng đơn hàng thành công
        return $result['daGiao'];
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }

     public function countThatBai() {
        try {
            $sql = 'SELECT COUNT(*) as thatBai FROM don_hangs WHERE trang_thai_id = 6';

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả đếm
        $result = $stmt->fetch();

        // Trả về tổng số lượng đơn hàng thành công
        return $result['thatBai'];
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }

     public function countDaHuy() {
        try {
            $sql = 'SELECT COUNT(*) as huy FROM don_hangs WHERE trang_thai_id = 7';

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả đếm
        $result = $stmt->fetch();

        // Trả về tổng số lượng đơn hàng thành công
        return $result['huy'];
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }




     public function countDonHang() {
        try {
            $sql = 'SELECT COUNT(*) as count FROM don_hangs ';

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả đếm
        $result = $stmt->fetch();

        // Trả về tổng số lượng đơn hàng thành công
        return $result['count'];
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }

     public function countKhachHang() {
        try {
            $sql = 'SELECT COUNT(*) as count FROM don_hangs ';

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả đếm
        $result = $stmt->fetch();

        // Trả về tổng số lượng đơn hàng thành công
        return $result['count'];
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }

     public function sumDonHang() {
        try {
            $sql = 'SELECT SUM(tong_tien) as count FROM don_hangs WHERE trang_thai_id = 5';

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả đếm
        $result = $stmt->fetch();

        // Trả về tổng số lượng đơn hàng thành công
        return $result['count'];
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
     }

    public function namDonHang()
    {
        try {
            // SQL query để lấy 5 đơn hàng mới nhất
            $sql = 'SELECT don_hangs.ma_don_hang,ten_nguoi_nhan,ngay_dat, trang_thai_don_hangs.ten_trang_thai
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    ORDER BY don_hangs.ngay_dat DESC
                    LIMIT 5';  // Lấy 5 đơn hàng mới nhất

            // Chuẩn bị câu lệnh SQL
            $stmt = $this->conn->prepare($sql);

            // Thực thi câu lệnh SQL
            $stmt->execute();

            // Trả về 5 đơn hàng mới nhất
            return $stmt->fetchAll();  // fetchAll() trả về tất cả kết quả dưới dạng mảng
        } catch (Exception $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }

    }


    
    //moi
    public function top5SanPhamBanChay()
    {
        try {
            $sql = 'SELECT san_phams.id, 
                        san_phams.ten_san_pham,
                      
                        san_phams.gia_ban, 
                        san_phams.hinh_anh, 
                        SUM(chi_tiet_don_hangs.so_luong) AS tong_so_luong_ban
                        
                    FROM chi_tiet_don_hangs
                    INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    GROUP BY san_phams.id
                    ORDER BY tong_so_luong_ban DESC
                    LIMIT 5';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }      


    public function khachHangThanThiet()
    {
        try {
            $sql = 'SELECT don_hangs.nguoi_dung_id, 
                        nguoi_dungs.ho_ten,
                        nguoi_dungs.trang_thai,
                        nguoi_dungs.anh_dai_dien AS anh_dai_dien, 
                        COUNT(don_hangs.id) AS tong_don_hang, 
                        SUM(don_hangs.tong_tien) AS tong_tien
                    FROM don_hangs
                    INNER JOIN nguoi_dungs ON don_hangs.nguoi_dung_id = nguoi_dungs.id
                    WHERE nguoi_dungs.chuc_vu_id != "admin"
                    GROUP BY don_hangs.nguoi_dung_id, nguoi_dungs.ho_ten, nguoi_dungs.anh_dai_dien,nguoi_dungs.trang_thai
                    ORDER BY tong_don_hang DESC
                    LIMIT 5';


            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}