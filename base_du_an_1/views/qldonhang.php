<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí đơn hàng cá nhân</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        thead {
            background-color: #81888e;
            color: #ffffff;
            text-align: center;
        }

        th,
        td {
            padding: 16px 20px;
        }

        tbody tr {
            border-bottom: 1px solid #e9ecef;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background-color: #dee2e6;
            transform: scale(1.01);
            transition: 0.3s ease-in-out;
        }

        td {
            color: #495057;
        }

        .action-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #007bff;
            color: white;
        }

        .edit-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);

        }

        a.action-btn.delete-btn {
            display: inline-block;
            padding: 8px 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }

        a.action-btn.delete-btn:hover {
            background-color: #b21f2d;
            transform: scale(1.05);
        }

        a.action-btn.delete-btn:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php require_once 'layouts/header.php'; ?>
        <?php require_once 'layouts/menu.php'; ?>
        <div class="row">
            <div>
                <h2>Lịch sử mua hàng</h2>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donHangs as $donHang): ?>
                            <tr>
                                <th><?= $donHang['ma_don_hang'] ?></th>
                                <td><?= $donHang['ngay_dat'] ?></td>
                                <td><?= $donHang['tong_tien'] ?></td>
                                <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                <td>
                                    <a href="?act=chi-tiet-mua-hang&id=<?= $donHang['id'] ?>"><button class="action-btn edit-btn">Xem chi tiết</button></a>
                                    <?php if ($donHang['trang_thai_id'] == 1): ?>
                                        <a href="?act=huy-don-hang&id=<?= $donHang['id'] ?>"
                                            class="action-btn delete-btn"
                                            onclick="return confirm('Bạn chắc chứ ?')">Hủy</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <?php require_once 'layouts/footer.php'; ?>
    </div>
</body>

</html>