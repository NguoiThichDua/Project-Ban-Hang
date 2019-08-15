<?php
    require "modal/NguoiDungClass.php";

    $email =  $_SESSION['user'];
    $NguoiDung = new NguoiDungClass();
    $user = $NguoiDung->LayMotTaiKhoanNguoiDungEmail($email);
?>
<div class="row">
    <h1>Chỉnh Sửa Tài Khoản</h1>

    <div class="col-5" style="display:block">
        
        <div class="col-10 w-100">
            <img src="<?php echo $user->DuongDanAnhBia;?>" class="bd-10" alt="Lỗi ảnh" width="100%" height="350px">
        </div>

        <div class="col-10 d-flex justify-content-start w-100">
            <img src="<?php echo $user->DuongDanAnhDaiDien;?>" class="bdr bd-150" alt="Lỗi ảnh" width="150px" height="150px" style="margin-left:35%; margin-top: -100px;">
        </div>

        
            <div class="col-10">
            <div class="card-10 bg-white">
                <form action="controller/NguoiDungController.php?yc=suanguoidungcoanh" method="post" class="container" enctype="multipart/form-data"> 
                    <input type="text" name="ID"  class="form-control" required  value="<?php echo $user->ID; ?>" style="display:none">
                    <input type="text" name="DuongDanAnhBia"  class="form-control" required  value="<?php echo $user->DuongDanAnhBia; ?>" style="display:none">
                    <input type="text" name="DuongDanAnhDaiDien"  class="form-control" required  value="<?php echo $user->DuongDanAnhDaiDien; ?>" style="display:none">
                
                
                        <label for="">Ảnh bìa: </label>
                        <input type="file" name="FileUploadSuaAnhBiaNguoiDung" class="form-control w-100">
                        
                        <label for="">Ảnh đại diện: </label>
                        <input type="file" name="FileUploadSuaAnhDaiDienNguoiDung" class="form-control w-100">

                        <input type="submit" class="btn btn-primary" value="Thay Đổi">
                </form>
            </div>
        </div>
    </div>

    <div class="col-5 justify-content-end">
        <form action="controller/NguoiDungController.php?yc=suanguoidungkhonganh" method="post" class="w-100 container"> 
            <input type="text" name="ID" id="ID" class="form-control" required  value="<?php echo $user->ID; ?>" style="display:none">
            <input type="text" name="NgayTao" id="NgayTao" class="form-control" required  value="<?php echo $user->NgayTao; ?>" style="display:none">
            <input type="text" name="KieuTaiKhoan" id="KieuTaiKhoan" class="form-control" required  value="<?php echo $user->KieuTaiKhoan; ?>" style="display:none">
           
            <div class="card-10 bg-white">
                <h2>Tài khoản:</h2>
                <hr>
                <label for="">Email:</label>
                <input type="Email" name="Email" id="Email" class="form-control" required  value="<?php echo $user->Email; ?>" readonly onclick="LoiNguoiDung('Email')">
                
    <br>
                <label for="">Mật khẩu:</label>
                <div>
            
                <input type="password" name="MatKhau" id="MatKhauDangKi" onkeyup="checkMatKhau()" onkeydown="showPassDangKi(event)" onclick="LoiNguoiDung('ShowPass')" class="form-control" required value="<?php echo $user->MatKhau; ?>" placeholder="ấn Ctrl để hiện - ẩn mật khẩu">
                    <span id="DoDaiMatKhauDangKi" class="float-right"></span>
                </div>
            
    <br>
                <label for="">Nhập lại:</label>
                <input type="password" name="NhapLai" class="form-control" id="NhapLaiDangKi" onkeyup="checkNhapLaiMatKhau()" required>
                <span id="NhapLai" class="float-right"></span>
            </div>

            <div class="card-10 bg-white">
                <h2>Thông tin tài khoản:</h2>
                <hr>
                <label for="">Tên hiển thị:</label>
                <input type="text" name="TenHienThi" class="form-control" required value="<?php echo $user->TenHienThi; ?>">


                <label for="">Giới tính:</label>

                <select name="GioiTinh" id="" class="form-control w-95">
                    <option value="0" <?php  if($user->GioiTinh == 0) echo "selected" ?>>Nam</option>
                    <option value="1" <?php  if($user->GioiTinh == 1) echo "selected" ?>>Nữ</option>
                </select>

                <label for="">Số điện thoại:</label>
                <input type="number" name="SoDienThoai" class="form-control" required value="<?php echo $user->SoDienThoai; ?>">

                <label for="">Địa chỉ:</label>
                <input type="text" name="DiaChi" class="form-control" value="<?php echo $user->DiaChi; ?>">

                <a href="index.php?page=Profile" class="btn btn-dark">Hủy</a>
                <input type="submit" value="Thay Đổi" class="btn btn-primary">
                
            </div>
        </form>
    </div>
</div>

