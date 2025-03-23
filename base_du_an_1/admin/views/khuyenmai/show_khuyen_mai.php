<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Show khuyến mãi | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>
        
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lí khuyến mãi</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">khuyến mãi</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Show khuyến mãi</h4>
                                    <div class="flex-shrink-0"> 
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                    <form action="?act=show-khuyen-mai" method="POST">
                                        <input type="hidden" name="id" value="<?= $khuyenMai['id']?>">
                                            <div class="row">                                              
                                                <div class="col-md-12">
                                                    <div class="mb-6">
                                                        <label for="citynameInput" class="form-label">Tên khuyến mãi</label>
                                                        <input type="text" class="form-control" disabled placeholder="Nhập tên khuyến mãi" name="ten_khuyen_mai" value="<?= $khuyenMai['ten_khuyen_mai']?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ten_khuyen_mai']) ? $_SESSION['errors']['ten_khuyen_mai'] : '' ?>
                                                        </span> <br>
                                                    </div>
                                                    <div class="mb-6">
                                                        <label for="citynameInput" class="form-label">Giá trị</label>
                                                        <input type="text" disabled class="form-control" placeholder="Nhập giá trị" name="gia_tri" value="<?= $khuyenMai['gia_tri']?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['gia_tri']) ? $_SESSION['errors']['gia_tri'] : '' ?>
                                                        </span> <br>
                                                    </div>
                                                    <div class="mb-6">
                                                        <label for="citynameInput" class="form-label">Ngày bắt đầu</label>
                                                        <input type="date" disabled class="form-control" placeholder="Nhập Ngày bắt đầu" name="ngay_bat_dau" value="<?= $khuyenMai['ngay_bat_dau']?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ngay_bat_dau']) ? $_SESSION['errors']['ngay_bat_dau'] : '' ?>
                                                        </span> <br>
                                                    </div>
                                                    <div class="mb-6">
                                                        <label for="citynameInput" class="form-label">Ngày kết thúc</label>
                                                        <input type="date" disabled class="form-control" placeholder="Nhập Ngày kết thúc" name="ngay_ket_thuc" value="<?= $khuyenMai['ngay_ket_thuc']?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ngay_ket_thuc']) ? $_SESSION['errors']['ngay_ket_thuc'] : '' ?>
                                                        </span> <br>
                                                    </div>
                                                    <div class="mb-6">
                                                        <label for="citynameInput" class="form-label">Mô tả</label> <br>
                                                        <textarea name="mo_ta" disabled rows="6" cols="50" placeholder="Nhập mô tả" required><?= $khuyenMai['mo_ta']?></textarea><br><br>
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?>
                                                        </span> 
                                                    </div>
                                                    <div class="mb-6">
                                                    <label for="citynameInput" class="form-label">Trạng thái</label>
                                                        <select class="form-select" name="trang_thai" disabled>
                                                            <option selected disabled>Chọn trạng thái</option>
                                                            <option value="Còn hạn" <?= $khuyenMai['trang_thai'] == 'Còn hạn' ? 'selected' :'' ?> >Còn hạn</option>
                                                            <option value="Hết hạn" <?= $khuyenMai['trang_thai'] == 'Hết hạn' ? 'selected' :'' ?>>Hết hạn</option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['trang_thai']) ? $_SESSION['errors']['trang_thai'] : '' ?>
                                                        </span> <br>
                                                    </div>
                                                    
                                                </div>
                                                <!--end col-->
                                                
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                    <a href="?act=khuyen-mais" class="btn btn-primary">Trở lại</a>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                     
                                </div>
                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>