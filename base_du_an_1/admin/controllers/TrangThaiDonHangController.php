<?php

class TrangThaiDonHangController {
    // Kêt nối đến file model
    public $modelTrangThaiDonHang;

    public function __construct(){
        $this->modelTrangThaiDonHang = new TrangThaiDonHang();
    }
    // Hàm hiển thị danh sách
    public function index() {
        // Lấy ra dữ liệu danh mục
        $trangThaiDonHangs = $this->modelTrangThaiDonHang->getAll();
        // var_dump($TrangThaiDonHangs);

        require_once './views/trangthaidonhang/list_trang_thai_don_hang.php';
    }
    // Hàm hiển thị form thêm
    public function creat() {
        require_once './views/trangthaidonhang/creat_trang_thai_don_hang.php';
        deleteSessionError();
    }
    // Hàm xử lí thêm vào dữ liệu
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_trang_thai = $_POST['ten_trang_thai'];
            
            // Validate
            $errors = [];
            if (empty($ten_trang_thai)) {
                $errors['ten_trang_thai'] = 'Trạng thái là bắt buộc';
            }
            // Thêm dữ liệu
            if (empty($errors)) {
                // Thêm vào CSDL
                $this->modelTrangThaiDonHang->postData($ten_trang_thai);
                unset($_SESSION['errors']);
                header('location: ?act=trang-thai-don-hangs');
                // var_dump($uh);
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-them-trang-thai-don-hang');
                exit();
            }
        }
    }
    // Hàm hiển thị form sửa
    public function edit() {
        // Lấy id
        $id = $_GET['trang_thai_id'];
        // Lấy thông tin chi tiết danh mục
        $trangThaiDonHang = $this->modelTrangThaiDonHang->getDetailData($id);
        require_once './views/trangthaidonhang/edit_trang_thai_don_hang.php';
        deleteSessionError();
    }
    // Hàm xử lí cập nhật dữ liệu
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_trang_thai = $_POST['ten_trang_thai'];
            
            // Validate
            $errors = [];
            if (empty($ten_trang_thai)) {
                $errors['ten_trang_thai'] = 'Tên trạng thái là bắt buộc';
            }
            // Sửa dữ liệu
            if (empty($errors)) {
                // Sửa vào CSDL
                $this->modelTrangThaiDonHang->updateData($id,$ten_trang_thai);
                unset($_SESSION['errors']);
                header('location: ?act=trang-thai-don-hangs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-trang-thai-don-hang&trang_thai_id=' . $id);
                exit();
            }
        }
    }
    // Hàm xóa dữ liệu trong CSDL
    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['trang_thai_id'];
            $this->modelTrangThaiDonHang->deleteData($id);
            header('location: ?act=trang-thai-don-hangs');
            exit();
        }
    }
}