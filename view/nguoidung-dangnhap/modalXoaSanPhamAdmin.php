<div id="XoaSanPhamAdmin" class="model-QuanTri" onclick="closeModal()">
    <form id="formXoaSanPhamAdmin" action="controller/SanPhamController.php?yc=xoaAdmin" method="post" class="b-sd-sm model-content animation">
    <span onclick="document.getElementById('XoaSanPhamAdmin').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>

            <div class="">
                Bạn muốn xóa "<strong id="TenSanPhamXoaAdmin"></strong>" ?
                <input readonly type="text" name="IDSanPhamXoaAdmin" class="form-control" required id="IDSanPhamXoaAdmin" style="display:none"></div>
               
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Đồng ý" class="btn btn-success">   
                    <span onclick="document.getElementById('XoaSanPhamAdmin').style.display='none'" class="btn btn-danger" title="Đóng">Hủy</span>
                </div> 
            </div>
    </form>
</div>
