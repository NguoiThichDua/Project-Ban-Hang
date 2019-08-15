

<div id="XoaTaiKhoanNguoiDung" class="model-NguoiDung" onclick="closeModal()">
    <form id="formXoaTaiKhoanNguoiDung" action="controller/NguoiDungController.php?yc=xoa" method="post" class="b-sd-sm model-content animation" enctype="multipart/form-data">

    <span onclick="document.getElementById('XoaTaiKhoanNguoiDung').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>

            <div class="">
                Bạn muốn xóa tài khoản "<strong id="TenNguoiDungXoa"></strong>" ?
                <input readonly type="text" name="ID" class="form-control" required id="IDNguoiDungXoa" style="display:none"></div>
               
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Đồng ý" class="btn btn-success">   
                    <span onclick="document.getElementById('XoaTaiKhoanNguoiDung').style.display='none'" class="btn btn-danger" title="Đóng">Hủy</span>
                </div> 
            </div>
    </form>
</div>
