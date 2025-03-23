<?php require_once 'views/layouts/header.php'; ?>
<?php require_once 'views/layouts/menu.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <style>
        /* CSS cho sidebar và nội dung */
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

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"] {
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

        .submit {
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>
</head>

<body>
    <div class="container">

        <h2>Thông tin tài khoản cá nhân</h2>
        <form action="?act=sua-thong-tin-client" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">

            </div>

            <label for="fullname">Họ và tên:</label>
            <input type="text" name="ho_ten" value="<?= $user['ho_ten'] ?? '' ?>">
            <span class="text-danger">
                <?= !empty($_SESSION['errors']['ho_ten']) ? $_SESSION['errors']['ho_ten'] : '' ?>

            </span><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= $user['email'] ?? '' ?>">
            <span class="text-danger">
                <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>

            </span><br>

            <label for="phone">Số điện thoại:</label>
            <input type="tel" name="so_dien_thoai" value="<?= $user['so_dien_thoai'] ?? '' ?>">
            <span class="text-danger">
                <?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?>

            </span><br>

            <label for="address">Địa chỉ:</label>
            <input type="text" name="dia_chi" value="<?= $user['dia_chi'] ?? '' ?>"><br><br>
            <span class="text-danger">
                <?= !empty($_SESSION['errors']['dia_chi']) ? $_SESSION['errors']['dia_chi'] : '' ?>

            </span><br>

            <label for="address">Avata</label>
            <input type="file" name="avata" value="<?= $user['anh_dai_dien'] ?? '' ?>"><br><br>

            <label for="dob">Ngày sinh:</label>
            <input type="date" name="ngay_sinh" value="<?= $user['ngay_sinh'] ?? '' ?>">
            <span class="text-danger">
                <?= !empty($_SESSION['errors']['ngay_sinh']) ? $_SESSION['errors']['ngay_sinh'] : '' ?>

            </span><br>

            <label class="form-label">Giới tính</label>
            <select class="form-control" name="gioi_tinh" >
                <option selected disabled>Chọn giới tính </option>
                <option value="Nam" <?= $user['gioi_tinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                <option value="Nữ" <?= $user['gioi_tinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
            </select>
            <span class="text-danger">
                <?= !empty($_SESSION['errors']['gioi_tinh']) ? $_SESSION['errors']['gioi_tinh'] : '' ?>

            </span><br>

            <label for="password">Mật khẩu:</label>
            <input type="text" name="mat_khau" value="<?= $user['mat_khau'] ?? '' ?>">
            <span class="text-danger">
                <?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?>

            </span><br><br>

            <div class="submit">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <br><br>
        </form>
    </div>
</body>

</html>