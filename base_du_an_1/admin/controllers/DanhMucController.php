<?php


class DanhMucController {
    // Kêt nối đến file model
    public $modelDanhMuc;

    public function __construct(){
        $this->modelDanhMuc = new DanhMuc();
    }
    // Hàm hiển thị danh sách
    public function index() {
        // Lấy ra dữ liệu danh mục
        $danhMucs = $this->modelDanhMuc->getAll();
        // var_dump($danhMucs);

        require_once './views/danhmuc/list_danh_muc.php';
    }
    // Hàm hiển thị form thêm
    public function creat() {
        require_once './views/danhmuc/creat_danh_muc.php';
        deleteSessionError();
        }
    // Hàm xử lí thêm vào dữ liệu
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            
            // Validate
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            // Thêm dữ liệu
            if (empty($errors)) {
                // Thêm vào CSDL
                $this->modelDanhMuc->postData($ten_danh_muc,$trang_thai);
                unset($_SESSION['errors']);
                header('location: ?act=danh-mucs');
                // var_dump($uh);
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-them-danh-muc');
                exit();
            }
        }
    }
    // Hàm hiển thị form sửa
    public function edit() {
        // Lấy id
        $id = $_GET['danh_muc_id'];
        // Lấy thông tin chi tiết danh mục
        $danhMuc = $this->modelDanhMuc->getDetailData($id);
        require_once './views/danhmuc/edit_danh_muc.php';
        deleteSessionError();
    }
    // Hàm xử lí cập nhật dữ liệu
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            
            // Validate
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            // Sửa dữ liệu
            if (empty($errors)) {
                // Sửa vào CSDL
                $this->modelDanhMuc->updateData($id,$ten_danh_muc,$trang_thai);
                unset($_SESSION['errors']);
                header('location: ?act=danh-mucs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-danh-muc&danh_muc_id=' . $id);
                exit();
            }
        }
    }
    // Hàm xóa dữ liệu trong CSDL
    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['danh_muc_id'];
            $this->modelDanhMuc->deleteData($id);
            header('location: ?act=danh-mucs');
            exit();
        }
    }
}