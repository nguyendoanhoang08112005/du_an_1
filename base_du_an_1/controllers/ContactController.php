<?php
class ContactController
{
     // Function to display the contact form
     public function index()
     {
          include_once 'views/layouts/contact.php';
     }

     // Function to handle form submission
     public function submit()
     {
          // Check if the form is submitted via POST method
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               // Sanitize input data
               $name = $_POST['name'];
               $email = $_POST['email'];
               $phone = $_POST['phone'];
               $address = $_POST['dia_chi'];  // New address field
               $message = $_POST['message'];

               // Validate inputs
               if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($message)) {
                    $error = "Vui lòng điền đầy đủ thông tin!";
                    include_once 'views/layouts/contact.php';
                    return;
               }
               
               // Connect to the database
               $conn = new mysqli('localhost', 'root', '', 'xuong_du_an_1');

               // Check connection
               if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
               }

               // Insert data into the database
               $sql = "INSERT INTO lien_hes (email, so_dien_thoai, dia_chi, noi_dung) 
                       VALUES ('$email', '$phone', '$address', '$message')";

               if ($conn->query($sql) === TRUE) {
                    // Call the success notification function
                    $this->showSuccessMessage($name);
               } else {
                    // Error handling
                    $error = "Có lỗi xảy ra: " . $conn->error;
                    include_once 'views/layouts/contact.php';
               }

               // Close the database connection
               $conn->close();
          }
     }

     // Function to display a success notification
     private function showSuccessMessage($name)
     {
          $success = "Cảm ơn bạn $name! Chúng tôi sẽ liên hệ với bạn sớm nhất.";
          include_once 'views/layouts/contact.php';
     }
}