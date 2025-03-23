<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIN TỨC</title>
    <style>
        .news-item {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            float: left;
        }

        .news-img {
            height: 200px;
            object-fit: cover;
        }

        .news-item a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
                <h2 class=" fw-bold text-secondary">TIN TỨC</h2>
                <!-- Hiển thị tin tức -->
                <div class="row g-4" style="justify-content: left;">
                    <?php foreach ($listTinTuc as $index => $tinTuc): ?>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="border p-3 rounded bg-light news-item">
                                <div>
                                    <p><strong>Tiêu đề bài viết:</strong> <?= $tinTuc['tieu_de_bai_viet'] ?></p>
                                    <p><strong>Ngày đăng:</strong> <?= $tinTuc['ngay_dang'] ?></p>
                                    <div class="mb-3">
                                        <?php
                                        $hinhpath = "./uploads/" . $tinTuc['hinh_anh'];
                                        if (is_file($hinhpath)) {
                                            echo "<img src='" . $hinhpath . "' class='img-fluid rounded news-img mb-2' alt='Hình ảnh bài viết'>";
                                        } else {
                                            echo "<p class='text-muted'>No photo</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <a href="?act=chi-tiet-tin-tuc&id_tin_tuc=<?= $tinTuc['id']; ?>"
                                    class="btn btn-danger w-100 mt-3 button">Xem chi tiết</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
        <?php require_once 'footer.php'; ?>
    </div>
</body>

</html>