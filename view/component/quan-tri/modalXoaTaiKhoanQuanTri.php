

<div id="XoaTaiKhoanQuanTri" class="model-QuanTri" onclick="closeModal()">
    <form id="formXoaTaiKhoanQuanTri" action="controller/QuanTriController.php?yc=xoa" method="post" class="b-sd-sm model-content animation" enctype="multipart/form-data">

    <span onclick="document.getElementById('XoaTaiKhoanQuanTri').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>

            <div class="">
                Bạn muốn xóa tài khoản "<strong id="TenQuanTriXoa"></strong>" ?
                <input readonly type="text" name="ID" class="form-control" required id="IDQuanTriXoa" style="display:none"></div>
               
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Đồng ý" class="btn btn-success">   
                    <span onclick="document.getElementById('XoaTaiKhoanQuanTri').style.display='none'" class="btn btn-danger" title="Đóng">Hủy</span>
                </div> 
            </div>
    </form>
</div>
