<?php
require_once 'models/Banner.php';

class BannerController
{
  public $modelBanner;

  public function __construct()
  {
    $this->modelBanner = new Banner();
  }

  public function index()
  {
    $Banners = $this->modelBanner->getAll();
    require_once './views/banner/listBanner.php';
  }

  public function create()
  {
    require_once './views/banner/createBanner.php';
  }

  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];
      $tieu_de = $_POST['tieu_de'];

      $trang_thai = $_POST['trang_thai'];

      $hinh_anh = $_FILES['hinh_anh'] ?? '';
      $file_thumb = uploadFile($hinh_anh, './uploads/');

      if (empty($tieu_de)) {
        $errors['tieu_de'] = 'Tiêu đề không được để trống';
      }
      if (empty($hinh_anh)) {
        $errors['hinh_anh'] = 'Hình ảnh không được để trống';
      }
      if (empty($trang_thai)) {
        $errors['trang_thai'] = 'Trạng thái không được để trống';
      }

      if (empty($errors)) {
        $this->modelBanner->postData($tieu_de, $file_thumb, $trang_thai);
        unset($_SESSION['errors']);
        header('Location: index.php?act=banners');
        exit();
      } else {
        $_SESSION['errors'] = $errors;
        header('Location: index.php?act=form-them-banner');
        exit();
      }
    }
  }

  public function edit()
  {
    $id = $_GET['id'];

    $Banner = $this->modelBanner->getDetaildata($id);

    require_once './views/banner/editBanner.php';
  }

  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $tieu_de = $_POST['tieu_de'];
      $SanPhamOld = $this->modelBanner->getDetailData($id);
      $old_file = $SanPhamOld['hinh_anh']; // lấy ảnh cũ để phục vụ cho sửa ảnh
      $hinh_anh = $_FILES['hinh_anh'];

      $trang_thai = $_POST['trang_thai'];

      $errors = [];
      if (empty($tieu_de)) {
        $errors['tieu_de'] = 'Tiêu đề không được để trống';
      }

      if (empty($trang_thai)) {
        $errors['trang_thai'] = 'Trạng thái không được để trống';
      }

      $_SESSION['errors'] = $errors;

      if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
        // upload ảnh mới lên
        $new_file = uploadFile($hinh_anh, './uploads/');

        if (!empty($old_file)) {   // Nếu có ảnh cũ thì xóa đi
          deleteFile($old_file);
        }
      } else {
        $new_file = $old_file;
      }
      if (empty($errors)) {
         $this->modelBanner->updateData($id, $tieu_de, $new_file, $trang_thai);
        header('location: ?act=banners');
        exit();
        // var_dump($user);
      } else {
        $_SESSION['flash'] = true;
        header('location: ?act=form-sua-banner&id=' . $id);
        exit();
      }
    }
  }


  public function destroy()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];

      //xóa danh mục
      $this->modelBanner->deleteData($id);
      header('Location: index.php?act=banners');
      exit();
    }
  }
}
