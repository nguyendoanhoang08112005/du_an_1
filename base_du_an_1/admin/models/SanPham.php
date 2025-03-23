<?php

class SanPham
{
    public $conn;

    //kết nối CSDL

    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Danh sách danh mục
    public function getAllSanPham(){
        try {
            
            $sql= 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function insertSanPham($ten_san_pham,$luot_xem, $gia_nhap,$gia_ban,$gia_khuyen_mai,$so_luong, $ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta,$hinh_anh){
        try {
            // var_dump($ten_san_pham,$luot_xem, $gia_nhap,$gia_ban,$gia_khuyen_mai,$so_luong, $ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta,$,$hinh_anh);
            // die();
           
            $sql= 'INSERT INTO san_phams (ten_san_pham,luot_xem, gia_nhap,gia_ban,gia_khuyen_mai,so_luong, ngay_nhap,danh_muc_id,trang_thai, mo_ta,hinh_anh)
            VALUES (:ten_san_pham,:luot_xem, :gia_nhap,:gia_ban,:gia_khuyen_mai,:so_luong,:ngay_nhap,:danh_muc_id,:trang_thai,:mo_ta,:hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
          
            $stmt->bindParam(':ten_san_pham', $ten_san_pham);
            $stmt->bindParam(':luot_xem', $luot_xem);
            $stmt->bindParam(':gia_nhap', $gia_nhap);
            $stmt->bindParam(':gia_ban', $gia_ban);
            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':ngay_nhap', $ngay_nhap);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':mo_ta', $mo_ta);
          
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->execute();

            return $this->conn->lastInsertId();
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();
        }
        }

        public function getDetailSanPham($id){
            try {
                $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                
                WHERE san_phams.id = :id ';
    
                $stmt = $this->conn->prepare($sql);
    
                $stmt->execute([':id'=>$id]);
    
                return $stmt->fetch();
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }

        public function getListAnhSanPham($id){
            try {
                $sql = 'SELECT * FROM  hinh_anh_san_phams WHERE san_pham_id = :id ';
    
                $stmt = $this->conn->prepare($sql);
    
                $stmt->execute([':id'=>$id]);
    
                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }
    
        public function updateSanPham( $san_pham_id,
                                    $ten_san_pham, 
                                    $gia_nhap,
                                    $gia_ban,
                                    $gia_khuyen_mai,
                                    $so_luong,
                                    $ngay_nhap,
                                    $danh_muc_id,
                                    $trang_thai,
                                    $mo_ta,
                                    $hinh_anh
                                    )     {
            try {
                // var_dump($ten_san_pham,$luot_xem, $gia_nhap,$gia_ban,$gia_khuyen_mai,$so_luong, $ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta,$,$hinh_anh);
                // die();
               
                $sql= 'UPDATE san_phams SET ten_san_pham = :ten_san_pham, gia_nhap= :gia_nhap,
                gia_ban = :gia_ban,gia_khuyen_mai = :gia_khuyen_mai,so_luong = :so_luong, ngay_nhap = :ngay_nhap,
                danh_muc_id = :danh_muc_id,trang_thai = :trang_thai, mo_ta = :mo_ta,hinh_anh = :hinh_anh
                WHERE id= :id';
                
                $stmt = $this->conn->prepare($sql);
    
                //gán gtri vào các tham số
                $stmt->bindParam(':id', $san_pham_id);
              
                $stmt->bindParam(':ten_san_pham', $ten_san_pham);
    
                $stmt->bindParam(':gia_nhap', $gia_nhap);
                $stmt->bindParam(':gia_ban', $gia_ban);
               
                $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
                $stmt->bindParam(':so_luong', $so_luong);
                $stmt->bindParam(':ngay_nhap', $ngay_nhap);
                $stmt->bindParam(':danh_muc_id', $danh_muc_id);
                $stmt->bindParam(':trang_thai', $trang_thai);
                $stmt->bindParam(':mo_ta', $mo_ta);
              
                $stmt->bindParam(':hinh_anh', $hinh_anh);
                $stmt->execute();
    
                return true;
            } catch (PDOexception $e){
                echo 'lỗi: ' . $e->getMessage();
    
    
    
            }
            }
    //         public function postEditAnhSanPham()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $san_pham_id = $_POST['san_pham_id'] ?? '';
    //         $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
    //         $img_array = $_FILES['img_array'];
    //         $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
    //         $current_img_ids = $_POST['current_img_ids'] ?? [];

    //         $upload_file = [];
    //         foreach ($img_array['name'] as $key => $value) {
    //             if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
    //                 $new_file = uploadFileAlbum($img_array, './uploads/', $key);
    //                 if ($new_file) {
    //                     $upload_file[] = [
    //                         'id' => $current_img_ids[$key] ?? null,
    //                         'file' => $new_file
    //                     ];
    //                 }
    //             }
    //         }
    //         foreach ($upload_file as $file_info) {
    //             if ($file_info['id']) {
    //                 $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
    //                 $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
    //                 deleteFile($old_file);
    //             } else {
    //                 $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
    //             }
    //         }
    //         foreach ($listAnhSanPhamCurrent as $anhSP) {
    //             $anh_id = $anhSP['id'];
    //             if (in_array($anh_id, $img_delete)) {
    //                 $this->modelSanPham->destroyAnhSanPham($anh_id);
    //                 deleteFile($anhSP['link_hinh_anh']);
    //             }
    //         }
    //         header('location: ?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);           
    //          exit();
    //     }
    // }

        public function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh) {
            try {
                $sql = 'INSERT INTO hinh_anh_san_phams (san_pham_id, link_hinh_anh)
                        VALUES ( :san_pham_id, :link_hinh_anh)';
    
                $stmt = $this->conn->prepare($sql);
    
                $stmt->execute([
                    ':san_pham_id' => $san_pham_id,
                    ':link_hinh_anh' => $link_hinh_anh,
                ]);
    
                // lấy id sản phẩm vừa thêm
                return true;
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }

        public function getDetailAnhSanPham($id){
            try {
                $sql = 'SELECT * FROM hinh_anh_san_phams WHERE id = :id ';
    
                $stmt = $this->conn->prepare($sql);
    
                $stmt->execute([':id'=>$id]);
    
                return $stmt->fetch();
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }

        // public function updateAnhSanPham($id,$new_file) {
        //     try {
        //         $sql = 'UPDATE hinh_hinh_anhs 
        //                 SET 
    
        //                     link_hinh_anh =  :new_file
    
        //                 WHERE id = :id';
    
        //         $stmt = $this->conn->prepare($sql);
    
        //         $stmt->execute([
        //             ':new_file' => $new_file,
        //             ':id' => $id
        //         ]);
    
        //         // lấy id sản phẩm vừa thêm
        //         return true;
        //     } catch (Exception $e) {
        //         echo "Lỗi" . $e->getMessage();
        //     }
        // }
    
        public function destroyAnhSanPham($id)
        {
            try {
                $sql = ' DELETE FROM `hinh_anh_san_phams` WHERE id = :id';
    
                $stmt = $this->conn->prepare($sql);
    
                $stmt->execute([
                    ':id' => $id
                ]);
    
                return true;
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }

        public function destroySanPham($id)
    {
        try {
            $sql = ' DELETE FROM `san_phams` WHERE id = :id';

            $stmt = $this->conn->prepare($sql);


            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getBinhLuanFromKhachHang($id){
        try {
            $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham
                    FROM binh_luans
                    INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                    WHERE binh_luans.nguoi_dung_id = :id';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi " . $e->getMessage();
        }
    }
    public function getDetailBinhLuan($id){
        try {
            $sql = 'SELECT * FROM binh_luans WHERE id = :id';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi " . $e->getMessage();
        }
    }
    public function getBinhLuanFromSanPham($id){
        try {
            $sql = 'SELECT binh_luans.*, nguoi_dungs.ho_ten
                    FROM binh_luans
                    INNER JOIN nguoi_dungs ON binh_luans.nguoi_dung_id = nguoi_dungs.id
                    WHERE binh_luans.san_pham_id = :id';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi " . $e->getMessage();
        }
    }

        
}

?>