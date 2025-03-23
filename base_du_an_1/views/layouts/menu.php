<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="logo">
                    <a href="?act=home"><img src="https://i.imgur.com/4miGZT6.png" alt=""></a>
                </div>
            </div>
            <div class="col-6" style="margin-left: 20px;">
                <ul class="nav-list">
                    <li><a href="?act=home">Trang Chủ</a></li>
                    <li><a href="?act=form-khuyen-mai">Khuyến Mãi</a></li>
                    <li class="dropdown">
                        <a href="#">Sản Phẩm <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Điện Thoại</a></li>
                            <li><a href="#">Phụ Kiện</a></li>
                            <li><a href="#">Laptop</a></li>
                        </ul>
                    </li>
                    <li><a href="?act=tin-tuc">Tin Tức</a></li>
                    <li><a href="?act=contact_page">Liên Hệ</a></li>
                </ul>
            </div>
            <div class="col">
                <div class="icon">
                    <div class="search-bar">
                        <form action="?act=search" method="post" class="d-flex justify-content-center">
                            <input type="search" class="form-control form-control-sm" placeholder="Tìm kiếm sản phẩm..."
                                name="search">
                            <button type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div id="searchResults"></div>
                    <div id="productList"></div>
                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a style="color: black;" class="fa-solid fa-user"></a>

                        </button>
                        <div class="dropdown-menu dropdown-menu-end" >
                            <?php if (isset($_SESSION['user_client'])): ?>
                                <!-- Khi đã đăng nhập -->
                                <a class="dropdown-item" href='?act=chi-tiet-tai-khoan-client'>
                                    <i class="mdi mdi-account text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle" data-key="t-account">Chi tiết tài khoản</span>
                                </a>
                                <a class="dropdown-item" href='?act=lich-su-mua-hang'>
                                    <i class="mdi mdi-shopping text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle" data-key="t-orders">Đơn mua</span>
                                </a>
                                <a class="dropdown-item" href='?act=log-out-client'>
                                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle" data-key="t-logout">Logout</span>
                                </a>
                            <?php else: ?>
                                <!-- Khi chưa đăng nhập -->
                                <a class="dropdown-item" href='?act=form-dang-nhap-client'>
                                    <i class="mdi mdi-login text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle" data-key="t-login">Login</span>
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>
                    <a href="?act=gio-hang" class="icon"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>


    </div>

</body>

</html>