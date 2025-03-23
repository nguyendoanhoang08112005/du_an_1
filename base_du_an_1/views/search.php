<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .add-to-cart {
            background-color: #837f7d;
            /* Màu nền cam */
            border: none;
            /* Không viền */
            color: white;
            /* Màu chữ trắng */
            padding: 12px 20px;
            /* Khoảng cách xung quanh chữ */
            font-size: 12px;
            /* Cỡ chữ */
            font-weight: bold;
            /* Đậm chữ */
            text-align: center;
            /* Canh giữa */
            display: inline-flex;
            /* Đặt thành flexbox để căn chỉnh biểu tượng và chữ */
            align-items: center;
            /* Canh giữa biểu tượng và chữ theo chiều dọc */
            border-radius: 30px;
            /* Bo góc nút */
            cursor: pointer;
            /* Thay đổi con trỏ khi hover */
            transition: background-color 0.3s, transform 0.2s;
            /* Hiệu ứng chuyển màu nền và zoom khi hover */
        }

        .add-to-cart i {
            margin-right: 8px;
            /* Khoảng cách giữa biểu tượng và chữ */
            font-size: 18px;
            /* Kích thước biểu tượng */
        }

        .add-to-cart:hover {
            background-color: #916854;
            /* Màu nền khi hover */
            transform: scale(1.1);
            /* Phóng to nhẹ khi hover */
        }

        .add-to-cart:active {
            transform: scale(0.98);
            /* Nhấn nút khi nhấn chuột */
        }


        .price-wrapper .fa-heart {
            font-size: 1.2rem;
            /* Kích thước trái tim */
            border: 2px solid transparent;
            /* Viền trong suốt mặc định */
            border-radius: 50%;
            /* Làm viền bo tròn */
            padding: 5px;
            /* Khoảng cách giữa biểu tượng và viền */
            transition: all 0.3s ease;
            /* Thêm hiệu ứng mượt mà */
        }

        .price-wrapper .fa-heart:hover {
            color: #000;
            border: 2px solid #fff;
            /* Đổi màu khi hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php require_once 'layouts/header.php'; ?>
            <?php require_once 'layouts/menu.php'; ?>
            <div class="product-detail" style="line-height: 0.4;">
                <h2>Kết quả tìm kiếm</h2>
                <?php if (count($datasSearch) > 0): ?>
                    <div class="row" style=" display: flex;flex-wrap: wrap; gap: 20px;align-items: stretch;">
                        <?php foreach ($datasSearch as $SanPham): ?>
                            <div class="col-3" style="flex: 0 0 calc(25% - 20px); box-sizing: border-box;">
                                <div class="card" style="width: 100%; height: 100%;">
                                    <img src="<?= $SanPham['hinh_anh'] ?? '' ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text"><?= $SanPham['ten_san_pham'] ?? '' ?></p>
                                        <div class="price-wrapper"
                                            style="display: flex; align-items: center; justify-content: space-between;">
                                            <div>
                                                <span
                                                    class="price"><?= number_format($SanPham['gia_khuyen_mai'] ?? 0, 0, ',', '.') ?>đ</span>
                                                <span
                                                    class="price-del"><?= number_format($SanPham['gia_ban'] ?? 0, 0, ',', '.') ?>đ</span>
                                            </div>
                                        </div>
                                        <br><br>
                                        <a href="?act=chi-tiet-sp&san_pham_id=<?= $SanPham['id'] ?>">
                                            <button class="add-to-cart">
                                                <i class="fa-solid fa-cart-plus"></i> Thêm vào giỏ hàng
                                            </button>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>Không tìm thấy sản phẩm nào.</p>
                <?php endif; ?>
            </div>
            <?php require_once 'layouts/footer.php'; ?>

        </div>
    </div>
</body>

</html>