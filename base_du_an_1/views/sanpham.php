<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <style>
        .add-to-cart {
            background-color: #2a2929;
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
            margin-top: 30px;
        }

        .add-to-cart i {
            margin-right: 8px;
            /* Khoảng cách giữa biểu tượng và chữ */
            font-size: 18px;
            /* Kích thước biểu tượng */
        }

        .add-to-cart:hover {
            background-color: #2a2929;
            /* Màu nền khi hover */
            transform: scale(1);
            /* Phóng to nhẹ khi hover */
        }

        .add-to-cart:active {
            transform: scale(0.98);
            /* Nhấn nút khi nhấn chuột */
        }

        /* Phần phân trang */
        .pagination {
            text-align: center;
            margin-top: 20px;
            justify-content: center;
        }

        /* Liên kết phân trang */
        .pagination a {
            margin: 0 8px;
            text-decoration: none;
            color: #007bff;
            font-size: 10px;
            padding: 8px 14px;
            border: 2px solid #007bff;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        /* Khi hover vào các số trang */
        .pagination a:hover {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            transform: scale(1.1);
            /* Phóng to nhẹ khi hover */
        }

        /* Đánh dấu số trang đang được chọn */
        .pagination a.active {
            background-color: #007bff;
            color: white;
            border-color: #0056b3;
            font-weight: bold;
            /* Làm nổi bật trang hiện tại */
        }

        /* Phân trang không có số trang */
        .pagination a:disabled {
            color: #ccc;
            border-color: #ccc;
        }

        /* Tùy chỉnh cho các số trang */
        .pagination a:not(.active) {
            border-color: #ddd;
        }

        /* Điều chỉnh không gian giữa các số trang */
        .pagination {
            display: inline-flex;
            flex-wrap: wrap;
            gap: 8px;
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

        .filter {
            margin: 20px;
            font-size: 16px;
            margin-right: 60px;
        }

        .sort-select {
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }

        .filter2 {
            display: flex;
            justify-content: space-between;
            /* Căn đều hai phần tử */
            align-items: center;
            /* Canh giữa theo chiều dọc */
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 20px;
        }

        .filter {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .ss {
            font-weight: bold;
            margin-right: 10px;
            /* Khoảng cách giữa label và select */
            color: #333;
        }

        .sort-select {
            padding: 8px 12px;
            font-size: 14px;
            border: 1px solid #ececec;
            border-radius: 5px;
            background-color: #fff;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        /* Thêm hiệu ứng hover cho select */
        .sort-select:hover {
            border-color: #007bff;
            /* Đổi màu viền khi hover */
            background-color: #f4f4f4;
            /* Màu nền nhẹ khi hover */
        }
    </style>
</head>

<body>
    <?php
    // Nhóm sản phẩm theo danh mục
    $sanPhamTheoDanhMuc = [];
    foreach ($listSanPham as $SanPham) {
        $sanPhamTheoDanhMuc[$SanPham['ten_danh_muc']][] = $SanPham;
    }
    ?>
    <div class="container">
        <div class="row">
            <?php require_once 'layouts/header.php'; ?>
            <?php require_once 'layouts/menu.php'; ?>
            <div class="product-detail" style="line-height: 0.4;">
                <?php foreach ($sanPhamTheoDanhMuc as $tenDanhMuc => $sanPhams): ?>
                    <!-- Hiển thị tên danh mục -->
                    <div class="filter2">
                        <h3><?= $tenDanhMuc ?></h3>
                        <div class="filter">
                            <label class="ss" for="priceSort">Sắp xếp theo:</label>
                            <select id="priceSort" class="sort-select" onchange="sortProducts()">
                                <option value="default">Chọn sắp xếp</option>
                                <option value="price-asc">Giá: Tăng dần</option>
                                <option value="price-desc">Giá: Giảm dần</option>
                            </select>
                        </div>
                    </div>
                    <div id="productsContainer" class="row"
                        style=" display: flex;flex-wrap: wrap; gap: 20px;align-items: stretch;">
                        <?php foreach ($listSanPham as $SanPham): ?>
                            <div class="col-3 product-card" style="flex: 0 0 calc(25% - 20px); box-sizing: border-box;"
                                data-price="<?= $SanPham['gia_khuyen_mai'] ?? 0 ?>">
                                <div class="card" style="width: 100%; height: 100%;">
                                    <img src="<?= $SanPham['hinh_anh'] ?? '' ?>" class="card-img-top" alt="...">
                                    <div class="card-body" style="justify-items: center;">
                                        <a href="?act=chi-tiet-sp&san_pham_id=<?= $SanPham['id'] ?>"
                                            style="text-decoration: none;color: black;">
                                            <p class="card-text" style="padding: 20px;"><?= $SanPham['ten_san_pham'] ?? '' ?></p>
                                        </a>
                                        <div class="price-wrapper"
                                            style="display: flex; align-items: center; justify-content: space-between;">
                                            <div>
                                                <span
                                                    class="price"><?= number_format($SanPham['gia_khuyen_mai'] ?? 0, 0, ',', '.') ?>đ</span>
                                                <span
                                                    class="price-del"><?= number_format($SanPham['gia_ban'] ?? 0, 0, ',', '.') ?>đ</span>
                                            </div>
                                        </div>

                                        <!-- <input type="hidden" name="san_pham_id" value="<?= $SanPham['id']; ?>"> -->
                                         <a href="?act=chi-tiet-sp&san_pham_id=<?= $SanPham['id'] ?>">
                                             <button class="add-to-cart">
                                             <i class="fa-solid fa-eye"></i> </i> Xem chi tiết
                                             </button>
                                         </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?act=san-phamDM&danh_muc_id=<?= $_GET['danh_muc_id'] ?>&page=<?= $i ?>"
                        class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>

            <?php require_once 'layouts/footer.php'; ?>

        </div>
    </div>

    <script>
        let quantity = 1;

        function increaseQuantity() {
            quantity++;
            updateQuantity();
        }

        function decreaseQuantity() {
            if (quantity > 1) {
                quantity--;
            }
            updateQuantity();
        }

        function updateQuantity() {
            document.getElementById('quantity').textContent = quantity;
        }
    </script>
    <script>
        let originalProducts = []; // Mảng lưu trữ sản phẩm gốc

        function sortProducts() {
            var sortValue = document.getElementById('priceSort').value;
            var productsContainer = document.getElementById('productsContainer'); // Thẻ chứa các sản phẩm
            var products = Array.from(productsContainer.getElementsByClassName('product-card')); // Danh sách các sản phẩm

            // Nếu chưa có dữ liệu gốc, lưu lại sản phẩm gốc
            if (originalProducts.length === 0) {
                originalProducts = [...products]; // Lưu mảng sản phẩm gốc
            }

            // Sắp xếp hoặc khôi phục sản phẩm
            if (sortValue === 'price-asc') {
                products.sort(function (a, b) {
                    var priceA = parseFloat(a.getAttribute('data-price').replace(/[^\d.-]/g, ''));
                    var priceB = parseFloat(b.getAttribute('data-price').replace(/[^\d.-]/g, ''));
                    return priceA - priceB;
                });
            } else if (sortValue === 'price-desc') {
                products.sort(function (a, b) {
                    var priceA = parseFloat(a.getAttribute('data-price').replace(/[^\d.-]/g, ''));
                    var priceB = parseFloat(b.getAttribute('data-price').replace(/[^\d.-]/g, ''));
                    return priceB - priceA;
                });
            } else if (sortValue === 'default') {
                products = [...originalProducts]; // Khôi phục lại sản phẩm gốc khi chọn 'default'
            }

            // Đưa các sản phẩm đã được sắp xếp lại vào container mà không làm mất form
            productsContainer.innerHTML = ''; // Xóa nội dung cũ
            products.forEach(function (product) {
                productsContainer.appendChild(product); // Thêm sản phẩm đã sắp xếp lại
            });
        }



    </script>
</body>

</html>