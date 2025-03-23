<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Show người dùng | NN Shop</title>
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
                                <h4 class="mb-sm-0">Quản lí người dùng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Người dùng</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Show người dùng</h4>
                                    <div class="flex-shrink-0"> 
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="?act=show-nguoi-dung" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $nguoiDung['id']?>">
                                        <div class="row">                                              
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tên người dùng</label>
                                                        <input type="text" disabled class="form-control" placeholder="Nhập họ tên" name="ho_ten" value="<?= $nguoiDung['ho_ten'] ?? ''?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ho_ten']) ? $_SESSION['errors']['ho_ten'] : '' ?>
                                                        </span> <br>
                                                        <label for="citynameInput" class="form-label">Ảnh đại diện</label>
                                                        <input type="file" disabled class="form-control" name="anh_dai_dien">
                                                        <?php 
                                                            if (isset($nguoiDung['anh_dai_dien'])) {
                                                                $hinhpath="../uploads/".$nguoiDung['anh_dai_dien'];
                                                            if (is_file($hinhpath)) {
                                                                $hinh="<img src='".$hinhpath."' height ='80'>";
                                                            }
                                                            else{
                                                                $hinh = "no photo";
                                                            }
                                                            echo $hinh;
                                                            }
                                                        ?><br> <br>
                                                        <label for="citynameInput" class="form-label">Ngày sinh</label>
                                                        <input type="date" disabled class="form-control"  name="ngay_sinh" value="<?= $nguoiDung['ngay_sinh'] ?? ''?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ngay_sinh']) ? $_SESSION['errors']['ngay_sinh'] : '' ?>
                                                        </span> <br>
                                                        <label for="citynameInput" class="form-label">Email</label>
                                                        <input type="email" disabled class="form-control" placeholder="Nhập email" name="email" value="<?= $nguoiDung['email'] ?? ''?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                                                        </span> <br>
                                                        <label for="citynameInput" class="form-label">Số điện thoại</label>
                                                        <input type="text" disabled class="form-control" placeholder="Nhập SĐT" name="so_dien_thoai" value="<?= $nguoiDung['so_dien_thoai'] ?? ''?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?>
                                                        </span> <br> 
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Giới tính</label>
                                                        <select class="form-select" name="gioi_tinh" disabled>
                                                            <option selected disabled>Chọn giới tính</option>
                                                            <option value="Nam" <?= $nguoiDung['gioi_tinh'] == 'Nam' ? 'selected' :'' ?> >Nam</option>
                                                            <option value="Nữ" <?= $nguoiDung['gioi_tinh'] == 'Nữ' ? 'selected' :'' ?>>Nữ</option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['gioi_tinh']) ? $_SESSION['errors']['gioi_tinh'] : '' ?>
                                                        </span> <br>
                                                        <label for="citynameInput" class="form-label">Trạng thái</label>
                                                        <select class="form-select" name="trang_thai" disabled>
                                                            <option selected disabled>Chọn trạng thái</option>
                                                            <option value="Hoạt động" <?= $nguoiDung['trang_thai'] == 'Hoạt động' ? 'selected' :'' ?> >Họat động</option>
                                                            <option value="Không hoạt động" <?= $nguoiDung['trang_thai'] == 'Không hoạt động' ? 'selected' :'' ?> >Không hoạt động</option>
                                                        </select>
                                                        <label for="citynameInput" class="form-label">Địa chỉ</label>
                                                        <input disabled type="text" class="form-control" placeholder="Nhập địa chỉ" name="dia_chi" value="<?= $nguoiDung['dia_chi'] ?? ''?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['dia_chi']) ? $_SESSION['errors']['dia_chi'] : '' ?>
                                                        </span> <br>
                                                        <label for="citynameInput" class="form-label">Mật khẩu</label>
                                                        <input disabled type="password" class="form-control" placeholder="Nhập mật khẩu" name="mat_khau" value="<?= $nguoiDung['mat_khau'] ?? ''?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?>
                                                        </span> <br>
                                                        <label  for="citynameInput" class="form-label">Vai trò</label>
                                                        <select class="form-select" name="chuc_vu_id" disabled>
                                                            <option selected disabled>Chọn vai trò</option>
                                                            <option value="Admin" <?= $nguoiDung['chuc_vu_id'] == 'Admin' ? 'selected' :'' ?> >Admin</option>
                                                            <option value="Người dùng" <?= $nguoiDung['chuc_vu_id'] == 'Người dùng' ? 'selected' :'' ?> >Người dùng</option>
                                                        </select>
                                                        
                                                        
                                                        
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="?act=nguoi-dungs" class="btn btn-primary">Trở lại</a>
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