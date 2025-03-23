<?php

class SanPhamController
{
    public $modelSanPham;
    public $modelChiTietSp;
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelChiTietSp = new SanPham();
        $this->modelBinhLuan = new BinhLuan();
    }
    // public function index()
    // {

    //     // var_dump($id);die();
    //     $listSanPham = $this->modelSanPham->getAllSanPham();
    //     require_once './views/sanpham.php';

    // }
    // Trang danh sách sản phẩm theo danh mục và phân trang
    public function show()
    {
        $id = $_GET['danh_muc_id']; // Lấy ID danh mục từ URL
        $page = isset($_GET['page']) ? $_GET['page'] : 1;  // Lấy trang hiện tại từ URL, mặc định là trang 1

        // Số sản phẩm trên mỗi trang
        $productsPerPage = 8;

        // Tính tổng số sản phẩm trong danh mục
        $totalProducts = $this->modelSanPham->getTotalProductsByCategory($id);

        // Tính tổng số trang
        $totalPages = ceil($totalProducts / $productsPerPage);

        // Tính offset cho truy vấn (dữ liệu bắt đầu từ đâu)
        $offset = ($page - 1) * $productsPerPage;

        // Lấy danh sách sản phẩm cho trang hiện tại
        $listSanPham = $this->modelSanPham->chitiet($id, $offset, $productsPerPage);

        // Truyền dữ liệu sang view
        require_once './views/sanpham.php';

    }

    // Các phương thức khác vẫn giữ nguyên...

    public function chiTietSp()
    {
        $id = $_GET['san_pham_id'];
        // var_dump($sp);die();
        $sp = $this->modelSanPham->selectChiTietSp($id);
        // var_dump($sp);die();
        $listBinhLuan = $this->modelBinhLuan->layBinhLuanTheoSanPham($id);
        // var_dump($listBinhLuan);die();

        require_once './views/binhLuanSp.php';
    }


    public function themBinhLuan()
    {
        if (!isset($_SESSION['user_client']) || empty($_SESSION['user_client'])) {
            $_SESSION['flash_message'] = "Bạn cần đăng nhập để bình luận!";
            header("Location: ?act=form-dang-nhap-client");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'];
            $nguoi_dung_id = $_SESSION['user_client']['id'];
            $noi_dung = $_POST['noi_dung'];
            $ngay_dang = date('Y-m-d');
            $trang_thai = 1;
            $errors = $this->modelBinhLuan->themBinhLuan($san_pham_id, $nguoi_dung_id, $noi_dung, $ngay_dang, $trang_thai);

            if ($errors) {
                $_SESSION['flash_message'] = "Bình luận thành công!";
            } else {
                $_SESSION['flash_message'] = "Bình luận thất bại, vui lòng thử lại!";
            }

            header("Location: ?act=chi-tiet-sp&san_pham_id=" . $san_pham_id);
            exit();
        }
    }
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])) {
            // Lấy giá trị tìm kiếm từ form
            $search = $_POST['search'];

            // Gọi phương thức tìm kiếm từ model và truyền tham số tìm kiếm
            $datasSearch = $this->modelSanPham->getAllSP($search);

            // Truyền kết quả tìm kiếm vào view để hiển thị
            require_once './views/layouts/menu.php'; // Load menu
            require_once './views/search.php'; // Gọi view hiển thị kết quả tìm kiếm
        } else {
            // Nếu không có dữ liệu tìm kiếm, hiển thị trang chủ hoặc trang lỗi
            header('Location: ?act=home'); // Chuyển hướng về trang chủ
            exit();
        }
    }
    public function formGioHang()
    {
        require_once './views/layouts/giohang.php';
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $san_pham_id = $_POST['san_pham_id'];
            // var_dump($san_pham_id);die;
            $so_luong = $_POST['so_luong'];
            // var_dump($_POST);die;

            $user = $_SESSION['user_client']['id'];
            if (isset($user)) {
                $mail = $this->modelSanPham->getNguoiDungFromEmail($user);
                // var_dump($mail["id"]);die;

                $gio_hang = $this->modelSanPham->getGioHangFromUser($mail['id']);
                if (!$gio_hang) {
                    $gio_hangId = $this->modelSanPham->addGioHang($mail['id']);
                    $gio_hang = ['id' => $gio_hangId];
                    $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);
                } else {
                    $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);

                }
                // var_dump($chi_tiet_gio_hang['id']);die;

                $checkSanPham = false;
                foreach ($chi_tiet_gio_hang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $updateSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelSanPham->updateSoLuong($gio_hang['id'], $san_pham_id, $updateSoLuong);
                        $checkSanPham = true;
                        // $chi_tiet_id = $detail['gio_hang_id'];
                        break;
                    }
                }
                // Nếu sản phẩm chưa tồn tại, thêm mới vào bảng chi tiết giỏ hàng
                if (!$checkSanPham) {
                    $this->modelSanPham->addDetailGioHang($gio_hang['id'], $san_pham_id, $so_luong);
                }
                header('Location: ?act=gio-hang');

            } else {
                header("Location: ?act=form-dang-nhap-client");
            }

        }

    }

    public function gioHang()
    {

        $user = $_SESSION['user_client']['id'];
        if (isset($user)) {
            $mail = $this->modelSanPham->getNguoiDungFromEmail($user);
            // var_dump($mail["id"]);die;

            $gio_hang = $this->modelSanPham->getGioHangFromUser($mail['id']);
            if (!$gio_hang) {
                $gio_hangId = $this->modelSanPham->addGioHang($mail['id']);
                $gio_hang = ['id' => $gio_hangId];
                $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);
            } else {
                $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);

            }
            // var_dump($chi_tiet_gio_hang);die;
            $max = $this->modelSanPham->maxsoluong();
            require_once './views/layouts/giohang.php';

        } else {
            header("Location: ?act=form-dang-nhap-client");

        }
    }

    public function xoaGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['chi_tiet_id'];
            // var_dump($id);die;
            $this->modelSanPham->xoa($id);
            header("Location: ?act=gio-hang");
        }

    }
    public function thanhToan()
    {

        $userr = $_SESSION['user_client']['id'];
        // var_dump($userr);die;
        if (isset($userr)) {
            $user = $this->modelSanPham->getNguoiDungFromEmail($userr);
            // var_dump($mail["id"]);die;

            $gio_hang = $this->modelSanPham->getGioHangFromUser($user['id']);
            if (!$gio_hang) {
                $gio_hangId = $this->modelSanPham->addGioHang($user['id']);
                $gio_hang = ['id' => $gio_hangId];
                $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);
            } else {
                $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);
            }

            require_once './views/thanhToan.php';
        } else {

            header("Location: ?act=form-dang-nhap-client");
        }
    }

    public function xuLyThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $trang_thai_id = 1;
            $thanh_toan_id = 1;
            $ngay_dat = date('Y-m-d');
            $ma_don_hang = 'DH-' . rand(1000, 9999);

            $userr = $_SESSION['user_client']['id'];
            // $user = $this->modelSanPham->getNguoiDungFromEmail($userr);
            $nguoi_dung_id = $userr;
            // var_dump($nguoi_dung_id['id']);die;
            $donHang = $this->modelSanPham->addThanhToan(
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $trang_thai_id,
                $ngay_dat,
                $ma_don_hang,
                $nguoi_dung_id,
                $thanh_toan_id
            );

            // var_dump($donHang);die;
            $gio_hang = $this->modelSanPham->getGioHangFromUser($nguoi_dung_id);
            if ($gio_hang) {
                $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);
                // var_dump($chi_tiet_gio_hang);die;

                foreach ($chi_tiet_gio_hang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_ban'];

                    $this->modelSanPham->addChiTietDonhang(
                        $donHang,
                        $item['san_pham_id'],
                        $donGia,
                        $item['so_luong'],
                        $donGia * $item['so_luong']
                    );
                }

                $this->modelSanPham->clearDetailGioHang($gio_hang['id']);

                $this->modelSanPham->clearGioHang($nguoi_dung_id);

                $_SESSION['flash_message'] = "Đặt hàng thành công! ";
                header('Location: ?act=/'); // chio tiết đơn hàng vào đây nhé

            } else {
                var_dump("loi dat hang ");
                die;
            }
        }

    }

    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $userr = $_SESSION['user_client']['id'];
            // $user = $this->modelSanPham->getNguoiDungFromEmail($userr);
            $nguoi_dung_id = $userr;

            // Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelSanPham->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            // Lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelSanPham->getPhuongThucThanhtoan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // Lấy ra danh sách tất cả dơn hàng của tài khoản
            $donHangs = $this->modelSanPham->getDonHangFromUser($nguoi_dung_id);
            // var_dump($don_hangs);die;
            require_once './views/qldonhang.php';
        } else {
            var_dump('Bạn chưa đăng nhập');
            die;
        }
    }

    public function chitietMuaHang()
    {

        if (isset($_SESSION['user_client'])) {
            $userr = $_SESSION['user_client']['id'];
            // $user = $this->modelSanPham->getNguoiDungFromEmail($userr);
            $nguoi_dung_id = $userr;
            $donHangId = $_GET['id'];
            // var_dump($donHangId);die;
            // Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelSanPham->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            // Lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelSanPham->getPhuongThucThanhtoan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
            // Lấy ra thông tin đơn hàng theo id
            $donHang = $this-> modelSanPham->getDonHangById($donHangId);
            // LẤy thông tin của sp đơn hàng
            $chiTietDonHang = $this -> modelSanPham->getChiTietDonHangByDonHangId($donHangId);
            // var_dump($donHang);
            // var_dump($chiTietDonHang);die;

            if($donHang['nguoi_dung_id'] != $nguoi_dung_id){
                echo 'Bạn không có quyền truy cập đơn hàng';
                exit;
            }
            require_once './views/chitietmuahang.php';

        } else {
            var_dump('Bạn chưa đăng nhập');
            die;
        }
    }

    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            $userr = $_SESSION['user_client']['id'];
            // $user = $this->modelSanPham->getNguoiDungFromEmail($userr);
            $nguoi_dung_id = $userr;
            $donHangId = $_GET['id'];

            $donHang = $this->modelSanPham->getDonHangById($donHangId);

            if ($donHang['nguoi_dung_id' != $nguoi_dung_id]) {
                echo "Bạn không có quyền hủy đơn hàng này";
                exit();
            }
            if ($donHang['trang_thai_id' != 1]) {
                echo "Chỉ đơn hàng ở trạng thái 'Chờ xác nhận' mới có thể hủy ";
                exit();
            }
            // Hủy đơn hàng
            $this->modelSanPham->updateTrangThaiDonhang($donHangId, 7);
            header('location: ?act=lich-su-mua-hang');
            exit;


        } else {
            var_dump('Bạn chưa đăng nhập');
            die;
        }
    }
}
