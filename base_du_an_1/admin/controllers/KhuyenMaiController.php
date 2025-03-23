<?php

class KhuyenMaiController {
    // Kêt nối đến file model
    public $modelKhuyenMai;

    public function __construct(){
        $this->modelKhuyenMai = new KhuyenMai();
    }
    // Hàm hiển thị danh sách
    public function index() {
        // Lấy ra dữ liệu danh mục
        $khuyenMais = $this->modelKhuyenMai->getAll();
        // var_dump($k);

        require_once './views/khuyenmai/list_khuyen_mai.php';
    }
    // Hàm hiển thị form thêm
    public function creat() {
        require_once './views/khuyenmai/creat_khuyen_mai.php';
        deleteSessionError();
    }
    // Hàm xử lí thêm vào dữ liệu
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $gia_tri =$_POST['gia_tri'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];
            
            // Validate
            $errors = [];
            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Tên khuyến mãi là bắt buộc';
            }
            if (empty($gia_tri)) {
                $errors['gia_tri'] = 'Giá trị là bắt buộc';
            }
            if (empty($ngay_bat_dau)) {
                $errors['ngay_bat_dau'] = 'Ngày bắt đầu là bắt buộc';
            }
            if (empty($ngay_ket_thuc)) {
                $errors['ngay_ket_thuc'] = 'Ngày kết thúc là bắt buộc';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            // Thêm dữ liệu
            if (empty($errors)) {
                // Thêm vào CSDL
                $this->modelKhuyenMai->postData($ten_khuyen_mai,$gia_tri,$ngay_bat_dau,$ngay_ket_thuc,$mo_ta,$trang_thai);
                unset($_SESSION['errors']);
                header('location: ?act=khuyen-mais');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-them-khuyen-mai');
                exit();
            }
        }
    }
    // Hàm hiển thị form sửa
    public function edit() {
        // Lấy id
        $id = $_GET['khuyen_mai_id'];
        // Lấy thông tin chi tiết danh mục
        $khuyenMai = $this->modelKhuyenMai->getDetailData($id);
        require_once './views/khuyenmai/edit_khuyen_mai.php';
        deleteSessionError();
    }
    public function show() {
        // Lấy id
        $id = $_GET['khuyen_mai_id'];
        // Lấy thông tin chi tiết danh mục
        $khuyenMai = $this->modelKhuyenMai->getDetailData($id);
        require_once './views/khuyenmai/show_khuyen_mai.php';
    }
    // Hàm xử lí cập nhật dữ liệu
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            $id = $_POST['id'];
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $gia_tri =$_POST['gia_tri'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];
            
            // Validate
            $errors = [];
            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Tên khuyến mãi là bắt buộc';
            }
            if (empty($gia_tri)) {
                $errors['gia_tri'] = 'Giá trị là bắt buộc';
            }
            if (empty($ngay_bat_dau)) {
                $errors['ngay_bat_dau'] = 'Ngày bắt đầu là bắt buộc';
            }
            if (empty($ngay_ket_thuc)) {
                $errors['ngay_ket_thuc'] = 'Ngày kết thúc là bắt buộc';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            if (empty($errors)) {
                $this->modelKhuyenMai->updateData($id,$ten_khuyen_mai,$gia_tri,$ngay_bat_dau,$ngay_ket_thuc,$mo_ta,$trang_thai);
                unset($_SESSION['errors']);
                header('location: ?act=khuyen-mais');
                exit();
                // var_dump($user);
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-khuyen-mai&khuyen_mai_id=' . $id);
                exit();
            }
        }
    }
    // Hàm xóa dữ liệu trong CSDL
    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['khuyen_mai_id'];
            $this->modelKhuyenMai->deleteData($id);
            header('location: ?act=khuyen-mais');
            exit();
        }
    }
}