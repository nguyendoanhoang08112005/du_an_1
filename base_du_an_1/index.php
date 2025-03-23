<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/ContactController.php';
require_once './controllers/dangNhapClientController.php';
require_once './controllers/spBanChayController.php';
require_once './controllers/TinTucController.php';
require_once './controllers/SanPhamController.php';


// Require toàn bộ file Models
require_once './models/DanhMuc.php';
require_once './models/Banner.php';
require_once './models/ContactModel.php';
require_once './models/dangNhapClient.php';
require_once './models/spBanChay.php';
require_once './models/TinTuc.php';
require_once './models/BinhLuan.php';
require_once './models/SanPham.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController())->index(),


    'home' => (new HomeController())->index(),


    //Tin tức
    'tin-tuc' => (new TinTucController())->index(),
    'chi-tiet-tin-tuc' => (new TinTucController())->detailTinTuc(),

    //Liên hệ
    'contact_page' => (new ContactController())->index(),
    'contact_submit' => (new ContactController())->submit(),
    //dang nhap dang ki client

    'form-dang-ki-client' => (new dangNhapClientController())->formdangki(),
    'check-dang-ki-client' => (new dangNhapClientController())->dangki(),
    'form-dang-nhap-client' => (new dangNhapClientController())->formdangnhap(),
    'check-dang-nhap-client' => (new dangNhapClientController())->dangnhapclient(),
    'log-out-client' => (new dangNhapClientController())->logoutclient(),

    // chi tiet tai khoan 
    // 'chi-tiet-tai-khoan-client'  => (new chiTiettaiKhoanClientController())->ChiTietTaiKhoanClient(),
    'chi-tiet-tai-khoan-client' => (new dangNhapClientController())->ChiTietTaiKhoanClient(),
    'form-sua-tai-khoan-client' => (new dangNhapClientController())->formSuaTaiKhoanClient(),
    'sua-thong-tin-client' => (new dangNhapClientController())->suaTaiKhoanClient(),

    // Khuyến mãi
    'form-khuyen-mai' => (new spBanChayController())->formkhuyenmai(),

    // Sản phẩm theo danh mục
    'san-phamDM' => (new SanPhamController())->show(),
    'search' => (new SanPhamController())->search(),
    // Chi tiết sản phẩm
    'chi-tiet-sp' => (new SanPhamController())->chiTietSp(),
    'them-binh-luan' => (new SanPhamController())->themBinhLuan(),
    // gio hang 
    'them-gio-hang' => (new SanPhamController())->addGioHang(),
    'gio-hang' => (new SanPhamController())->gioHang(),
    'xoa-gio-hang' => (new SanPhamController())->xoaGioHang(),
    //thanh toan 
    'thanh-toan' => (new SanPhamController())->thanhToan(),
    'xu-ly-thanh-toan' => (new SanPhamController())->xuLyThanhToan(),
    // Quản lí đơn hàng cá nhân
    'lich-su-mua-hang' => (new SanPhamController())->lichSuMuaHang(),
    'chi-tiet-mua-hang' => (new SanPhamController())->chiTietMuaHang(),
    'huy-don-hang' => (new SanPhamController())->huyDonhang(),

};