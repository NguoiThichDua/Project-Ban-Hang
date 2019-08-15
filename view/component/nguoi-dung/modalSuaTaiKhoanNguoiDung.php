
<div id="SuaTaiKhoanNguoiDung" class="model-NguoiDung" onclick="closeModal()">
    <form id="formSuaTaiKhoanNguoiDung" action="controller/NguoiDungController.php?yc=sua" method="post" class="b-sd-sm model-content animation" enctype="multipart/form-data" >
    <span onclick="document.getElementById('SuaTaiKhoanNguoiDung').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>
      
        <small  class="d-flex justify-content-center" style="margin-top:-30px">
            <img class="bd-10" width="400px" height="250px" height="auto" src="" alt="Không thể hiển thị" id="AnhBiaNguoiDung">
        </small>
        <small  class="d-flex justify-content-center">
            <img class="bd-100 d-flex justify-content-center bdr-white" width="100px" height="100px" src="" alt="Không thể hiển thị" id="AnhDaiDienNguoiDung" style="margin-top: -50px">
        </small>    

        <div class="container-fluid" >
            <div class="col-10">
                <label for="" style="display:inline-block">ID:</label>
                <input readonly type="text" name="ID" class="form-control" required id="IDNguoiDung" onclick="LoiNguoiDung('ID')" style="display:inline-block">
                <label for="">Email:</label>
                <input readonly type="text" name="Email" class="form-control" required id="EmailNguoiDung"  onclick="LoiNguoiDung('Email')"> 
            </div>
            <div class="col-10">
                <label for="">Mật khẩu:</label>
                <input type="text" name="MatKhau" class="form-control" required  id="MatKhauNguoiDung" onclick="LoiNguoiDung('MatKhauNguoiDung')">
                <label for="">Tên hiển thị:</label>
                <input type="text" name="TenHienThi" class="form-control" required  id="TenHienThiNguoiDung">
            </div>
            <div class="col-10">
                <label for="">Giới tính:</label>
                <select id="GioiTinh" name="GioiTinh" class="form-control">
                    <option value="0" selected>Nam</option>
                    <option value="1">Nữ</option>
                </select>
                <label for="">Số điện thoại:</label>
                <input type="text" name="SoDienThoai" class="form-control" required  id="SoDienThoaiNguoiDung">
            </div>
            <div class="col-10">
                <label for="">Địa chỉ:</label>
                <input type="text" name="DiaChi" class="form-control" required  id="DiaChiNguoiDung">
                <label for="">Ngày tạo:</label>
                <input type="text" name="NgayTao" class="form-control" required  id="NgayTaoNguoiDung">
            </div>
            <div class="col-10">
                <label for="">Kiểu tài khoản:</label>
                <select name="KieuTaiKhoan" class="form-control">
                    <option value="0" selected>user</option>
                    <option value="1">admin</option>
                </select>
            </div>
            <div class="col-10">
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Thay Đổi" class="btn btn-success">   
                    <span onclick="document.getElementById('SuaTaiKhoanNguoiDung').style.display='none'" class="btn btn-danger" title="Đóng">Hủy</span>
                </div> 
            </div>
        </div>
    </form>
</div>
