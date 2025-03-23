<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>NN Shop</title>
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
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản Lý Đơn hàng</h4>


                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Đơn hàng</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">


                                    <h3 class="card-title">Sửa thông tin đơn hàng: <?= $donHang['ma_don_hang'] ?></h3>
                                </div>

                                <form action="<?= '?act=sua-don-hang' ?>" method="POST" enctype="multipart/form-data">
                                    <input type="text" name="id_don_hang" value="<?= $donHang['id'] ?>" hidden>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tên người nhận</label>
                                            <input readonly type="text" class="form-control" name="ten_nguoi_nhan"
                                                value="<?= $donHang['ten_nguoi_nhan'] ?>"
                                                placeholder="Nhập tên danh mục">
                                            <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                                                <p class="text-danger"><?= $errors['ten_nguoi_nhan'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input readonly type="text" class="form-control" name="sdt_nguoi_nhan"
                                                value="<?= $donHang['sdt_nguoi_nhan'] ?>"
                                                placeholder="Nhập tên danh mục">
                                            <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                                                <p class="text-danger"><?= $errors['sdt_nguoi_nhan'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input readonly type="text" class="form-control" name="email_nguoi_nhan"
                                                value="<?= $donHang['email_nguoi_nhan'] ?>"
                                                placeholder="Nhập tên danh mục">
                                            <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                                                <p class="text-danger"><?= $errors['email_nguoi_nhan'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input readonly type="text" class="form-control" name="dia_chi_nguoi_nhan"
                                                value="<?= $donHang['dia_chi_nguoi_nhan'] ?>"
                                                placeholder="Nhập tên danh mục">
                                            <?php if (isset($errors['dia_chi_nguoi_nhan'])) { ?>
                                                <p class="text-danger"><?= $errors['dia_chi_nguoi_nhan'] ?></p>
                                            <?php } ?>
                                        </div>


                                        <div class="form-group">
                                            <label>Ghi chú</label>
                                            <textarea readonly name="ghi_chu" id="" class="form-control"
                                                placeholder="Nhập mô tả"><?= $donHang['ghi_chu'] ?></textarea>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="inoutStatus">Trạng thái đơn hàng</label>
                                            <select id="inoutStatus" name="trang_thai_id"
                                                class="form-control custom-select">
                                                <?php foreach ($listTrangThaiDonHang as $trangThai): ?>
                                                    <option <?=
                                                        ($donHang['trang_thai_id'] > $trangThai['id'])
                                                        || ($donHang['trang_thai_id'] == 5 ||$donHang['trang_thai_id'] == 6 || $donHang['trang_thai_id'] == 7) && ($trangThai['id'] != $donHang['trang_thai_id'])
                                                        ? 'disabled'
                                                        : ''
                                                        ?>
                                                        <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?>
                                                        value="<?= $trangThai['id'] ?>">
                                                        <?= $trangThai['ten_trang_thai'] ?>
                                                    </option>

                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

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
                            </script> © © Velzon.
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
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
            data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>