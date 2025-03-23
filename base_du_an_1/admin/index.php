<?php 

session_start();

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/NguoiDungController.php';
require_once 'controllers/TinTucController.php';
require_once 'controllers/LienHeController.php';
require_once 'controllers/KhuyenMaiController.php';
require_once 'controllers/SanPhamController.php';
require_once 'controllers/TrangThaiDonHangController.php';
require_once 'controllers/DangNhapController.php';
require_once 'controllers/BannerController.php';
require_once 'controllers/DonHangController.php';

require_once 'models/DanhMuc.php';
require_once 'models/NguoiDung.php';
require_once 'models/TinTuc.php';
require_once 'models/LienHe.php';
require_once 'models/KhuyenMai.php';
require_once 'models/SanPham.php';
require_once 'models/TrangThaiDonHang.php';
require_once 'models/DangNhap.php';
require_once 'models/Banner.php';
require_once 'models/DonHang.php';


// Require toàn bộ file Models
$act = $_GET['act'] ?? '/';
if($act !== 'login-admin' && $act!=='check-login-admin'&&$act!=='logout-admin') {
    if(!isset($_SESSION['user_admin'])) {
                header('location: ?act=login-admin');
                exit();
            }
}
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/' => (new DashboardController())->index(),


    // quản lí danh mục sản phẩm
    'danh-mucs'             => (new DanhMucController())->index(),
    'form-them-danh-muc'    => (new DanhMucController())->creat(),
    'them-danh-muc'         => (new DanhMucController())->store(),
    'form-sua-danh-muc'     => (new DanhMucController())->edit(),
    'sua-danh-muc'          => (new DanhMucController())->update(),
    'xoa-danh-muc'          => (new DanhMucController())->destroy(),
    
    
    // Quản lí người dùng
    'nguoi-dungs'             => (new NguoiDungController())->index(),
    'form-them-nguoi-dung'    => (new NguoiDungController())->creat(),
    'form-sua-nguoi-dung'     => (new NguoiDungController())->edit(),
    'sua-nguoi-dung'          => (new NguoiDungController())->update(),
    'xoa-nguoi-dung'          => (new NguoiDungController())->destroy(),
    'show-nguoi-dung'         => (new NguoiDungController())->show(),
    
    
    // Quản lí tin tức
    'tin-tucs'             => (new TinTucController())->index(),
    'form-them-tin-tuc'    => (new TinTucController())->creat(),
    'them-tin-tuc'         => (new TinTucController())->store(),
    'form-sua-tin-tuc'     => (new TinTucController())->edit(),
    'sua-tin-tuc'          => (new TinTucController())->update(),
    'xoa-tin-tuc'          => (new TinTucController())->destroy(),
    'show-tin-tuc'          => (new TinTucController())->show(),
    
    
    // Quản lí liên hệ
    'lien-hes'             => (new LienHeController())->index(),
    'form-them-lien-he'    => (new LienHeController())->creat(),
    'them-lien-he'         => (new LienHeController())->store(),
    'form-sua-lien-he'     => (new LienHeController())->edit(),
    'sua-lien-he'          => (new LienHeController())->update(),
    'xoa-lien-he'          => (new LienHeController())->destroy(),
    

    // Quản lí khuyến mãi
    'khuyen-mais'             => (new KhuyenMaiController())->index(),
    'form-them-khuyen-mai'    => (new KhuyenMaiController())->creat(),
    'them-khuyen-mai'         => (new KhuyenMaiController())->store(),
    'form-sua-khuyen-mai'     => (new KhuyenMaiController())->edit(),
    'sua-khuyen-mai'          => (new KhuyenMaiController())->update(),
    'xoa-khuyen-mai'          => (new KhuyenMaiController())->destroy(),
    'show-khuyen-mai'          => (new KhuyenMaiController())->show(),
    
    // Quản lí banner
    'banners'               => (new BannerController())->index(),
    'form-them-banner'      => (new BannerController())->create(),
    'them-banner'           => (new BannerController())->store(),
    'form-sua-banner'       => (new BannerController())->edit(),
    'sua-banner'            => (new BannerController())->update(),
    'xoa-banner'            => (new BannerController())->destroy(), 

    // quan ly san pham 
    'san-phams'              => (new SanPhamController())->listSanPham(),
    'form-them-san-pham'    => (new SanPhamController())->formaddSanPham(),
    'them-san-pham'          => (new SanPhamController())->postAddSanPham(),
    'form-sua-san-pham'      => (new SanPhamController())->formEditSanPham(),
    // 'sua-album-anh-san-pham' =>(new SanPhamController())->postEditAnhSanPham(),
    'sua-san-pham'           => (new SanPhamController())->postEditSanPham(),
    'xoa-san-pham'           => (new SanPhamController())->deleteSanPham(),
    'show-san-pham'           => (new SanPhamController())->show(),

// 'update-trang-thai-binh-luan'=> (new SanPhamController())->updateTrangThaiBinhLuan(),

    // Quản lí trạng thái đơn hàng
    'trang-thai-don-hangs'             => (new TrangThaiDonHangController())->index(),
    'form-them-trang-thai-don-hang'    => (new TrangThaiDonHangController())->creat(),
    'them-trang-thai-don-hang'         => (new TrangThaiDonHangController())->store(),
    'form-sua-trang-thai-don-hang'     => (new TrangThaiDonHangController())->edit(),
    'sua-trang-thai-don-hang'          => (new TrangThaiDonHangController())->update(),
    'xoa-trang-thai-don-hang'          => (new TrangThaiDonHangController())->destroy(),
   

    // Route quản lý đơn hàng
    'don-hangs' => (new DonHangController())->index(),
    'form-sua-don-hang' => (new DonHangController())->edit(),
    'sua-don-hang' => (new DonHangController())->update(),
    'chi-tiet-don-hang' => (new DonHangController())->detailDonHang(),

    // quan ly thong ke 
    'admin'   => (new DonHangController())->trangThaiDonHang(),
    'list-nam-don-hang'   => (new DonHangController())->listNamDonHang(),

     //rout auth
     'login-admin' => (new DangNhapController())->formlogin(),
     'check-login-admin' => (new DangNhapController())->login(),
     'log-out' => (new DangNhapController())->logout(),
};