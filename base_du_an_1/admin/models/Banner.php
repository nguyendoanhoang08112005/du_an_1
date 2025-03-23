<?php

class Banner
{
   public $conn;


   // kết nối csdl
   public function __construct()
   {
      $this->conn = connectDB();
   }
   //danh sách danh mục
   public function getAll()
   {
      try {
         $sql = 'SELECT * FROM banners';

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetchAll();
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }
   //thêm dữ liệu mới vào csdl
   public function postData($tieu_de, $hinh_anh, $trang_thai)
   {
      try {
         $sql = 'INSERT INTO banners (tieu_de,hinh_anh,trang_thai)
                  VALUES ( :tieu_de, :hinh_anh, :trang_thai) ';

         $stmt = $this->conn->prepare($sql);
         // GÁN GIÁ TRỊ VÀO CÁC THAM SỐ 
         $stmt->bindParam(':tieu_de', $tieu_de);
         $stmt->bindParam(':hinh_anh', $hinh_anh);
         $stmt->bindParam(':trang_thai', $trang_thai);
         $stmt->execute();

         return true;
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }
   // lấy thông tin chi tiết 
   public function getDetaildata($id)
   {
      try {
         $sql = 'SELECT * FROM banners WHERE id = :id';

         $stmt = $this->conn->prepare($sql);
         $stmt->bindParam(':id', $id);
         $stmt->execute();

         return $stmt->fetch();
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }
   // cập nhật dữ liệu vào csdl
   public function updateData($id, $tieu_de, $hinh_anh, $trang_thai)
   {
      try {
         if ($hinh_anh != '') {
            $sql = 'UPDATE `banners` SET tieu_de= :tieu_de,hinh_anh= :hinh_anh,trang_thai= :trang_thai,
            hinh_anh= :hinh_anh WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':trang_thai', $trang_thai);
         } else {
            $sql = 'UPDATE `banners` SET tieu_de= :tieu_de,
            trang_thai= :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':trang_thai', $trang_thai);
         }
         $stmt->execute();

         return true;
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }
   //XÓA DỮ LIỆU TRONG CSDL
   public function deleteData($id)
   {
      try {
         $sql = 'DELETE FROM banners WHERE id = :id';

         $stmt = $this->conn->prepare($sql);
         $stmt->bindParam(':id', $id);
         $stmt->execute();

         return true;
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }
   // hủy kết nối 
   public function __destruct()
   {
      $this->conn = null;
   }
}
