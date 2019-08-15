
<div id="SuaTaiKhoanQuanTri" class="model-QuanTri" onclick="closeModal()">
    <form id="formSuaTaiKhoanQuanTri" action="controller/QuanTriController.php?yc=sua" method="post" class="b-sd-sm model-content animation" enctype="multipart/form-data">
    <span onclick="document.getElementById('SuaTaiKhoanQuanTri').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>
      
        <small  class="d-flex justify-content-center">
            <img class="bd-100" width="100px" height="100px" src="" alt="Không thể hiển thị" id="HinhAnh">
           
        </small>
        <input type="text" id="DuongDanInput" name="DuongDanInput" style="display: none">
        <div class="container-fluid">
            <label for="">ID:</label>
            <input readonly type="text" name="ID" class="form-control" required id="IDQuanTri" onclick="Loi('ID')">
       
            <label for="">Tên tài khoản:</label>
            <input readonly type="text" name="TenTaiKhoan" class="form-control" required id="TenTaiKhoanQuanTri"  onclick="Loi('TenTaiKhoan')"> 
                
       
            <label for="">Mật khẩu:</label>
            <input type="text" name="MatKhau" class="form-control" required  id="MatKhauQuanTri">
             

            <label for="">Tên hiển thị:</label>
            <input type="text" name="TenHienThi" class="form-control" required  id="TenHienThiQuanTri">


            <label for="">Chọn ảnh:</label>
            <input type="file" name="FileUploadSuaQuanTri" class="form-control">

        </div>
        <div class="d-flex justify-content-end">
            <input type="submit" value="Thay Đổi" class="btn btn-success">   
            <span onclick="document.getElementById('SuaTaiKhoanQuanTri').style.display='none'" class="btn btn-danger" title="Đóng">Hủy</span>
        </div> 
       
    </form>
</div>
