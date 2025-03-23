<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khuyến Mãi NIVIHO</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
    <style>
        .promo-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .promo-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #fafafa;
        }

        .promo-details {
            flex: 3;
        }

        .promo-code {
            flex: 1;
            text-align: center;
        }

        .promo-code span {
            font-size: 18px;
            font-weight: bold;
            color: #ff5722;
            background-color: #ffebea;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }

        .copy-btn {
            flex: 1;
            background-color: #ff5722;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .copy-btn:hover {
            background-color: #ff3d00;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="promo-container">

                <h2>Khuyến Mãi Hấp Dẫn Tại NIVIHO</h2>
                <?php foreach ($km as $index => $listkm): ?>
                    <div class="promo-item">
                        <div class="promo-details">
                            <p><strong><?= $listkm['gia_tri'] ?></strong></p>
                            <p><?= $listkm['ngay_ket_thuc'] ?></p>
                        </div>
                        <div class="promo-code">
                            <span id="code-<?= $index ?>"><?= $listkm['ten_khuyen_mai'] ?></span>
                        </div>
                        <button class="copy-btn" onclick="copyCode('code-<?= $index ?>')">Sao chép</button>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php require_once 'footer.php'; ?>
        </div>

    </div>


    <script>
        function copyCode(elementId) {
            // Lấy mã khuyến mãi từ phần tử
            const code = document.getElementById(elementId).innerText;

            // Tạo một input tạm để copy nội dung
            const tempInput = document.createElement('input');
            tempInput.value = code;
            document.body.appendChild(tempInput);

            // Chọn và copy nội dung
            tempInput.select();
            document.execCommand('copy');

            // Xóa input tạm
            document.body.removeChild(tempInput);

            // Thông báo cho người dùng
            alert(`Mã ${code} đã được sao chép!`);
        }
    </script>

</body>

</html>