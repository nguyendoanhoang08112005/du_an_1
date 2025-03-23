<?php

class LienHeController {
    // Kêt nối đến file model
    public $modelLienHe;

    public function __construct(){
        $this->modelLienHe = new LienHe();
    }
    // Hàm hiển thị danh sách
    public function index() {
        // Lấy ra dữ liệu danh mục
        $lienHes = $this->modelLienHe->getAll();
        // var_dump($LienHes);

        require_once './views/lienhe/list_lien_he.php';
    }
    // Hàm hiển thị form thêm
    public function creat() {
        require_once './views/lienhe/creat_lien_he.php';
        deleteSessionError();
    }
    // Hàm xử lí thêm vào dữ liệu
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $so_dien_thoai =$_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $noi_dung = $_POST['noi_dung'];
            
            // Validate
            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Email là bắt buộc';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ là bắt buộc';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại là bắt buộc';
            }
            // Thêm dữ liệu
            if (empty($errors)) {
                // Thêm vào CSDL
                $this->modelLienHe->postData($email,$so_dien_thoai,$dia_chi,$noi_dung);
                unset($_SESSION['errors']);
                header('location: ?act=lien-hes');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-them-lien-he');
                exit();
            }
        }
    }
    // Hàm hiển thị form sửa
    public function edit() {
        // Lấy id
        $id = $_GET['lien_he_id'];
        // Lấy thông tin chi tiết danh mục
        $lienHe = $this->modelLienHe->getDetailData($id);
        require_once './views/lienhe/edit_lien_he.php';
        deleteSessionError();
    }
    // Hàm xử lí cập nhật dữ liệu
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $email = $_POST['email'];
            $so_dien_thoai =$_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $noi_dung = $_POST['noi_dung'];

            
            // Validate
            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Email là bắt buộc';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Hình ảnh là bắt buộc';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại là bắt buộc';
            }
            if (empty($errors)) {
                $this->modelLienHe->updateData($id,$email,$so_dien_thoai,$dia_chi,$noi_dung);
                unset($_SESSION['errors']);
                header('location: ?act=lien-hes');
                exit();
                // var_dump($user);
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-lien-he&lien_he_id=' . $id);
                exit();
            }
        }
    }
    // Hàm xóa dữ liệu trong CSDL
    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['lien_he_id'];
            $this->modelLienHe->deleteData($id);
            header('location: ?act=lien-hes');
            exit();
        }
    }
}