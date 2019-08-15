<?php  session_start();  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <!-- CSS -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/modalTaiKhoan.css">
    <link rel="stylesheet" href="public/css/message.css">
    <link rel="stylesheet" href="public/css/leftMenu.css">
    <link rel="stylesheet" href="public/css/modalThemNguoiDung.css">
    <link rel="stylesheet" href="public/css/phanTrang.css">
    <link rel="stylesheet" href="public/css/customScrollbar.css">
   
   
</head>
<body>
    
    <div class="app">
        <!-- HEADER -->
        <div>
            <?php require "./view/inc/navbar.php"; ?>
            <?php require "./view/inc/alertThongBao.php"; ?>
        </div>
            
        <!-- BODY -->
        <div class="container mt-5">
            <?php require "./view/inc/thongBaoTong.php"; ?>
            <?php require "./view/app.php"; ?>
        </div>

        <!-- MODAL -->
        <div>
            <!-- MODAL QUẢN TRỊ -->
            <?php require "./view/component/quan-tri/modal.php"; ?>
           
            <!-- MODAL NGƯỜI DÙNG-->
            <?php require "./view/component/nguoi-dung/modal.php"; ?>

             <!-- MODAL DANH MỤC-->
             <?php require "./view/component/danh-muc/modal.php"; ?>

            <!-- MODAL SẢN PHẨM-->
            <?php require "./view/nguoidung-dangnhap/modal.php"; ?>
           
        </div>
    </divá>

   

    <!-- SCRIPT -->
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/formMultiNguoiDung.js"></script>
    <script src="public/js/navbar.js"></script>
    <script src="public/js/modalTaiKhoan.js"></script>
    <script src="public/js/checkTaiKhoanQuanTri.js"></script>
    <script src="public/js/checkTaiKhoanNguoiDung.js"></script>
    <script src="public/js/leftMenu.js"></script>
    <script src="public/js/checkDangKi-DangNhap.js"></script>
    <script src="public/js/modalDanhMuc.js"></script>
    <script src="public/js/modalSanPham.js"></script>
   
</body>
</html>