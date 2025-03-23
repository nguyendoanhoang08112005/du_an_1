<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        h2 {
            color: #333;
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #ff6b6b;
            padding-bottom: 5px;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .news-item {
            width: 100%;
            max-width: 600px;
            background-color: transparent;
            border: none;
            border-radius: 0;
            overflow: hidden;
            margin: 10px;
            padding: 20px;
            box-shadow: none;
            transition: transform 0.3s ease;
        }

        .news-item:hover {
            transform: translateY(-5px);
        }

        .news-item img {
            width: 100%;
            height: auto; /* Cho phép ảnh có chiều cao tự động */
            object-fit: cover;
            margin-bottom: 15px;
        }

        .news-item p {
            margin: 15px 0;
            color: #555;
            font-size: 18px;
        }

        .news-item p strong {
            color: #333;
            font-size: 20px;
        }

        .news-item a {
            display: block;
            margin-top: 15px;
            text-align: center;
            background-color: #ff6b6b;
            color: #fff;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .news-item a:hover {
            background-color: #e74c3c;
            text-decoration: none;
        }

        /* Custom Responsive */
        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }

        .img-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>CHI TIẾT TIN TỨC</h2>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="news-item">
                <?php if ($tinTuc && $tinTuc['trang_thai'] == 'Hiển thị'): ?> <!-- Chỉ hiển thị nếu trạng thái là "Hiển thị" -->
                        <p><strong>Tiêu đề bài viết:</strong> <?= $tinTuc['tieu_de_bai_viet']; ?></p>
                        <p><strong>Ngày đăng:</strong> <?= $tinTuc['ngay_dang']; ?></p>

                        <!-- Sử dụng container flex cho ảnh -->
                        <div class="img-container">
                            <?php 
                            $hinhpath = "./uploads/" . $tinTuc['hinh_anh'];
                            if (is_file($hinhpath)) {
                                echo "<img src='" . $hinhpath . "' class='img-fluid' alt='News Image'>";
                            } else {
                                echo "no photo";
                            }
                            ?>
                        </div>

                        <p><strong>Nội Dung:</strong> <?= $tinTuc['noi_dung']; ?></p>
                        <a href="?act=tin-tuc" class="btn btn-danger btn-lg">Quay lại danh sách</a>
                    <?php else: ?>
                        <p>Không tìm thấy tin tức!</p>
                        <a href="?act=tin-tuc" class="btn btn-danger btn-lg">Quay lại danh sách</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php require_once 'footer.php'; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
