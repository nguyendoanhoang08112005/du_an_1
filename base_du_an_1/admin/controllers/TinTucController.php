<?php

class TinTucController {
    // Kêt nối đến file model
    public $modelTinTuc;

    public function __construct(){
        $this->modelTinTuc = new TinTuc();
    }
    // Hàm hiển thị danh sách
    public function index() {
        // Lấy ra dữ liệu danh mục
        $tinTucs = $this->modelTinTuc->getAll();
        // var_dump($TinTucs);

        require_once './views/tintuc/list_tin_tuc.php';
    }
    // Hàm hiển thị form thêm
    public function creat() {
        require_once './views/tintuc/creat_tin_tuc.php';
        deleteSessionError();
    }
    // Hàm xử lí thêm vào dữ liệu
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieu_de_bai_viet = $_POST['tieu_de_bai_viet'];
            $ngay_dang =$_POST['ngay_dang'];
            $trang_thai = $_POST['trang_thai'];
            $hinh_anh = $_FILES['hinh_anh']['name'];
            $target_dir = "../uploads/";
            $target_file = $target_dir.basename($_FILES["hinh_anh"]["name"]);
            if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)) {
                # code...
            }
            $noi_dung = $_POST['noi_dung'];
            
            // Validate
            $errors = [];
            if (empty($tieu_de_bai_viet)) {
                $errors['tieu_de_bai_viet'] = 'Tiêu đề là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Tiêu đề là bắt buộc';
            }
            if (empty($hinh_anh)) {
                $errors['hinh_anh'] = 'Hình ảnh là bắt buộc';
            }
            // Thêm dữ liệu
            if (empty($errors)) {
                // Thêm vào CSDL
                $this->modelTinTuc->postData($tieu_de_bai_viet,$ngay_dang,$trang_thai,$hinh_anh,$noi_dung);
                unset($_SESSION['errors']);
                header('location: ?act=tin-tucs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-them-tin-tuc');
                exit();
            }
        }
    }
    // Hàm hiển thị form sửa
    public function edit() {
        // Lấy id
        $id = $_GET['tin_tuc_id'];
        // Lấy thông tin chi tiết danh mục
        $tinTuc = $this->modelTinTuc->getDetailData($id);
        require_once './views/tintuc/edit_tin_tuc.php';
        deleteSessionError();
    }
    public function show() {
        // Lấy id
        $id = $_GET['tin_tuc_id'];
        // Lấy thông tin chi tiết danh mục
        $tinTuc = $this->modelTinTuc->getDetailData($id);
        require_once './views/tintuc/show_tin_tuc.php';
    }
    // Hàm xử lí cập nhật dữ liệu
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $tieu_de_bai_viet = $_POST['tieu_de_bai_viet'];
            $ngay_dang =$_POST['ngay_dang'];
            $trang_thai = $_POST['trang_thai'];

            $hinh_anh = $_FILES['hinh_anh']['name'];
            $target_dir = "../uploads/";
            $target_file = $target_dir.basename($_FILES["hinh_anh"]["name"]);
            if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)) {
                # code...
            }

            $noi_dung = $_POST['noi_dung'];
            
            // Validate
            $errors = [];
            if (empty($tieu_de_bai_viet)) {
                $errors['tieu_de_bai_viet'] = 'Tiêu đề là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung là bắt buộc';
            }
            if (empty($errors)) {
                $tt=$this->modelTinTuc->updateData($id,$tieu_de_bai_viet,$ngay_dang,$trang_thai,$hinh_anh,$noi_dung);
                unset($_SESSION['errors']);
                header('location: ?act=tin-tucs');
                exit();
                // var_dump($user);
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-tin-tuc&tin_tuc_id=' . $id);
                exit();
            }
        }
    }
    // Hàm xóa dữ liệu trong CSDL
    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['tin_tuc_id'];
            $this->modelTinTuc->deleteData($id);
            header('location: ?act=tin-tucs');
            exit();
        }
    }
}