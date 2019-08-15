
<div id="ThemTaiKhoanQuamTri" class="model-QuanTri" onclick="closeModal()">
    <form id="formThemTaiKhoanQuanTri" action="controller/QuanTriController.php?yc=them" method="post" class="b-sd-sm model-content animation" enctype="multipart/form-data">
    <span onclick="document.getElementById('ThemTaiKhoanQuamTri').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>
        <h1 class="d-flex justify-content-center">Thêm Quản Trị Viên</h1> 
        <div class="container">
            <label for="">Tên tài khoản:</label>
            <input readonly name="TenTaiKhoan" id="HienThiTen" style="font-weight:bold;width:auto; display: block;border:none;font-size: 13px;font-style: italic;float:right;">
            <input type="text"  class="form-control" required onkeyup="checkTenTaiKhoan()" id="TenTaiKhoan"> 
                <span id="ThongBao" style="float:right; border:none;font-size: 13px;font-style: italic"></span>
                
<br>        
            <label for="">Mật khẩu:</label>
            <img src="public/images/default-images/eye.png"  style="position:fixed ;margin-left: 250px; margin-top:35px" onclick="showPass()" alt="" width="20px" height="20px" >
            <input type="password" name="MatKhau" class="form-control justity-content-start" required onkeyup="checkMatKhau()" id="MatKhau">
                <span id="HienThiMatKhau" style="float:right; border:none;font-size: 13px;font-style: italic"></span>
<br>

            <label for="">Tên hiển thị:</label>
            <input type="text" name="TenHienThi" class="form-control" required onkeyup="checkTenHienThi()" id="TenHienThi">
                <span id="HienThiTenHienThi" style="float:right;display: block; border:none;font-size: 13px;font-style: italic"></span>
<br>

            <label for="">Chọn ảnh:</label>
            <input type="file" name="FileUpload" class="form-control">
<br>
        </div>
        <div class="d-flex justify-content-end">
            <input type="submit" value="Thêm" class="btn btn-success">   
            <span onclick="document.getElementById('ThemTaiKhoanQuamTri').style.display='none'" class="btn btn-danger" title="Đóng">Hủy</span>
        </div> 
       
    </form>
</div>
