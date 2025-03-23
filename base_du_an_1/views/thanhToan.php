<?php require_once './views/layouts/header.php'; ?>
<?php require_once './views/layouts/menu.php'; ?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <style>
        .info-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin: 20px;
        }

        .form-container,
        .order-info {
            flex: 1;
            max-width: 48%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container h2,
        .order-info h2,
        .payment-methods h2 {
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
            font-size: 14px;
        }

        .order-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-info table th,
        .order-info table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .payment-methods label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .payment-methods input[type="radio"] {
            accent-color: #007bff;
        }

        .btn-submit-payment {
            display: inline-block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .btn-submit-payment:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .info-container {
                flex-direction: column;
            }

            .form-container,
            .order-info {
                max-width: 100%;
            }
        }

        .payment-options {
            width: 50%;
        }

        .btn-submit-payment {
            width: 50%;
        }
    </style>
</head>

<body>

    <div class="info-container">
        <!-- Thông tin người nhận -->
        <div class="form-container">
            <form action="?act=xu-ly-thanh-toan" method="POST">
                <h2>Thông tin người nhận</h2>

                <label for="ten_nguoi_nhan">Họ tên</label>
                <input type="text" name="ten_nguoi_nhan" placeholder="Tên người nhận" value="<?= $user['ho_ten'] ?>">

                <label for="email_nguoi_nhan">Email</label>
                <input type="email" name="email_nguoi_nhan" placeholder="Email" value="<?= $user['email'] ?>">

                <label for="sdt_nguoi_nhan">Số điện thoại</label>
                <input type="tel" name="sdt_nguoi_nhan" placeholder="Số điện thoại"
                    value="<?= $user['so_dien_thoai'] ?>">

                <label for="dia_chi_nguoi_nhan">Địa chỉ</label>
                <input type="text" name="dia_chi_nguoi_nhan" placeholder="Địa chỉ" value="<?= $user['dia_chi'] ?>">

                <textarea name="ghi_chu" placeholder="Ghi chú đơn hàng"></textarea>
        </div>

        <!-- Thông tin đơn hàng -->
        <div class="order-info">
            <h2>Thông tin đơn hàng</h2>
            <table>
                <thead style="background-color:#007bff;">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tong_tien = 0;
                    foreach ($chi_tiet_gio_hang as $gioHang):
                        $gia_san_pham = $gioHang['gia_khuyen_mai'] ?? $gioHang['gia_ban'];
                        $thanh_tien = $gia_san_pham * $gioHang['so_luong'];
                        $tong_tien += $thanh_tien;
                        ?>
                        <tr>
                            <td><?= $gioHang['ten_san_pham'] ?></td>
                            <td><?= $gioHang['so_luong'] ?></td>
                            <td><?= number_format($gia_san_pham, 0, ',', '.') ?>đ</td>
                            <td><?= number_format($thanh_tien, 0, ',', '.') ?>đ</td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" style="text-align: right; font-weight: bold;">Tổng tiền:</td>
                        <input type="hidden" name="tong_tien" value="<?= $tong_tien ?>">
                        <td style="font-weight: bold;"><?= number_format($tong_tien, 0, ',', '.') ?>đ</td>
                    </tr>
                </tbody>
            </table>
            <div class="payment-methods">
                <h2>Phương thức thanh toán</h2>
                <div class="payment-options">
                    <label>
                        <input type="radio" name="phuong_thuc_thanh_toan_id" value="1" checked>
                        <span>Thanh toán khi nhận hàng (COD)</span>
                    </label>
                    <br>
                </div>
                <button type="submit" class="btn-submit-payment">Đặt hàng</button>
            </div>
        </div>
    </div>

    <!-- Phương thức thanh toán -->

    </form>

</body>

</html>