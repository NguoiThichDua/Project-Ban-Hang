<div id="XoaSanPham" class="model-QuanTri" onclick="closeModal()">
    <form id="formXoaSanPham" action="controller/SanPhamController.php?yc=xoa" method="post" class="b-sd-sm model-content animation" enctype="multipart/form-data">

    <span onclick="document.getElementById('XoaSanPham').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>

            <div class="">
                Bạn muốn xóa "<strong id="TenSanPhamXoa"></strong>" ?
                <input readonly type="text" name="IDSanPhamXoa" class="form-control" required id="IDSanPhamXoa" style="display:none"></div>
               
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Đồng ý" class="btn btn-success">   
                    <span onclick="document.getElementById('XoaSanPham').style.display='none'" class="btn btn-danger" title="Đóng">Hủy</span>
                </div> 
            </div>
    </form>
</div>
