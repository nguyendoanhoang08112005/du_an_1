<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
</head>

<body>
    <div class="container">
        <div class="row align-items-start">
            <?php require_once 'header.php'; ?>
            <?php require_once 'menu.php'; ?>
            <div class="col-8">
                <h2>Giỏ hàng của bạn</h2>
                <br><br>
                <?php foreach ($chi_tiet_gio_hang as $gioHang): ?>
                    <div class="cart-item">
                        <img src="<?= $gioHang['hinh_anh'] ?>" class="item-image">
                        <div class="item-details">
                            <p class="item-name"><?= $gioHang['ten_san_pham'] ?></p>
                            <p class="item-price">
                                <?php if ($gioHang['gia_khuyen_mai']) { ?>

                                    <?= number_format($gioHang['gia_khuyen_mai'], 0, ',', '.') . ' đ' ?>
                                <?php } else { ?>
                                    <?= number_format($gioHang['gia_ban'], 0, ',', '.') . ' đ' ?>
                                <?php } ?>
                            </p>
                            <div class="quantity-control">
                                <label>Số lượng: </label>
                                <button type="button" class="dau"
                                    onclick="giamSoLuong(<?= $gioHang['san_pham_id'] ?>)">-</button>
                                <input readonly type="text" class="quantity" id="quantity-<?= $gioHang['san_pham_id'] ?>"
                                    name="so_luong" value="<?= $gioHang['so_luong'] ?>" min="1"
                                    data-max="<?= $max['so_luong'] ?>">
                                <button type="button" class="dau"
                                    onclick="tangSoLuong(<?= $gioHang['san_pham_id'] ?>)">+</button>
                            </div>
                        </div>

                        <form action="?act=xoa-gio-hang" method="POST" onsubmit="return confirm('Bạn có đồng ý không')">
                            <input type="hidden" name="chi_tiet_id" value="<?= $gioHang['id'] ?>">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>

                    </div>

                <?php endforeach; ?>



                <div class="note-section">
                    <h3>Ghi chú đơn hàng</h3>
                    <textarea class="note-input" placeholder="Nhập ghi chú cho đơn hàng của bạn..."></textarea>
                </div>

            </div>

            <div class="col-4">
                <div class="bo" style="border: 1px solid #e2e2e2;padding: 5px 10px 15px;">
                    <div class="order-summary">
                        <h4>Thông tin đơn hàng</h4>
                        <p class="total-price">Tổng tiền: <span>
                                <?php
                                $tongtien = 0; // Khởi tạo tổng tiền
                                foreach ($chi_tiet_gio_hang as $gioHang) {
                                    if ($gioHang['gia_khuyen_mai']) {
                                        $tongtien += $gioHang['gia_khuyen_mai'] * $gioHang['so_luong'];
                                    } else {
                                        $tongtien += $gioHang['gia_ban'] * $gioHang['so_luong'];
                                    }
                                }
                                echo number_format($tongtien, 0, ',', '.') . ' đ'; // Định dạng số thành tiền tệ
                                ?>
                            </span></p>
                        <p class="note">Phí vận chuyển sẽ được tính ở trang thanh toán.<br>Bạn cũng có thể nhập mã giảm
                            giá
                            ở
                            trang thanh toán.</p>
                        <?php if ($tongtien > 0): ?>
                            <p class="note">Phí vận chuyển sẽ được tính ở trang thanh toán.<br>Bạn cũng có thể nhập mã giảm
                                giá ở trang thanh toán.</p>
                            <a href="?act=thanh-toan">
                                <button class="checkout-btn">THANH TOÁN</button>
                            </a>
                        <?php else: ?>
                            <p class="note" style="color: red; font-weight: bold;font-size: 17px">Bạn chưa thêm sản phẩm nào vào giỏ hàng.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="policy">
                    <h4>Chính sách mua hàng:</h4>
                    <p>Hiện chúng tôi chỉ áp dụng thanh toán với đơn hàng có giá trị tối thiểu 0₫ trở lên.</p>
                </div>
                <div class="promo-section">
                    <h3>Khuyến mãi dành cho bạn</h3>
                    <ul class="promo-list">
                        <li>Giảm 10% khi mua từ 2 sản phẩm trở lên.</li>
                        <li>Miễn phí vận chuyển cho đơn hàng trên 500,000₫.</li>
                        <li>Tặng quà cho đơn hàng trên 1,000,000₫.</li>
                    </ul>
                </div>
            </div>

        </div>
        <?php require_once 'footer.php'; ?>
    </div>
