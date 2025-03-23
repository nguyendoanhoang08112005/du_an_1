<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->
<style>
    /* Tạo kiểu cho ảnh phụ */
    .product-image-thumb {
        display: inline-block;
        margin-right: 10px;
        cursor: pointer;
        border: 2px solid transparent;
        opacity: 0.7;
        transition: opacity 0.3s, border-color 0.3s;
    }
    .product-image-thumb.active,
    .product-image-thumb:hover {
        opacity: 1;
        border-color: #333;
    }
    .product-image-thumb img {
        width: 60px;
        height: 60px;
    }
</style>
<script>
    function changeMainImage(thumbnail) {
    // Lấy phần tử ảnh chính
    const mainImage = document.getElementById('mainProductImage');

    // Lấy đường dẫn ảnh của thumbnail
    const thumbnailImg = thumbnail.querySelector('img');

    // Kiểm tra xem có ảnh trong thumbnail không
    if (thumbnailImg) {
        // Thay đổi nguồn ảnh của ảnh chính
        mainImage.src = thumbnailImg.src;
    } else {
        console.error('Không tìm thấy ảnh trong thumbnail.');
    }
}

</script>
<head>

    <meta charset="utf-8" />
    <title>Chi tiết sản phẩm</title>
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
                                <h4 class="mb-sm-0">Chi tiết sản phẩm <?= $listSanPham['ten_san_pham'] ?></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active"><a href="?act=san-phams">Danh sách sản phẩm</a></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Default box -->
                    <div class="card card-solid">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-12 col-sm-6">
                                <!-- Khung ảnh chính -->
                                <div class="col-12">
                                    <img id="mainProductImage" style="width: 500px; height: 500px" src="<?= BASE_URL . $listSanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
                                </div>
                                
                                <!-- Khung ảnh thu nhỏ -->
                                <div class="col-12 product-image-thumbs">
                                    <?php foreach ($listAnhSanPham as $key => $anhSP): ?>
                                        <div class="product-image-thumb <?= $key == 0 ? 'active' : '' ?>" onmouseover="changeMainImage(this)">
                                            <img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="Thumbnail">
                                        </div>
                                    <?php endforeach ?>
                                </div> 
                            </div>

                                <div class="col-12 col-sm-5" style="margin-left: 40px;" >
                                    <h3 class="my-3">Tên sản phẩm: <?= $listSanPham['ten_san_pham'] ?></h3>
                                    <hr>
                                    <h4 class="mt-3">Giá nhập: <small><?= $listSanPham['gia_nhap'] ?></small></h4>
                                    <h4 class="mt-3">Giá bán: <small><?= $listSanPham['gia_ban'] ?></small></h4>
                                    <h4 class="mt-3">Giá khuyến mãi: <small><?= $listSanPham['gia_khuyen_mai'] ?></small></h4>
                                    <h4 class="mt-3">Số lượng: <small><?= $listSanPham['so_luong'] ?></small></h4>
                                    <h4 class="mt-3">Lượt xem: <small><?= $listSanPham['luot_xem'] ?></small></h4>
                                    <h4 class="mt-3">Ngày nhập: <small><?= $listSanPham['ngay_nhap'] ?></small></h4>
                                    <h4 class="mt-3">Danh mục: <small><?= $listSanPham['ten_danh_muc'] ?></small></h4>
                                    <h4 class="mt-3">Trạng thái: <small><?= $listSanPham['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng' ?></small></h4>
                                    <h4 class="mt-3">Mô tả: <small><?= $listSanPham['mo_ta'] ?></small></h4>
                                </div>
                            </div>
                            <br>
                            <div class="col-12">
                                <h2>Bình luận</h2>
                                <div class="">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Người bình luận</th>
                                                <th>Nội dung</th>
                                                <th>Ngày bình luận</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><a target="_blank"
                                                    href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['nguoi_dung_id'] ?>"><?= $binhLuan['ho_ten'] ?></a>
                                                </td>
                                                <td><?= $binhLuan['noi_dung'] ?></td>
                                                <td><?= $binhLuan['ngay_dang'] ?></td>
                                                <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                                                <td>
                                                <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="post">
                                                    <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                                    <input type="hidden" name="name_view" value="detail_sanpham">
                                                    <button onclick="return confirm('Bạn có muốn ẩn bình luận này không?')" class="btn btn-danger"><?=$binhLuan['trang_thai']==1 ?'Ẩn':'Hiện' ?></button>
                                                </form>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="?act=san-phams" class="btn btn-primary">Trở lại</a>
                                </div>
                    </div>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("search-options");
        const searchIcon = document.querySelector(".mdi-magnify.search-widget-icon");
        const closeIcon = document.getElementById("search-close-options");
        const rows = document.querySelectorAll("tbody tr");
        // Khi nhấn vào biểu tượng kính lúp để thực hiện tìm kiếm
        searchIcon.addEventListener("click", function() {
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
        closeIcon.addEventListener("click", function() {
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


<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</html>
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>