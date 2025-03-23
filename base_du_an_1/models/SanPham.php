<?php
class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Kết nối cơ sở dữ liệu
    }

    // Lấy tất cả sản phẩm
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy sản phẩm theo danh mục và hỗ trợ phân trang
    public function chitiet($id, $offset, $limit)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.danh_muc_id = :danh_muc_id
                    LIMIT :offset, :limit';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':danh_muc_id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy tổng số sản phẩm trong danh mục
    public function getTotalProductsByCategory($categoryId)
    {
        try {
            $sql = 'SELECT COUNT(*) FROM san_phams WHERE danh_muc_id = :danh_muc_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':danh_muc_id' => $categoryId]);

            return $stmt->fetchColumn(); // Trả về tổng số sản phẩm
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy chi tiết một sản phẩm
    public function selectChiTietSp($id): mixed
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE id = :id'; // Lọc theo id sản phẩm
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]); // Truyền id sản phẩm vào

            return $stmt->fetch(); // Lấy một sản phẩm
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getAllSP($search)
    {
        try {
            // Truy vấn SQL tìm kiếm sản phẩm theo tên
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.ten_san_pham LIKE :search OR danh_mucs.ten_danh_muc LIKE :search';

            $stmt = $this->conn->prepare($sql);
            $searchTerm = '%' . $search . '%'; // Thêm dấu '%' để tìm kiếm theo chuỗi con
            $stmt->bindParam(':search', $searchTerm);
            $stmt->execute();

            return $stmt->fetchAll(); // Trả về tất cả kết quả tìm kiếm
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getNguoiDungFromEmail($user)
    {
        try {
            $sql = 'SELECT * FROM nguoi_dungs
            WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $user);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function getGioHangFromUser($id)
    {
        try {
            $sql = 'SELECT * FROM gio_hangs
            WHERE nguoi_dung_id = :nguoi_dung_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nguoi_dung_id', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function getDetailGioHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_ban, san_phams.gia_khuyen_mai
            FROM chi_tiet_gio_hangs
            INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id            
            WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':gio_hang_id', $id);
            $stmt->execute();

            return $stmt->fetchALL();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function addGioHang($id)
    {
        try {
            $sql = 'INSERT INTO gio_hangs (nguoi_dung_id) VALUES (:id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }

    }

    public function updateSoLuong($gio_hang_id, $san_pham_id, $updateSoLuong)
    {
        try {
            $sql = 'UPDATE chi_tiet_gio_hangs SET so_luong = :so_luong
             WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':gio_hang_id', $gio_hang_id);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->bindParam(':so_luong', $updateSoLuong);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }
    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong)
                VALUES (:gio_hang_id, :san_pham_id, :so_luong)
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':gio_hang_id', $gio_hang_id);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function maxsoluong()
    {
        try {
            $sql = 'SELECT * FROM san_phams
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function xoa($id)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE id = :id   
                ';

            $stmt = $this->conn->prepare($sql);

            // Gán giá trị cho tham số san_pham_id
            $stmt->bindParam(':id', $id);


            // Thực thi câu lệnh SQL
            $stmt->execute();

            // Trả về danh sách sản phẩm
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }

    }
    public function addThanhToan(
        $ten_nguoi_nhan,
        $email_nguoi_nhan,
        $sdt_nguoi_nhan,
        $dia_chi_nguoi_nhan,
        $ghi_chu,
        $tong_tien,
        $phuong_thuc_thanh_toan_id,
        $trang_thai_id,
        $ngay_dat,
        $ma_don_hang,
        $nguoi_dung_id,
        $thanh_toan_id
    ) {
        try {
            $sql = 'INSERT INTO don_hangs (ten_nguoi_nhan , email_nguoi_nhan,sdt_nguoi_nhan,dia_chi_nguoi_nhan, ghi_chu ,tong_tien,phuong_thuc_thanh_toan_id,
                    trang_thai_id,ngay_dat,ma_don_hang, nguoi_dung_id, thanh_toan_id) 
                    VALUES (:ten_nguoi_nhan , :email_nguoi_nhan,:sdt_nguoi_nhan,:dia_chi_nguoi_nhan, :ghi_chu ,:tong_tien,:phuong_thuc_thanh_toan_id,
                    :trang_thai_id,:ngay_dat,:ma_don_hang, :nguoi_dung_id, :thanh_toan_id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ten_nguoi_nhan', $ten_nguoi_nhan);
            $stmt->bindParam(':email_nguoi_nhan', $email_nguoi_nhan);
            $stmt->bindParam(':sdt_nguoi_nhan', $sdt_nguoi_nhan);
            $stmt->bindParam(':dia_chi_nguoi_nhan', $dia_chi_nguoi_nhan);
            $stmt->bindParam(':ghi_chu', $ghi_chu);
            $stmt->bindParam(':tong_tien', $tong_tien);
            $stmt->bindParam(':phuong_thuc_thanh_toan_id', $phuong_thuc_thanh_toan_id);
            $stmt->bindParam(':trang_thai_id', $trang_thai_id);
            $stmt->bindParam(':ngay_dat', $ngay_dat);
            $stmt->bindParam(':ma_don_hang', $ma_don_hang);
            $stmt->bindParam(':nguoi_dung_id', $nguoi_dung_id);
            $stmt->bindParam(':thanh_toan_id', $thanh_toan_id);

            $stmt->execute();

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }

    }

    public function addChiTietDonhang($donHangId, $sanPhamId, $donGia, $soLuong, $thanhTien)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_don_hangs (don_hang_id,san_pham_id,don_gia,so_luong,thanh_tien)
                VALUES (:don_hang_id,:san_pham_id,:don_gia,:so_luong,:thanh_tien )';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':don_hang_id', $donHangId);
            $stmt->bindParam(':san_pham_id', $sanPhamId);
            $stmt->bindParam(':don_gia', $donGia);
            $stmt->bindParam(':so_luong', $soLuong);
            $stmt->bindParam(':thanh_tien', $thanhTien);
            $stmt->execute();

            return true;

        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }


    public function clearDetailGioHang($gioHangId)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':gio_hang_id', $gioHangId);
            ;
            $stmt->execute();

            return true;

        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function clearGioHang($nguoiDungId)
    {
        try {
            $sql = 'DELETE FROM gio_hangs WHERE nguoi_dung_id = :nguoi_dung_id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nguoi_dung_id', $nguoiDungId);
            ;
            $stmt->execute();

            return true;

        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }
    public function getDonHangFromUser($id)
    {
        try {
            $sql = 'SELECT * FROM don_hangs
            WHERE nguoi_dung_id = :nguoi_dung_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nguoi_dung_id', $id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }
    public function getTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }
    public function getPhuongThucThanhtoan()
    {
        try {
            $sql = 'SELECT * FROM phuong_thuc_thanh_toans';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }
    public function getDonHangById($donHangId)
    {
        try {
            $sql = 'SELECT * FROM don_hangs WHERE id =:id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $donHangId]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }
    public function updateTrangThaiDonHang($donHangId, $trangThaiId)
    {
        try {
            $sql = 'UPDATE don_hangs SET trang_thai_id = :trang_thai_id WHERE id =:id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai_id' => $trangThaiId,
                ':id' => $donHangId
            ]);

            return true;
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }
    public function getChiTietDonHangByDonHangId($donHangId)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham, san_phams.so_luong, san_phams.hinh_anh
                    FROM chi_tiet_don_hangs
                    JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id';
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':don_hang_id' => $donHangId]);
    
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }
    



}
