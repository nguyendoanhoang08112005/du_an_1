<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title> NN Shop</title>
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
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
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
                        <div class="col">
        
                            <div class="h-100">
                                
                               <!-- Striped Rows -->
                               <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Đơn hàng</h4>

                                </div><!-- end card header -->
                                <form class="pri-add-circle-line align-middle me-1" style="display: flex;
                                                                        align-items: center;
                                                                        justify-content: flex-start;
                                                                        ">
                                        <input type="text" style="margin-left: 17px; font-size: 15px;width: 300px;margin-right: 10px;border-radius: 8px;"
                                            id="search-options" placeholder="Tìm kiếm sản phẩm..."
                                            onkeyup="searchProducts()" autocomplete="off" class="">
                                        <span class="mdi mdi-magnify search-widget-icon" style="display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        width: 35px; /* Chiều rộng hình vuông */
                                        height: 30px; /* Chiều cao hình vuông */
                                        background-color:#405189; /* Màu nền xanh */
                                        border-radius: 5px; /* Bo góc nếu cần */
                                        color: white; /* Màu icon */
                                        font-size: 20px; /* Kích thước icon */
                                        cursor: pointer; /* Thêm con trỏ chuột */"></span>
                                        <span
                                            class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                            id="search-close-options"
                                            style="margin-left: 10px; font-size: 25px;cursor: pointer; /* Thêm con trỏ chuột */"></span>
                                    </form>
                                    <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Trạng thái thanh toán</th>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($listDonHang as $key => $donHang) : ?>
                                            <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $donHang['ma_don_hang'] ?></td>
                                            <td><?= $donHang['ngay_dat'] ?></td>
                                            <td><?= $donHang['ten_phuong_thuc'] ?></td>
                                            <td><?= $donHang['thanh_toan'] ?></td>
                                            <td><?= $donHang['ten_trang_thai'] ?></td>
                                            <!-- <td><span class="badge text-gb-primary"></span></td> -->
                                            <td>
                                                <div class="hstack gap-3 flex-wrap">
                                              
                                                <a href="?act=chi-tiet-don-hang&id_don_hang=<?= $donHang['id'] ?>;"><i class="ri-eye-fill"></i></a>
                                                <a href="?act=form-sua-don-hang&id_don_hang=<?= $donHang['id'] ?>;" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                               
                                                </div>
                                            </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end card -->

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
                            </script> ©  © Velzon.
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById("search-options");
            const searchIcon = document.querySelector(".mdi-magnify.search-widget-icon");
            const closeIcon = document.getElementById("search-close-options");
            const rows = document.querySelectorAll("tbody tr");
            // Khi nhấn vào biểu tượng kính lúp để thực hiện tìm kiếm
            searchIcon.addEventListener("click", function () {
                const query = searchInput.value.toLowerCase().trim(); // Lấy giá trị nhập vào trong ô tìm kiếm
                if (query === "") {
                    return; // Nếu ô tìm kiếm trống, không làm gì cả
                }
                rows.forEach(row => {
                    const name = row.querySelector("td:nth-child(2)").innerText.toLowerCase(); // Lấy tên người dùng từ cột thứ 2
                    const email = row.querySelector("td:nth-child(3)").innerText.toLowerCase(); // Lấy email người dùng từ cột thứ 3

                    // Kiểm tra nếu tìm kiếm có chứa từ khóa trong tên hoặc email
                    if (name.includes(query) || email.includes(query)) {
                        row.style.display = ""; // Hiển thị người dùng nếu tên hoặc email chứa từ khóa
                    } else {
                        row.style.display = "none"; // Ẩn người dùng nếu không khớp với từ khóa
                    }
                });
                // Hiển thị biểu tượng đóng khi có kết quả tìm kiếm
                closeIcon.classList.remove("d-none");
            });

            // Khi nhấn vào biểu tượng đóng
            closeIcon.addEventListener("click", function () {
                rows.forEach(row => {
                    row.style.display = ""; // Hiển thị tất cả người dùng
                });

                // Ẩn biểu tượng đóng
                closeIcon.classList.add("d-none");

                // Xóa giá trị trong ô tìm kiếm
                searchInput.value = "";
            });
        });
    </script>
</body>

</html>