<?php

class HomeController
{
    public $modelDanhMuc;
    public $modelBanner;
    public $modelspBanChayController;


    public function __construct()
    {
        $this->modelDanhMuc = new DanhMuc();
        $this->modelBanner = new Banner();
        $this->modelspBanChayController = new spBanChay();

    }
    // Hàm hiển thị danh sách
    public function index()
    {
        // Lấy ra dữ liệu danh mục
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $listBanner = $this->modelBanner->getAllBanner();
        $listspBanChay = $this->modelspBanChayController->topSanPhamBanChay();
        // var_dump($listspBanChay);die;

        require_once './views/home.php';
    }

    
    // public function index(){
    //     echo "Đây là trang chủ";
    // }
}