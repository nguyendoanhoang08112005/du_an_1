<?php
require_once 'models/TinTuc.php';

class TinTucController {
    public $modelTinTuc;

    public function __construct() {
        $this->modelTinTuc = new TinTuc();
    }

    // Danh sách tin tức
    public function index() {
        $listTinTuc = $this->modelTinTuc->getAllTinTuc();
        require_once './views/layouts/tintuc.php';
    }

    // Chi tiết tin tức
    public function detailTinTuc() {
        $id=$_GET['id_tin_tuc'];
        // var_dump($tin_tuc_id);die;
        $tinTuc = $this->modelTinTuc->getDetailTinTuc($id);
        require_once './views/layouts/detailtintuc.php';
    }
}
