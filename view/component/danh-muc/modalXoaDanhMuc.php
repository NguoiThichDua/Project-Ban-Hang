

<div id="XoaDanhMuc" class="model-QuanTri" onclick="closeModal()">
    <form id="formXoaDanhMuc" action="controller/DanhMucController.php?yc=xoa" method="post" class="b-sd-sm model-content animation" enctype="multipart/form-data">

    <span onclick="document.getElementById('XoaDanhMuc').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>

            <div class="">
                Bạn muốn xóa danh mục "<strong id="TenDanhMucXoa"></strong>" ?
                <input readonly type="text" name="IDDanhMucXoa" class="form-control" required id="IDDanhMucXoa" style="display:none"></div>
               
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Đồng ý" class="btn btn-success">   
                    <span onclick="document.getElementById('XoaDanhMuc').style.display='none'" class="btn btn-danger" title="Đóng">Hủy</span>
                </div> 
            </div>
    </form>
</div>
