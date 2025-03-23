<?php

class  spBanChay
{
    public $conn;

    //kết nối CSDL

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function topSanPhamBanChay()
    {
        try {
            $sql = 'SELECT san_phams.*, 
                       
                        SUM(chi_tiet_don_hangs.so_luong) AS tong_so_luong_ban
                        
                    FROM chi_tiet_don_hangs
                    INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    GROUP BY san_phams.id
                    ORDER BY tong_so_luong_ban DESC
                    ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function listkhuyenmai(){
        try {
            $sql = 'SELECT * FROM khuyen_mais ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

}