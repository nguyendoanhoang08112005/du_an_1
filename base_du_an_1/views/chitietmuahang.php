<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Đơn Hàng</title>
</head>

<body>
    <div class="container">
        <?php require_once 'layouts/header.php'; ?>
        <?php require_once 'layouts/menu.php'; ?>
        <div class="row" style=" display: flex;flex-wrap: wrap;align-items: stretch;">
        <h2>Thông Tin Đơn Hàng</h2>
            <div class="col-lg-7">
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-danger">
                            <tr class="text-center">
                                <th colspan="5">Thông Tin Sản Phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            <?php foreach ($chiTietDonHang as $item): ?>
                                <tr class="text-center">
                                    <td>
                                        <img class="img fluid" src="<?= $item['hinh_anh'] ?>" alt="" width="80px">
                                
                                    </td>
                                    <td><?= $item['ten_san_pham'] ?></td>
                                    <td><?= number_format($item['don_gia'], 0, ',', '.') . ' đ' ?></td>
                                    <td><?= $item['so_luong'] ?></td>
                                    <td><?= number_format($item['thanh_tien'], 0, ',', '.') . ' đ' ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-danger">
                            <tr class="text-center">
                                <th colspan="2">Thông Tin Đơn Hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Mã đơn hàng:</strong></td>
                                <td><?= $donHang['ma_don_hang'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Người nhận:</strong></td>
                                <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td><?= $donHang['email_nguoi_nhan'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Số điện thoại:</strong></td>
                                <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Địa chỉ:</strong></td>
                                <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Ngày đặt:</strong></td>
                                <td><?= $donHang['ngay_dat'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Ghi chú:</strong></td>
                                <td><?= $donHang['ghi_chu'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tổng tiền:</strong></td>
                                <td><?= number_format($donHang['tong_tien'], 0, ',', '.') . ' đ' ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        <?php require_once 'layouts/footer.php'; ?>
    </div>
</body>

</html>