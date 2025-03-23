<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .logo2 img {
        max-width: 150px;
        height: auto;
    }

    .logo2 {
        float: right;
    }

    .ten {
        float: left;
    }
</style>

<body>

    <div class="container">
        <div class="row">
            <div style="text-align:center;background-color: #f5f5f5;">
                <div class="footer">
                    <div class="footer-column">
                        <h5>Thời trang nam NIVIHO</h5>
                        <div class="khung">
                            <p class="chu">Hệ thống thời trang cho phái mạnh hàng đầu Việt Nam, hướng tới phong cách nam
                                tính, lịch
                                lãm và trẻ trung.</p> <br> <br>
                            <div class="wrapper">
                                <div class="icon-container">
                                    <i class="fa-brands fa-facebook"></i>
                                </div>
                                <div class="icon-container">
                                    <i class="fa-brands fa-twitter"></i>
                                </div>
                                <div class="icon-container">
                                    <i class="fa-brands fa-tiktok"></i>
                                </div>
                                <div class="icon-container">
                                    <i class="fa-brands fa-youtube"></i>
                                </div>
                                <div class="icon-container">
                                    <i class="fa-brands fa-instagram"></i>
                                </div>
                            </div>
                        </div>

                        <p style="font-size: 18px; font-weight: 600">Phương thức thanh toán</p>
                        <div class="con">
                            <img src="https://theme.hstatic.net/200000690725/1001078549/14/payment_1_img.png?v=592"
                                alt="">
                            <img src="https://theme.hstatic.net/200000690725/1001078549/14/payment_2_img.png?v=592"
                                alt="">
                            <img src="https://theme.hstatic.net/200000690725/1001078549/14/payment_6_img.png?v=592"
                                alt="">
                            <img src="https://theme.hstatic.net/200000834271/1001185074/14/payment_2_img.png?v=199"
                                alt="">
                        </div>
                    </div>
                    <div class="footer-column">
                        <h5>Thông tin liên hệ </h5>
                        <div class="khung2">
                            <strong>Địa chỉ:</strong>
                            <p class="chu">Tòa nhà FPT Polytechnic, 13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà
                                Nội,
                                Việt Nam</p><br>

                            <strong>Điện thoại:</strong>
                            <p class="chu">0974.484.937</p><br>

                            <strong>Thời gian làm việc:</strong>
                            <ul class="chu">
                                <li>Thứ 2 đến thứ 6: 8h30 đến 18h</li>
                                <li>Thứ 7: 8h30 đến 12h00</li>
                            </ul>

                            <strong>Email:</strong>
                            <p class="chu">niviho@gmail.com</p>
                        </div>
                    </div>
                    <div class="footer-column">
                        <h5>Chính sách của NIVIHO</h5>
                        <div class="khung3">
                            <div class="ten" style="width: 47%;">
                                <ul>
                                    <li>Cách mua hàng</li>
                                    <li>Thông tin chung</li>
                                    <li>Thanh toán</li>
                                    <li>Giao hàng</li>
                                    <li>Chính sách đổi trả</li>
                                </ul>
                            </div>
                        </div>
                        <div class="logo2">
                            <a href="?act=home"><img src="https://i.imgur.com/XzJNNPk.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div style="height: 50px;">
                    <p>© Bản quyền thuộc về NIVIHO</p>
                </div>
            </div>
        </div>
    </div>

</body>
<style>
    .khung {
        text-align: left;
        margin-top: 20px;

    }

    .khung2 {
        text-align: left;
        line-height: 2;
        margin-top: 20px;

    }

    .khung3 {
        text-align: left;
        line-height: 2;
        /* margin-left: 30px; */
        margin-top: 20px;
        opacity: 1;
        cursor: pointer;
        /* Con trỏ chuột dạng tay khi hover */
        transition: all 0.5s ease;
        /* Tạo hiệu ứng mượt */
        font-size: 13px;
    }

    .khung3 li:hover {
        opacity: 0.5;
    }

    /* Tổng quan về footer */
    .footer {
        display: flex;
        /* Sử dụng Flexbox để chia cột */
        justify-content: space-between;
        /* Khoảng cách đều giữa các cột */
        background-color: #f5f5f5;
        /* Màu nền */
        padding: 20px;
        /* Khoảng cách trong footer */
        border-top: 1px solid #ddd;
        /* Đường viền phía trên footer */
    }

    /* Các cột */
    .footer-column {
        width: 33%;
        /* Mỗi cột chiếm 30% chiều rộng */
        min-height: 100px;
        /* Chiều cao tối thiểu */
        padding: 10px;
        /* Khoảng cách trong cột */

    }

    .wrapper {
        display: flex;
        /* Đặt các khung nằm ngang */
        gap: 10px;
        /* Khoảng cách giữa các khung */
        margin-top: -10px;
        /* Khoảng cách phía trên */
        margin-bottom: 25px;
        /* Khoảng cách phía trên */
        margin-left: 10px;
        /* Khoảng cách phía trên */
    }

    .icon-container {
        width: 40px;
        /* Kích thước khung vuông */
        height: 40px;
        /* Kích thước khung vuông */
        background-color: #f0f0f0;
        /* Màu nền của khung */
        display: flex;
        /* Kích hoạt Flexbox */
        justify-content: center;
        /* Căn giữa biểu tượng theo chiều ngang */
        align-items: center;
        /* Căn giữa biểu tượng theo chiều dọc */
        border: 1px solid #ccc;
        /* Viền của khung */
        border-radius: 5px;
        /* Góc bo nhẹ (vuông nếu là 0px) */
        transition: all 0.3s ease;
        /* Hiệu ứng chuyển đổi mượt */
    }

    .icon-container i {
        font-size: 20px;
        /* Kích thước biểu tượng */
        color: #333;
        /* Màu biểu tượng */
    }

    .icon-container:hover {
        background-color: #e0e0e0;
        /* Màu nền khi hover */
        border-color: #999;
        /* Màu viền khi hover */
        cursor: pointer;
        /* Hiệu ứng con trỏ */
        transform: scale(1.1);
        /* Phóng to nhẹ khi di chuột */
    }

    col {
        justify-content: center;
    }

    h5 {
        color: #d70808;
        font-weight: 600;
        text-align: center;
    }

    .row {
        display: flex;
        justify-content: space-between;
        justify-content: center;
    }

    .chu {
        color: #000000;
        text-decoration: none;
        font-size: 13px;
        margin-bottom: 10px;
        display: inline;
        list-style: none;

    }

    a:hover {
        text-decoration: underline;
    }

    .social-icons i {
        font-size: 1.5rem;
        margin: 0 10px;
        color: #333;
    }

    .social-icons i:hover {
        color: #007bff;
    }

    .payment-methods img {
        width: 50px;
        margin: 5px;
    }

    .con {
        display: flex;
        /* Sắp xếp các hình ảnh theo hàng ngang */
        align-items: center;
        /* Căn giữa theo chiều dọc (nếu cần) */
        gap: 5px;
        /* Khoảng cách giữa các hình ảnh */
        margin-top: 10px;
        /* Khoảng cách phía trên */
        margin-left: 10px;
    }

    .con img {
        width: 50px;
        /* Đặt kích thước cố định cho hình ảnh */
        height: auto;
        /* Giữ nguyên tỉ lệ của hình ảnh */
        transition: transform 0.3s ease;
        /* Hiệu ứng khi hover */
    }

    .con img:hover {
        transform: scale(1.1);
        /* Phóng to nhẹ khi di chuột */
    }
</style>

</html>