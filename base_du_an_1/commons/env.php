<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'   , 'http://localhost/DUAN1/base_du_an_1/');
define('BASE_URL_ADMIN'   , 'http://localhost/DUAN1/base_du_an_1/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_NAME'    , 'xuong_du_an1');  // Tên database
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

define('PATH_ROOT'    , __DIR__ . '/../');
