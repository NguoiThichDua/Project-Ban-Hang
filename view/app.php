<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];

        switch ($page) {
            
            case 'TrangQuanLi':
                if(isset($_SESSION["admin"])){
                    require "component/dieu-huong/leftMenu.php";
                    require "component/dieu-huong/rightMenu.php";
                }else{ 
                    header("Location: index.php?ketqua=khongcoquyen");
                }
                break;
            case 'Profile':
                require "view/nguoidung-dangnhap/index.php";
                break;
            case 'DangKi':
                # Cần phải thoát session trước khi thực hiện chức năng
                session_destroy();
                require "component/dangki-dangnhap/dangKi.php";
                break;
            case 'DangNhap':
                # Cần phải thoát session trước khi thực hiện chức năng
                session_destroy();
                require "component/dangki-dangnhap/dangNhap.php";
                break;
            case 'SuaNguoiDung':
                require "nguoidung-dangnhap/sua.php";
                break;
            case 'ThemBaiDang':
                require "nguoidung-dangnhap/thembaidang.php";
                break;
            case 'suaBaiDang':
                require "nguoidung-dangnhap/suaBaiDang.php";
                break;
            case 'viewSanPham':
                require "component/welcome/view.php";
                break;
            default:
               
                break;
        }
    }else{
        require "view/component/welcome/index.php";
    }
?>
