<div id="ThemDanhMuc" class="model-NguoiDung" onclick="closeModal()">
    <form id="formThemDanhMuc" action="controller/DanhMucController.php?yc=them" method="post" class="b-sd-sm model-content animation" enctype="multipart/form-data">
    <span onclick="document.getElementById('ThemDanhMuc').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>
    <h1>Thêm Danh Mục</h1>
    
        <div class="container-fluid">
           
            <label for="">Tên danh mục: </label>
            <input type="text" name="TenDanhMuc" class="form-control" required>

            <label for="">Ảnh danh mục: </label>
            <input type="file" name="FileTenDanhMuc" class="form-control" required>
                
            <div class="d-flex justify-content-end">
                <input type="submit" value="Thêm" class="btn btn-success">   
                <span onclick="document.getElementById('ThemDanhMuc').style.display='none'" class="btn btn-danger" title="Đóng">Hủy</span>
            </div> 
        </div>
    </form>
</div>