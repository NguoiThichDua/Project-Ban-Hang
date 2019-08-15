<?php
    if(isset($_REQUEST['quanli'])){
        $yeuCau = $_REQUEST['quanli'];

        switch ($yeuCau) {
            case 'QuanTri':
                require "view/component/quan-tri/index.php";
                break;
             case 'NguoiDung':
                require "view/component/nguoi-dung/index.php";
                break;
            case 'DanhMuc':
                require "view/component/danh-muc/index.php";
                break;
            case 'BaiDang':
                require "view/component/bai-dang/index.php";
                break;
            default:
                # code...
                break;
        }
    }
?>