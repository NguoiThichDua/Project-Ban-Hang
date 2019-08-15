
<div id="SuaDanhMuc" class="model-QuanTri" onclick="closeModal()">
    <form id="formSuaDanhMuc" action="controller/DanhMucController.php?yc=sua" method="post" class="b-sd-sm model-content animation" enctype="multipart/form-data">
    <span onclick="document.getElementById('SuaDanhMuc').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>
      
        <small  class="d-flex justify-content-center">
            <img class="bd-100" width="100px" height="100px" src="" alt="Không thể hiển thị" id="HinhAnhDanhMuc">
        </small>

        <input type="text" id="DuongDanInputDanhMuc" name="DuongDanInputDanhMuc" style="display: none">

        <div class="container-fluid">
            <label for="">ID:</label>
            <input readonly type="text" name="IDDanhMuc" class="form-control" required id="IDDanhMuc" onclick="Loi('ID')">
       
            <label for="">Tên danh mục:</label>
            <input type="text" name="TenDanhMuc" class="form-control" required id="TenDanhMuc"> 

            <label for="">Chọn ảnh:</label>
            <input type="file" name="FileUploadSuaDanhMuc" class="form-control">

        </div>
        <div class="d-flex justify-content-end">
            <input type="submit" value="Thay Đổi" class="btn btn-success">   
            <span onclick="document.getElementById('SuaDanhMuc').style.display='none'" class="btn btn-danger" title="Đóng">Hủy</span>
        </div> 
       
    </form>
</div>
