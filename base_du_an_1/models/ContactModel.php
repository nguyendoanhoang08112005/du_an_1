<?php
class ContactModel
{
     public $conn;

     public function __construct($dbConnection)
     {
          $this->conn = $dbConnection;
     }

     public function saveContact($email, $so_dien_thoai, $dia_chi, $noi_dung)
     {
          $stmt = $this->conn->prepare("INSERT INTO lien_hes (email, so_dien_thoai, dia_chi, noi_dung) VALUES (?, ?, ?, ?)");
          $stmt->bind_param('ssss', $email, $so_dien_thoai, $dia_chi, $noi_dung);
          return $stmt->execute();
     }
}
