<?php require_once 'views/layouts/header.php'; ?>
<?php require_once 'views/layouts/menu.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <style>
        .sidebar {
            width: 200px;
            padding: 20px;
            background-color: #f9f9f9;
            border-right: 1px solid #ddd;
            height: calc(100vh - 50px);
            position: fixed;
            top: 50px;
            left: 0;
            /* display: flex; */
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            text-decoration: none;
            font-weight: bold;
            color: #333;
            padding: 10px;
            display: block;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #74ebd5;
            color: #ffffff;
        }

        .container {
            margin-left: 240px;
            margin-top: 60px;
            width: 80%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="tel"],
        form input[type="date"] {
            width: 100%;
            padding: 12px 15px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        .logo {
            width: 200px;
        }

        .avata {
            width: 100%;
            height: 150px;
            /* background-color: red; */
        }

        .img img {
            width: 180px;
            height: 120px;
            /* border-radius: 90px; */
            /* padding: 0 500px; */

        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="avata">
            <div class="img">
                <img src=" uploads/<?php $user['anh_dai_dien'] ?>" alt="avata">
            </div>
        </div>
        <div>
            <ul>
                <li><a href="?act=form-sua-tai-khoan-client">Sửa thông tin cá nhân</a></li>
                <li><a href="#">Đăng xuất</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h2>Thông tin tài khoản cá nhân</h2>
        <form>
            <label for="fullname">Họ và tên:</label>
            <input disabled type="text" name="ho_ten" value="<?= $user['ho_ten'] ?? '' ?>">

            <label for="email">Email:</label>
            <input disabled type="email" name="email" value="<?= $user['email'] ?? '' ?>">

            <label for="phone">Số điện thoại:</label>
            <input disabled type="tel" name="so_dien_thoai" value="<?= $user['so_dien_thoai'] ?? '' ?>">

            <label for="address">Địa chỉ:</label>
            <input disabled type="text" name="dia_chi" value="<?= $user['dia_chi'] ?? '' ?>">

            <label for="dob">Ngày sinh:</label>
            <input disabled type="date" name="ngay_sinh" value="<?= $user['ngay_sinh'] ?? '' ?>">

            <label for="gender">Giới tính:</label>
            <input disabled type="text" name="gioi_tinh" value="<?= $user['gioi_tinh'] ?? '' ?>">


        </form>
    </div>
</body>

</html>