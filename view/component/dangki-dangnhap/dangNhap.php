<?php
    require "modal/NguoiDungClass.php";
?>

<div class="col-10">
    <form action="controller/NguoiDungController.php?yc=dangNhap" method="post" class="w-100" style="padding-left:30%;padding-right:30%;margin-left:auto;margin-right:auto">    
        <div class="card-10 bg-white">
            <h1>Đăng Nhập</h1>
            <label for="" class="text-dark">Email:</label>
            <input type="text" name="Email" id="EmailDangNhap" class="form-control" required>
            
            <label for="" class="text-dark">Mật khẩu:</label>
            <div>
                <img src="public/images/default-images/eye.png"  style="position:fixed ;margin-left: 430px; margin-top:10px" onclick="showPassDangNhap()" alt="" width="20px" height="20px" >
                <input type="password" name="MatKhau" id="MatKhauDangNhap" class="form-control" required>
            </div>
            
            <div class="justify-content-center">
                <a href="index.php?page=DangKi" class="btn btn-dark">Đăng Kí</a>
                <input type="submit" value="Đăng Nhập" class="btn btn-primary">
            </div>
        
        </div>
    </form>
</div>

