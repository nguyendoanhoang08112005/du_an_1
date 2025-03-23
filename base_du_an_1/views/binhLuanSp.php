<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
</head>
<style>
    .product-container {
        display: flex;
        gap: 20px;
        line-height: 2;
    }

    /* Left section */
    .product-left {
        flex: 1;
        text-align: center;
    }

    .product-left .product-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;

    }

    /* Right section */
    .product-right {
        flex: 2;
        padding: 0 20px;
    }

    .product-info h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .product-info p {
        font-size: 16px;
        color: #555;
        margin: 5px 0;
    }

    .product-info .in-stock {
        color: #1e201f;
        font-weight: bold;
    }

    .product-info .out-of-stock {
        color: red;
        font-weight: bold;
    }

    .product-price {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 15px 0;
    }

    .product-price .price {
        font-size: 24px;
        font-weight: bold;
        color: #ff5722;
    }

    .product-price .price-del {
        font-size: 16px;
        text-decoration: line-through;
        color: #999;
    }

    /* Quantity control */
    .quantity-control {
        display: flex;
        align-items: center;
        margin: 20px 0;
    }

    .quantity-control label {
        margin-right: 10px;
        font-size: 16px;
    }

    .quantity-control .dau {
        background-color: #e9ecef;
        color: #000;
        border: none;
        padding: 5px 15px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    .quantity-control .dau:hover {
        background-color: #d6d7d9;
    }

    .quantity-control {
        font-size: 16px;
        font-weight: bold;
        margin: 0 10px;
    }

    .quantity {
        width: 50px;
        /* Điều chỉnh chiều rộng của ô nhập */
        padding: 5px;
        /* Khoảng cách bên trong */
        font-size: 14px;
        /* Kích thước chữ */
        text-align: center;
        /* Canh giữa nội dung */
        border: 2px solid #ccc;
        /* Viền của ô nhập */
        border-radius: 5px;
        /* Bo tròn các góc */
        background-color: #f9f9f9;
        /* Màu nền nhẹ */
        color: #333;
        /* Màu chữ */
        outline: none;
        /* Tắt hiệu ứng khi focus */
        transition: border-color 0.3s ease, background-color 0.3s ease;
        /* Hiệu ứng chuyển màu */
        margin: 10px;
        text-align: center;
    }

    .quantity:focus {
        border-color: #007bff;
        /* Màu viền khi focus */
        background-color: #e9f5ff;
        /* Màu nền khi focus */
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .action-buttons button {
        width: 180px;
        padding: 10px 15px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    /* Nút "Thêm vào giỏ" */
    .action-buttons button:nth-child(1) {
        background-color: #818a94;
        /* Màu xanh dương */
    }

    .action-buttons button:nth-child(1):hover {
        background-color: #778494;
        /* Màu xanh đậm hơn khi hover */
    }

    /* Nút "Mua ngay" */
    .action-buttons button:nth-child(2) {
        background-color: #ef0b0b;
        /* Màu xanh lá */
    }

    .action-buttons button:nth-child(2):hover {
        background-color: red;
        /* Màu xanh lá */
    }

    /* Hiệu ứng khi bấm */
    .action-buttons button:active {
        transform: scale(0.95);
    }

    /* Đáp ứng cho thiết bị di động */
    @media (max-width: 600px) {
        .action-buttons {
            flex-direction: column;
        }

        .action-buttons button {
            width: 100%;
        }
    }

    .add-to-cart {
        background-color: white;
        /* Nền trắng */
        color: black;
        /* Chữ đen */
        border: 1px solid red;
        /* Viền đỏ */
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        /* Tùy chọn để làm bo góc */
        transition: background-color 0.3s, color 0.3s;
        /* Hiệu ứng chuyển đổi */
    }

    .add-to-cart:hover {
        background-color: #ff5e5e;
        /* Nền đỏ khi hover */
        color: white;
        /* Chữ trắng khi hover */
    }


    .buy-now {
        background-color: red;
        border: none;
        color: #fff;
    }

    .buy-now:hover {
        background-color: #ff5e5e;
    }

    /* Comments section */
    .comments-section {
        margin-top: 30px;
    }

    .comments-section h3 {
        font-size: 20px;
        margin-bottom: 15px;
    }

    .binh-luan {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        margin-bottom: 10px;
    }

    .comment-input {
        width: 100%;
        height: 80px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .comment-submit {
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .comment-submit:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="container">
        <?php require_once 'layouts/header.php'; ?>
        <?php require_once 'layouts/menu.php'; ?>
        <div class="row">
            <div class="product-container">
                <div class="product-left">
                    <div class="product-image">
                        <img src="<?= $sp['hinh_anh'] ?>" alt="Sản phẩm">
                    </div>
                </div>
                <div class="product-right">
                    <div class="product-info">
                        <h1><?= $sp['ten_san_pham'] ?></h1>
                        <p>Mã sản phẩm: <strong><?= $sp['id'] ?></strong></p>
                        <p>Số lượng sản phẩm: <?= $sp['so_luong'] ?></p>
                        <p>Tình trạng:
                            <?php
                            if ($sp['so_luong'] == 0) {
                                echo 'Hết hàng';
                            } else {
                                echo 'Còn hàng';
                            }
                            ?>
                        </p>
                        <div class="product-price">
                            <span class="price"><?= number_format($sp['gia_khuyen_mai'], 0, ',', '.') ?>đ</span>
                            <span class="price-del"><?= number_format($sp['gia_ban'], 0, ',', '.') ?>đ</span>
                        </div>
                        <div class="product-options">
                            <form action="?act=them-gio-hang" method="POST">
                                <div class="quantity-control">
                                    <label>Số lượng: </label>
                                    <button type="button" class="dau" onclick="decreaseQuantity()">-</button>
                                    <input readonly type="number" class="quantity" id="quantity" name="so_luong"
                                        value="0" min="0">
                                    <input type="hidden" name="san_pham_id" value="<?= $sp['id']; ?>">
                                    <button type="button" class="dau" onclick="increaseQuantity()">+</button>
                                </div>

                                <?php if ($sp['so_luong'] == 0): ?>
                                    <div class="action-buttons">
                                        <button disabled style="background-color: red; cursor: not-allowed;">Đã hết hàng
                                        </button>
                                    </div>
                                <?php else: ?>
                                    <div class="action-buttons">
                                        <button id="add-to-cart-btn" disabled>Thêm vào giỏ</button>
                                    </div>
                                <?php endif; ?>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="comments-section">
                <h3>Bình luận</h3>
                <?php if (!empty($listBinhLuan)): ?>
                    <?php foreach ($listBinhLuan as $binhLuan): ?>
                        <div class="binh-luan">
                            <p><strong>Người dùng: <?= $binhLuan['nguoi_dung_id']; ?></strong> - <?= $binhLuan['ngay_dang']; ?>
                            </p>
                            <p><?= $binhLuan['noi_dung']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Chưa có bình luận nào.</p>
                <?php endif; ?>
                <form method="POST" action="?act=them-binh-luan">
                    <input type="hidden" name="san_pham_id" value="<?= $sp['id']; ?>">
                    <textarea name="noi_dung" required placeholder="Viết bình luận..." class="comment-input"></textarea>
                    <button type="submit" class="comment-submit">Gửi bình luận</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const maxQuantity = <?= $sp['so_luong'] ?>;

        // Giảm số lượng sản phẩm
        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity > 0) {
                quantityInput.value = currentQuantity - 1;
            }
            updateButtonState();
            toggleQuantityButtons();
        }

        // Tăng số lượng sản phẩm
        function increaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity < maxQuantity) {
                quantityInput.value = currentQuantity + 1;
            } else {
                alert("Sản phẩm trong kho chỉ còn " + maxQuantity + " cái.");
            }
            updateButtonState();
            toggleQuantityButtons();
        }

        // Vô hiệu hóa các nút tăng/giảm nếu sản phẩm hết hàng hoặc số lượng là 0
        function toggleQuantityButtons() {
            var quantityInput = document.getElementById('quantity');
        }

        // Vô hiệu hóa hoặc kích hoạt nút "Thêm vào giỏ" dựa trên số lượng
        function updateButtonState() {
            var addToCartBtn = document.getElementById('add-to-cart-btn');
            var quantityInput = document.getElementById('quantity');
            addToCartBtn.disabled = parseInt(quantityInput.value) <= 0;
        }

        // Kiểm tra khi trang load để vô hiệu hóa các nút nếu số lượng = 0
        window.onload = function () {
            toggleQuantityButtons();
            updateButtonState();
        };

    </script>

</body>

</html>