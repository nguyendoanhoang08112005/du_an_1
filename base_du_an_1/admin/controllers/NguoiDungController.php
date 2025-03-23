<?php

class NguoiDungController {
    // Kêt nối đến file model
    public $modelNguoiDung;

    public function __construct(){
        $this->modelNguoiDung = new NguoiDung();
    }
    // Hàm hiển thị danh sách
    public function index() {
        // Lấy ra dữ liệu danh mục
        $nguoiDungs = $this->modelNguoiDung->getAll();
        // var_dump($NguoiDungs);

        require_once './views/nguoidung/list_nguoi_dung.php';
    }
    // Hàm hiển thị form thêm
    public function creat() {
        require_once './views/nguoidung/creat_nguoi_dung.php';
        deleteSessionError();
    }
    // Hàm xử lí thêm vào dữ liệu
    // Hàm hiển thị form sửa
    public function edit() {
        // Lấy id
        $id = $_GET['nguoi_dung_id'];
        // Lấy thông tin chi tiết danh mục
        $nguoiDung = $this->modelNguoiDung->getDetailData($id);
        require_once './views/nguoidung/edit_nguoi_dung.php';
        deleteSessionError();
    }
    public function show() {
        // Lấy id
        $id = $_GET['nguoi_dung_id'];
        // Lấy thông tin chi tiết danh mục
        $nguoiDung = $this->modelNguoiDung->getDetailData($id);
        require_once './views/nguoidung/show_nguoi_dung.php';
    }
    // Hàm xử lí cập nhật dữ liệu
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $trang_thai = $_POST['trang_thai'];
            $chuc_vu_id = $_POST['chuc_vu_id'];
            // Validate
            $errors = [];
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            if (empty($chuc_vu_id)) {
                $errors['vai-tro'] = 'Vai trò là bắt buộc';
            }
            if (empty($errors)) {
                $this->modelNguoiDung->updateData($id,$trang_thai,$chuc_vu_id);
                unset($_SESSION['errors']);
                header('location: ?act=nguoi-dungs');
                exit();
                // var_dump($user);
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-nguoi-dung&nguoi_dung_id=' . $id);
                exit();
            }
        }
    }
    // Hàm xóa dữ liệu trong CSDL
    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['nguoi_dung_id'];
            $this->modelNguoiDung->deleteData($id);
            header('location: ?act=nguoi-dungs');
            exit();
        }
    }
}