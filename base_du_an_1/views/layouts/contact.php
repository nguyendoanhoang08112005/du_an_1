<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>

<!DOCTYPE html>
<html lang="vi">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Liên Hệ</title>
     <style>
          /* Tổng thể trang liên hệ */

          /* Phần container chính */
          .contact-content {
               display: flex;
               justify-content: space-between;
               align-items: flex-start;
               flex-wrap: wrap;
               gap: 20px;
               margin: 0 auto;
               max-width: 1200px;
          }

          /* Phần form liên hệ */
          .form-container {
               flex: 1 1 48%;
               background-color: #ffffff;
               border-radius: 8px;
               box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
               padding: 20px;
               box-sizing: border-box;
          }

          .form-container h2 {
               font-size: 20px;
               margin-bottom: 15px;
               color: #333;
          }

          .form-container input,
          .form-container textarea {
               width: 100%;
               padding: 10px;
               margin-bottom: 15px;
               border: 1px solid #ccc;
               border-radius: 5px;
               box-sizing: border-box;
               font-size: 14px;
          }

          .form-container button {
               display: inline-block;
               width: 100%;
               padding: 10px;
               background-color: #007bff;
               border: none;
               border-radius: 5px;
               color: #ffffff;
               font-size: 16px;
               cursor: pointer;
               transition: background-color 0.3s ease;
          }

          .form-container button:hover {
               background-color: #0056b3;
          }

          /* Phần thông tin liên hệ */
          .contact-info {
               flex: 1 1 48%;
               background-color: #ffffff;
               border-radius: 8px;
               box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
               padding: 20px;
               box-sizing: border-box;
          }

          .contact-info h2 {
               font-size: 20px;
               margin-bottom: 15px;
               color: #333;
          }

          .contact-info p {
               margin: 10px 0;
               color: #555;
               line-height: 1.5;
          }

          .contact-info ul {
               list-style-type: none;
               padding: 0;
               margin: 0;
          }

          .contact-info ul li {
               margin-bottom: 10px;
               color: #555;
          }

          /* Phần cho responsive */
          @media (max-width: 768px) {
               .contact-content {
                    flex-direction: column;
               }

               .form-container,
               .contact-info {
                    flex: 1 1 100%;
               }
          }

          .map-container {
               margin: 20px 0;
               border: 2px solid #ddd;
               border-radius: 8px;
               overflow: hidden;
               box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
          }

          .map-container iframe {
               display: block;
               width: 100%;
               height: 300px;
               border: none;
          }
     </style>
</head>

<body>
     <div class="container">
          <div class="row">
          <div class="contact-page">
          <div class="map-container">
               <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8680812338607!2d105.74242047965527!3d21.03796376714189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455305afd834b%3A0x17268e09af37081e!2sT%C3%B2a%20nh%C3%A0%20FPT%20Polytechnic.!5e0!3m2!1svi!2s!4v1732300330305!5m2!1svi!2s"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="contact-content">
               <div class="form-container">
                    <h2>Gửi thắc mắc cho chúng tôi</h2>
                    <?php if (!empty($error)): ?>
                         <p style="color: red;"><?= $error ?></p>
                    <?php elseif (!empty($success)): ?>
                         <p style="color: green;"><?= $success ?></p>
                    <?php endif; ?>
                    <form action="?act=contact_submit" method="POST">
                         <input type="text" name="name" placeholder="Tên của bạn" required />
                         <input type="email" name="email" placeholder="Email của bạn" required />
                         <input type="tel" name="phone" placeholder="Số điện thoại của bạn" required />
                         <input type="text" name="dia_chi" placeholder="Địa chỉ của bạn" required />
                         <!-- New address field -->
                         <textarea name="message" placeholder="Nội dung" required></textarea>
                         <button type="submit">GỬI CHO CHÚNG TÔI</button>
                    </form>
               </div>
               <div class="contact-info">
                    <h2>Thông tin liên hệ</h2>
                    <p><strong>Địa chỉ:</strong> Tòa nhà FPT Polytechnic. 13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm,
                         Hà Nội, Việt Nam</p>
                    <p><strong>Điện thoại:</strong> 0974.484.937</p>
                    <p><strong>Thời gian làm việc:</strong></p>
                    <ul>
                         <li>Thứ 2 đến thứ 6: 8h30 đến 18h</li>
                         <li>Thứ 7: 8h30 đến 12h00</li>
                    </ul>
                    <p><strong>Email:</strong> niviho@gmail.com</p>
               </div>
          </div>
          <br><br>
     </div>
          </div>
     </div>
</body>

</html>