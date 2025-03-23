<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container" action="?act=home">
        <?php require_once 'layouts/header.php'; ?>
        <?php require_once 'layouts/menu.php'; ?>

        <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($listBanner as $index => $Banner): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <img src="<?= BASE_URL . $Banner['hinh_anh'] ?>" class="d-block w-100"
                                alt="Slide <?= $index + 1 ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="row">
            <h2 style="margin-left: 70px; padding: 20px;">DANH MỤC SẢN PHẨM</h2>
            <div class="slide">
                <div class="slide-items">
                    <?php foreach ($listDanhMuc as $index => $danhMuc): ?>
                        <div class="col-3" style="width: 23.6%;">
                            <div class="card">
                                <img src="https://theme.hstatic.net/200000690725/1001078549/14/home_category_2_img.jpg?v=561"
                                    alt="Danh mục sản phẩm">
                                <div class="card-content">
                                    <a href="?act=san-phamDM&danh_muc_id=<?= $danhMuc['id'] ?>">
                                        <h3><?= $danhMuc['ten_danh_muc'] ?></h3>
                                    </a>
                                    <a href="?act=san-phamDM&danh_muc_id=<?= $danhMuc['id'] ?>" class="arrow-btn"><i
                                            class="fa-solid fa-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Các nút điều hướng -->
                <button class="prev"><i class="fa-solid fa-angle-left"></i></button>
                <button class="next"><i class="fa-solid fa-angle-right"></i></button>
            </div>
        </div>
        <br> <br>
        <div class="container">
            <div class="row">
                <div style="background-color: #f2e8e8; height: 540px; text-align: center;">
                    <h2 style="padding: 25px;">SẢN PHẨM BÁN CHẠY</h2>
                    <div class="slide2">
                        <button class="prev2"><i class="fa-solid fa-angle-left"></i></button>
                        <div class="slide-items2">
                            <?php foreach ($listspBanChay as $spBanChay): ?>
                                <div class="col-2" style="width: 162px;">
                                    <div class="card2">
                                        <img src="<?= $spBanChay['hinh_anh'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="?act=chi-tiet-sp&san_pham_id=<?= $spBanChay['id'] ?>">
                                                <p class="card-text"><?= $spBanChay['ten_san_pham'] ?></p>
                                            </a>
                                            <span class="price"><?= $spBanChay['gia_khuyen_mai'] ?>đ</span>
                                            <span class="price-del"><?= $spBanChay['gia_ban'] ?>đ</span><br><br>
                                            <a href="?act=chi-tiet-sp&san_pham_id=<?= $spBanChay['id'] ?>">
                                                <button class="add-to-cart-btn">
                                                    <i class="fa-solid fa-eye"></i> Xem chi tiết
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="next2"><i class="fa-solid fa-angle-right"></i></button>
                    </div>
                    <div>
                        <a href="" class="hover-button" style="margin-top: 20px; text-decoration: none;">
                            XEM TẤT CẢ SẢN PHẨM GIÁ TỐT
                        </a>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="list-policy-row row" style="margin-top: -20px;">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12 policy-item">
                        <div class="policy-item__inner">
                            <div class="policy-item__icon">
                                <div class="icon">
                                    <img class=" ls-is-cached lazyloaded"
                                        data-src="//theme.hstatic.net/200000690725/1001078549/14/home_policy_icon_1.png?v=592"
                                        src="//theme.hstatic.net/200000690725/1001078549/14/home_policy_icon_1.png?v=592"
                                        alt="Miễn phí vận chuyển">
                                </div>
                            </div>
                            <div class="policy-item__info">
                                <h3 class="info-title">Miễn phí vận chuyển</h3>
                                <div class="infor-des">Áp dụng cho mọi đơn hàng từ 500k</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12 policy-item">
                        <div class="policy-item__inner">
                            <div class="policy-item__icon">
                                <div class="icon">
                                    <img class=" ls-is-cached lazyloaded"
                                        data-src="//theme.hstatic.net/200000690725/1001078549/14/home_policy_icon_2.png?v=592"
                                        src="//theme.hstatic.net/200000690725/1001078549/14/home_policy_icon_2.png?v=592"
                                        alt="Đổi hàng dễ dàng">
                                </div>
                            </div>
                            <div class="policy-item__info">
                                <h3 class="info-title">Đổi hàng dễ dàng</h3>
                                <div class="infor-des">7 ngày đổi hàng vì bất kì lí do gì </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12 policy-item">
                        <div class="policy-item__inner">
                            <div class="policy-item__icon">
                                <div class="icon">
                                    <img class=" ls-is-cached lazyloaded"
                                        data-src="//theme.hstatic.net/200000690725/1001078549/14/home_policy_icon_3.png?v=592"
                                        src="//theme.hstatic.net/200000690725/1001078549/14/home_policy_icon_3.png?v=592"
                                        alt="Hỗ trợ nhanh chóng">
                                </div>
                            </div>
                            <div class="policy-item__info">
                                <h3 class="info-title">Hỗ trợ nhanh chóng</h3>
                                <div class="infor-des">HOTLINE 24/7 : 0964942121
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12 policy-item">
                        <div class="policy-item__inner">
                            <div class="policy-item__icon">
                                <div class="icon">
                                    <img class=" ls-is-cached lazyloaded"
                                        data-src="//theme.hstatic.net/200000690725/1001078549/14/home_policy_icon_4.png?v=592"
                                        src="//theme.hstatic.net/200000690725/1001078549/14/home_policy_icon_4.png?v=592"
                                        alt="Thanh toán đa dạng">
                                </div>
                            </div>
                            <div class="policy-item__info">
                                <h3 class="info-title">Thanh toán đa dạng</h3>
                                <div class="infor-des">Thanh toán khi nhận hàng, Napas, Visa, Chuyển Khoản
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'layouts/footer.php'; ?>
    </div>
    </div>
    </div>


    <script>
        // JavaScript để điều khiển carousel
        const slide = document.querySelector('.slide-items');
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');
        const totalItems = Math.min(3, document.querySelectorAll('.card').length); // Giới hạn tối đa 
        let currentIndex = 0;

        function updateslide() {
            // Di chuyển carousel theo chỉ số hiện tại
            const offset = -currentIndex * 268; // 320px là chiều rộng mỗi card cộng với khoảng cách
            slide.style.transform = `translateX(${offset}px)`;
        }

        // Next button click
        nextButton.addEventListener('click', () => {
            if (currentIndex < totalItems - 1) {
                currentIndex++;
            } else {
                currentIndex = 0; // Quay lại đầu khi hết danh mục
            }
            updateslide();
        });

        // Prev button click
        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = totalItems - 1; // Quay lại cuối khi ở đầu danh mục
            }
            updateslide();
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const slideContainer = document.querySelector(".slide-items2");
            const prevButton = document.querySelector(".prev2");
            const nextButton = document.querySelector(".next2");

            const totalProducts = slideContainer.children.length; // Tổng số sản phẩm
            const productsPerSlide = 6; // Số sản phẩm trên một slide
            let currentIndex = 0; // Vị trí bắt đầu của slide hiện tại

            // Cập nhật slide
            const productWidth = document.querySelector(".col-2").offsetWidth + 10; // Tính cả margin
            function updateSlide() {
                const offset = -(currentIndex * productWidth);
                slideContainer.style.transform = `translateX(${offset}px)`;
                slideContainer.style.transition = "transform 0.5s ease-in-out";
            }


            // Xử lý khi nhấn Previous
            prevButton.addEventListener("click", function () {
                currentIndex = (currentIndex - productsPerSlide < 0)
                    ? Math.floor((totalProducts - 1) / productsPerSlide) * productsPerSlide
                    : currentIndex - productsPerSlide;

                updateSlide();
            });




            // Xử lý khi nhấn Next
            nextButton.addEventListener("click", function () {
                currentIndex = (currentIndex + productsPerSlide >= totalProducts)
                    ? 0
                    : currentIndex + productsPerSlide;
                updateSlide();
            });
        });

    </script>
</body>


</html>