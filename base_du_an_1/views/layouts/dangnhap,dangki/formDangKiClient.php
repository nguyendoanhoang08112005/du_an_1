
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Đăng Ki </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="https://img3.thuthuatphanmem.vn/uploads/2019/09/30/logo-shop-quan-ao-nam_111916701.jpg" alt="" height="80px" style = "border-radius: 20px">
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center" >
                    <div class="col-md-8 col-lg-6 col-xl-5" style="width: 100%;">
                        <div class="card mt-4">

                            <div class="card-body p-8">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Đăng Ki  </p>
                                </div>
                                <div class="card">
                                <div class="card-header align-items-center d-flex" style="font-weight:bold;">
                                    <h4 class="card-title mb-0 flex-grow-1" style=" font-size:25px;">Form Đăng Kí</h4>
                                  
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="?act=check-dang-ki-client" method="POST" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Email</label>
                                                        <input type="email" class="form-control" placeholder="example@gamil.com" name="email">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="compnayNameinput" class="form-label"> Name</label>
                                                        <input type="text" class="form-control" placeholder="Nhập Tên" name="ho_ten">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ho_ten']) ? $_SESSION['errors']['ho_ten'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                              
                                               
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">SDT</label>
                                                        <input type="number" class="form-control" placeholder="035 763 8864" name="so_dien_thoai">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Password</label>
                                                        <input type="password" class="form-control"  name="mat_khau">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Avata</label>
                                                        
                                                        <input type="file" class="form-control" name="avata">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['avata']) ? $_SESSION['errors']['avata'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Ngày sinh</label>
                                                        <input type="date" class="form-control" name="ngay_sinh">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ngay_sinh']) ? $_SESSION['errors']['ngay_sinh'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Giới tính</label>
                                                        <select class="form-control" name="gioi_tinh" id="exampleFormControlSelect1">
                                                                <option selected disabled>Chọn giới tính </option>
                                                                <option value="Nam">Nam</option>
                                                                <option value="Nữ">Nữ</option>
                                                            </select>                                                                
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['gioi_tinh']) ? $_SESSION['errors']['gioi_tinh'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Địa chỉ</label>
                                                        <input type="text" class="form-control" name="dia_chi">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['dia_chi']) ? $_SESSION['errors']['dia_chi'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                               
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                    <button type="submit" class="btn btn-success">Đăng Ký</button>
                                                    <a href="?act=form-dang-nhap-client" class="btn btn-secondary">Đã có tài khoản</a>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                
                                </div>
                            </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                       

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
       
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="assets/js/pages/password-addon.init.js"></script>
</body>

</html>