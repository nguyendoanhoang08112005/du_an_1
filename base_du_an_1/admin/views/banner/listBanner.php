<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
     data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

     <meta charset="utf-8" />
     <title>danh mục Banner</title>
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
                                        <h4 class="mb-sm-0">Quản lý Banners </h4>

                                        <div class="page-title-right">
                                             <ol class="breadcrumb m-0">
                                                  <li class="breadcrumb-item"><a href="javascript: void(0);">admin</a>
                                                  </li>
                                                  <li class="breadcrumb-item active">danh mục banners</li>
                                             </ol>
                                        </div>

                                   </div>
                              </div>
                         </div>
                         <!-- end page title -->
                         <!-- <a class="Banner_link" data-widget="Banner-tieu_de" href="#" role="button">
                              <i class="fas fa-tieu_de"></i>
                         </a> -->
                         <div class="row">
                              <div class="col">

                                   <div class="h-100">
                                        <div class="card">
                                             <div class="card-header align-items-center d-flex">
                                                  <h4 class="card-title mb-0 flex-grow-1">Danh mục banners<main></main>
                                                  </h4>
                                                  <a href="?act=form-them-banner"
                                                       class="btn btn-soft-success material-shadow-none"><i
                                                            class="ri-add-circle-line align-middle me-1"></i> thêm
                                                       Banner mới </a>
                                             </div><!-- end card header -->

                                             <div class="card-body">
                                                  <!-- Tìm kiếm  -->
                                                  <!-- <form class="app-search d-none d-md-block">
                                                       <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                                                            <span class="mdi mdi-magnify search-widget-icon"></span>
                                                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                                                       </div>
                                                       <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                                            <div data-simplebar style="max-height: 320px;">
                                                                 <div class="dropdown-item bg-transparent text-wrap">
                                                                      <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
                                                                      <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">buttons <i class="mdi mdi-magnify ms-1"></i></a>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </form> -->

                                                  <div class="live-preview">
                                                       <div class="table-responsive">
                                                            <table
                                                                 class="table table-striped table-nowrap align-middle mb-0">
                                                                 <thead>
                                                                      <tr>
                                                                           <th scope="col">Stt</th>
                                                                           <th scope="col">Tiêu đề</th>
                                                                           <th scope="col">Hình ảnh </th>
                                                                           <th scope="col">Trạng thái</th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody>
                                                                      <?php foreach ($Banners as $index => $Banner): ?>
                                                                           <tr>
                                                                                <td class="fw-medium"><?= $index + 1 ?></td>
                                                                                <td><?= $Banner['tieu_de'] ?></td>
                                                                                <td><img src="<?= BASE_URL . $Banner['hinh_anh'] ?>"
                                                                                          style="width: 100px" alt="">
                                                                                          
                                                                                <td>
                                                                                     <?php if ($Banner['trang_thai'] == 1) { ?>
                                                                                          <span class="badge bg-success">hiển
                                                                                               thị</span>
                                                                                     <?php } else { ?>
                                                                                          <span class="badge bg-danger">không hiển
                                                                                               thị</span>
                                                                                     <?php } ?>
                                                                                </td>
                                                                                <td>
                                                                                     <div class="hstack gap-3 flex-wrap">
                                                                                          <a href="?act=form-sua-banner&id=<?= $Banner['id'] ?>"
                                                                                               class="link-success fs-15"><i
                                                                                                    class="ri-edit-2-line"></i></a>
                                                                                          <form action="?act=xoa-banner"
                                                                                               method="POST"
                                                                                               onsubmit="return confirm('bạn có đy xóa không')">
                                                                                               <input type="hidden" name="id"
                                                                                                    value="<?= $Banner['id'] ?>">
                                                                                               <button type="submit"
                                                                                                    class="link-danger fs-15"
                                                                                                    style="border: none; background: none;">
                                                                                                    <i
                                                                                                         class="ri-delete-bin-line"></i></button>
                                                                                          </form>
                                                                                     </div>
                                                                                </td>
                                                                           </tr>
                                                                      <?php endforeach; ?>
                                                                 </tbody>
                                                            </table>
                                                       </div>
                                                  </div>

                                             </div><!-- end card-body -->
                                        </div><!-- end card -->

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
               <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
                    data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                    <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
               </div>
          </div>

          <!-- JAVASCRIPT -->
          <?php
          require_once "views/layouts/libs_js.php";
          ?>
          <!-- <script>
               $(document).ready(function() {
                    // Lắng nghe sự thay đổi trên ô input tìm kiếm
                    $("#tieu_deInput").on("keyup", function() {
                         var tieu_deTerm = $(this).val().toLowerCase(); // Lấy giá trị từ input và chuyển thành chữ thường
                         $("#itemList li").each(function() {
                              var listItem = $(this).text().toLowerCase(); // Lấy nội dung của mỗi mục trong danh sách
                              if (listItem.indexOf(tieu_deTerm) > -1) {
                                   $(this).show(); // Nếu tìm thấy từ khóa, hiển thị mục đó
                              } else {
                                   $(this).hide(); // Nếu không tìm thấy, ẩn mục đó
                              }
                         });
                    });
               });
          </script> -->
</body>

</html>