<?php

class spBanChayController
{
    //kết nối đến fite model
    public $modelspBanChayController;

    public function __construct()
    {
        $this->modelspBanChayController = new spBanChay();
    }


    public function spBanChay(){
       
        $sp = $this->modelspBanChayController->topSanPhamBanChay();
        // var_dump($sp);die;
        require_once './views/home.php';
        
    }
    public function formkhuyenmai() {
        $km = $this->modelspBanChayController->listkhuyenmai();
        require_once './views/layouts/khuyenmai.php';
    }
    public function khuyenmai() {
       
        // var_dump($km);die;

        require_once '../views/layouts/khuyenmai.php';
    }

}