</body>
<style>
    /* Phần ghi chú */
    .note-section {
        margin-top: 20px;
        padding: 10px;
        background-color: #dadcde;
        border: 1px solid #d2d2d2;
        border-radius: 8px;
    }

    .note-section h3 {
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
        font-weight: bold;
    }

    .note-input {
        width: 100%;
        min-height: 100px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
        resize: vertical;
        /* Cho phép kéo chiều cao */
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .note-input:focus {
        border-color: #d2d2d2;
        /* Màu viền khi nhấn vào */
        box-shadow: 0 0 5px rgba(255, 165, 0, 0.5);
        outline: none;
    }

    .promo-section {
        margin-top: 20px;
        padding: 10px;
        background-color: #f0f8ff;
        border: 1px solid #d4e2f1;
        border-radius: 8px;
    }

    .promo-section h3 {
        margin: 0 0 10px;
        font-size: 18px;
        color: #333;
    }

    .promo-list {
        margin: 0;
        padding: 0 20px;
        list-style-type: disc;
        color: #555;
    }

    .promo-list li {
        margin-bottom: 5px;
    }

    .progress-bar {
        height: 8px;
        background-color: #f0f0f0;
        border-radius: 4px;
        margin-top: 8px;
        overflow: hidden;
    }

    .progress {
        width: 20%;
        height: 100%;
        background-color: #ffc107;
    }

    .cart-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
        border-bottom: 1px solid #e2e0e0;
        padding-bottom: 20px;
        justify-content: center;
    }

    .item-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-right: 20px;
        border: 1px solid #f0f0f0;
        border-radius: 4px;
    }

    .item-details {
        flex: 0.8;
    }

    .item-name {
        font-size: 16px;
        font-weight: bold;
        margin: 0 0 5px;
    }

    .item-info {
        font-size: 14px;
        color: #666;
        margin: 0 0 10px;
    }

    .item-price {
        font-size: 16px;
        color: #333;
        font-weight: bold;
        margin: 0 0 10px;
    }

    .item-quantity {
        display: flex;
        align-items: center;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        margin-top: 10px;
        gap: 5px;
        /* Khoảng cách giữa các phần tử */
    }

    .quantity-control label {
        font-size: 16px;
        font-weight: bold;
        margin-right: 10px;
        color: #333;
    }

    .dau {
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        padding: 5px 10px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
    }

    .dau:hover {
        background-color: #ddd;
    }

    .quantity {
        width: 50px;
        /* Độ rộng của ô nhập */
        text-align: center;
        font-size: 16px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        outline: none;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .quantity:focus {
        border-color: #ff7b54;
        box-shadow: 0 0 5px rgba(255, 123, 84, 0.5);
    }

    .order-note textarea {
        width: 100%;
        height: 80px;
        margin-top: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .order-summary {
        margin-top: 20px;
    }

    .total-price span {
        font-size: 18px;
        color: red;
        font-weight: bold;
        float: right;
        padding: 0 10px;
    }

    .note {
        font-size: 12px;
        color: #666;
    }

    .checkout-btn {
        width: 100%;
        background-color: #ff0000;
        color: #fff;
        padding: 10px 0;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
    }

    .checkout-btn:hover {
        background-color: #e60000;
    }

    .policy {
        background-color: #f0f8ff;
        padding: 10px;
        border-radius: 4px;
        margin-top: 20px;
        font-size: 12px;
    }
</style>
<script>
    function increaseQuantity(id) {
        const quantityInput = document.getElementById("quantity-" + id);
        const maxQuantityFromData = parseInt(quantityInput.getAttribute("data-max"), 10);
        const maxLimit = 20;
        const maxQuantity = Math.min(maxQuantityFromData, maxLimit);

        if (parseInt(quantityInput.value) < maxQuantity) {
            quantityInput.value = parseInt(quantityInput.value) + 1;
        } else {
            alert(`số lượng được đặt tối đa là ${maxQuantity}!`);
        }
    }

    function decreaseQuantity(id) {
        const quantityInput = document.getElementById("quantity-" + id);
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    }
</script>

</html>