<?php
    require "modal/NguoiDungClass.php";
?>
<div class="row">
    <h1>Đăng Kí Tài Khoản</h1>

    <div class="col-5 bg-dark justify-content-end">
    </div>

    <!-- <span id='EmailDangKi'></span> --> 

    <div class="col-5 justify-content-end">
        <form action="controller/NguoiDungController.php?yc=themdangki" method="post" class="w-100 container"> 
            
            <div class="card-10 bg-white">
            <h2>Tài khoản: </h2>
            <hr>
                <label for="">Email:</label>
                <input type="Email" name="EmailDangKi" id="Email" class="form-control" required onchange="checkEmailDangKi()">
                    <span class="float-right" id="ShowCheckEmailDangKi"></span>
    <br>
                <label for="">Mật khẩu:</label>
                <div>
                    <input type="password" name="MatKhau" id="MatKhauDangKi" onkeyup="checkMatKhau()" class="form-control" placeholder="ấn Ctrl để hiện - đóng mật khẩu" required onkeydown="showPassDangKi(event)">
                    <span id="DoDaiMatKhauDangKi" class="float-right"></span>
                </div>
    <br>
                <label for="">Nhập lại:</label>
                <input type="password" name="NhapLai" class="form-control" id="NhapLaiDangKi" onkeyup="checkNhapLaiMatKhau()" required>
                <span id="NhapLai" class="float-right"></span>
            </div>

            <div class="card-10 bg-white">
            <h2>Thêm thông tin: </h2>
            <hr>
                <label for="">Tên hiển thị:</label>
                <input type="text" name="TenHienThi" class="form-control" required>
    <br>
                <label for="">Giới tính:</label>
                <select name="GioiTinh" id="" class="form-control w-95">
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
    <br>
                <label for="">Số điện thoại:</label>
                <input type="number" name="SoDienThoai" class="form-control" required>
    <br>
                <label for="">Địa chỉ:</label>
                <input type="text" name="DiaChi" class="form-control">
                
    <br>
                <a href="index.php?page=DangNhap" class="btn btn-dark">Đăng nhập</a>
                <input type="submit" value="Đăng kí" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

