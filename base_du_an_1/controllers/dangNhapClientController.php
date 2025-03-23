<?php


class dangNhapClientController
{
    //kết nối đến fite model
    public $modelDangNhap;

    public function __construct()
    {
        $this->modelDangNhap = new DangNhapClient();
    }

    public function formdangki()
    {
        require_once './views/layouts/dangnhap,dangki/formDangKiClient.php';
        deleteSessionError();
    }

    public function dangki()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $ho_ten = $_POST['ho_ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $password = $_POST['mat_khau'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $dia_chi = $_POST['dia_chi'];
            $gioi_tinh = $_POST['gioi_tinh'];

            $avata = $_FILES['avata'] ?? null;

            $file_thumb = uploadFile($avata, './uploads/');
            // var_dump($password);die;

            $errors = [];
            // Kiểm tra email
            if (empty($email)) {
                $errors['email'] = 'Email là bắt buộc.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ. Định dạng đúng là example@gmail.com.';
            } elseif ($this->modelDangNhap->checkEmailExists($email)) {
                $errors['email'] = 'Email đã được sử dụng.';
            }

            // Kiểm tra số điện thoại
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại là bắt buộc.';
            } elseif (!preg_match('/^(?:\+84|0)[3-9]\d{8}$/', $so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không hợp lệ. Vui lòng nhập đúng định dạng (+84 hoặc 0 ở đầu, tiếp theo là 9 chữ số).';
            } elseif ($this->modelDangNhap->checkPhoneExists($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại đã được sử dụng.';
            }

            // Nếu có lỗi, dừng lại
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location: ' . BASE_URL . '?act=form-dang-ki-client');
                exit();
            }

            if (empty($password)) {
                $errors['mat_khau'] = 'Password là bắt buộc';

            }

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Name la bat buoc';
            }

            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Dia chi la bat buoc';
            }

            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'ngay sinh la bat buoc';
            }


            // Lỗi lưu vào session
            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $chuc_vu_id = 'Người dùng';
                $trang_thai = 'Hoạt động';

                $this->modelDangNhap->checkdangki($ho_ten, $email, $so_dien_thoai, $ngay_sinh, $dia_chi, $password, $chuc_vu_id, $trang_thai, $file_thumb, $gioi_tinh);
                // var_dump($user);die;
                // unset($_SESSION['errors']);
                // $_SESSION['user_client'] = $user['email']['mat_khau'];

                header('Location:' . BASE_URL . '?act=form-dang-nhap-client');

                exit();
            } else {

                // var_dump($_SESSION['error']); die();


                $_SESSION['flash'] = true;

                header('Location:' . BASE_URL . '?act=form-dang-ki-client');
                exit();
            }

        }
    }

    public function formdangnhap()
    {
        require_once './views/layouts/dangnhap,dangki/formDangNhapClient.php';
        deleteSessionError();
    }

    public function dangnhapclient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($password); die;

            // Xử lí kiểm tra thông tin đăng nhập
            //check rong 

            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Email là bắt buộc';

            }
            if (empty($password)) {
                $errors['password'] = 'Password là bắt buộc';

            }

            if (empty($errors)) {
                $user = $this->modelDangNhap->checkLoginClient($email, $password);
                // require_once './chiTietTaiKhoanClientController.php';
                // var_dump($user);die;
                // unset($_SESSION['errors']);
                // header('Location:' . BASE_URL . '?act=/');
                // exit();
            } else {
                // Lỗi lưu vào session
                $_SESSION['errors'] = $errors;
                // var_dump($errors);die;
                header('Location:' . BASE_URL . '?act=form-dang-nhap-client');
                exit();
            }
            if (is_array($user) && $user['email'] === $email) {
                // $ho_ten = $user['ho_ten'];
                // var_dump($email); die();
                $_SESSION['user_client'] = $user;
                $_SESSION['flash_message'] = 'Xin chào: ' .$user['ho_ten'];
                header('Location:' . BASE_URL . '?act=/');
                // require_once './views/layouts/dangnhap,dangki/formDangNhapClient.php';
                exit();
            } else {
                // Lỗi lưu vào session
                $_SESSION['errors'] = $user;
                // var_dump($_SESSION['error']); die();

                $_SESSION['flash'] = true;

                header('Location:' . BASE_URL . '?act=form-dang-nhap-client');
                exit();
            }

        }
    }

    public function ChiTietTaiKhoanClient()
    {
        // Kiểm tra xem thông tin người dùng có trong session không
        if (isset($_SESSION['user_client'])) {
            // Lấy thông tin người dùng từ session
            $user = $_SESSION['user_client'];
            $id = $user['id'];
            // var_dump($user);die;
            $userUpdated = $this->modelDangNhap->showclient($id);

            // Cập nhật lại session với dữ liệu mới nhất
            $_SESSION['user_client'] = $userUpdated;
            // $this->modelDangNhap->showclient($id);
            // Truyền thông tin vào view
            require_once './views/layouts/chiTietTaiKhoan/formChiTietTaiKhoanClient.php';
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
            header('Location:' . BASE_URL . '?act=form-dang-nhap-client');
            exit();
        }
    }

    public function formSuaTaiKhoanClient()
    {
        $user = $_SESSION['user_client'];
        $id = $user['id'];
        require_once './views/layouts/chiTietTaiKhoan/formSuaThongTin.php';
    }


    public function suaTaiKhoanClient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'];

            $anhOld = $this->modelDangNhap->getDetailAnh($id);
            $old_file = $anhOld['anh_dai_dien']; // lấy ảnh cũ để phục vụ cho sửa ảnh
            // var_dump($id);die;

            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $avata = $_FILES['avata'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $mat_khau = $_POST['mat_khau'];

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên là bắt buộc';

            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại là bắt buộc.';
            } elseif (!preg_match('/^(?:\+84|0)[3-9]\d{8}$/', $so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không hợp lệ. Vui lòng nhập đúng định dạng (+84 hoặc 0 ở đầu, tiếp theo là 9 chữ số).';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ là bắt buộc';

            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh là bắt buộc';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giưới tính là bắt buộc';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu là bắt buộc';
            }


            $_SESSION['errors'] = $errors;


            // logic sửa ảnh 
            if (isset($avata) && $avata['error'] == UPLOAD_ERR_OK) {
                // upload ảnh mới lên
                $new_file = uploadFile($avata, './uploads/');

                if (!empty($old_file)) {   // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }


            if (empty($errors)) {
                // Lưu thông tin người dùng đã cập nhật thành công
                $user = $this->modelDangNhap->checkSua($id, $ho_ten, $email, $so_dien_thoai, $dia_chi, $ngay_sinh, $gioi_tinh, $mat_khau, $new_file);
                $_SESSION['sua'] = $user;

                $_SESSION['flash_message'] = 'Cập nhật thông tin thành công!';
                header('location: ?act=chi-tiet-tai-khoan-client');
                exit();
            } else {
                $_SESSION['flash_message'] = 'Có lỗi xảy ra, vui lòng kiểm tra lại!';
                header('location: ?act=form-sua-tai-khoan-client');
                exit();
            }

        }
    }

    public function logoutclient()
    {

        // var_dump($_SESSION['user_admin']);die;
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);

            // session_destroy();
            $_SESSION['flash_message'] = 'Đăng xuất thành công!';
            header('location:' . BASE_URL . '?act=home');

        } else {
            header('location:' . BASE_URL . '?act=/');

        }


    }


}