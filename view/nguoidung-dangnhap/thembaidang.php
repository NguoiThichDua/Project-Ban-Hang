<?php
    require "modal/NguoiDungClass.php";
    require "modal/DanhMucClass.php";

    $email =  $_SESSION['user'];
    $NguoiDung = new NguoiDungClass();
    $user = $NguoiDung->LayMotTaiKhoanNguoiDungEmail($email);

    $DanhMuc = new DanhMucClass();
    $ThongTins = $DanhMuc->LayTatCaDanhMuc();
?>
<div class="row">
   

    <div class="col-10 justify-content-end">
   
        <form action="controller/SanPhamController.php?yc=them" method="post" class="w-100 container" enctype="multipart/form-data"> 
       
            <input type="text" name="ID_User"  class="form-control" required value="<?php echo $user->ID; ?>" style="display:none">
           
            <div class="card-10 bg-white">
            <h1>Thêm Bài Đăng</h1>
                <h2>Thông tin:</h2>
    <hr>
                <label for="">Tên sản phẩm:</label>
                <input type="text" name="TenSanPham"  class="form-control" required>
    <br>
                <label for="">Mô tả:</label>
                <textarea name="MoTa" id="MoTaThemBaiDang" cols="30" rows="10" class="form-control" required onkeyup="checkDoDaiMoTa()"></textarea>
                    <span id="DemMoTa" style="float:right"></span>
    <br>
                <label for="">Giá:</label>
                <input type="number" name="Gia" class="form-control"  required min="0" value="0">
    <br>
                <label for="">Link code:</label>
                <input type="text" name="Link" class="form-control"  required>
    <br>
                <label for="">Danh mục:</label>
                <select name="ID_DanhMuc"  class="form-control w-95" required>
                    <?php
                        foreach ($ThongTins as $ThongTin) {
                            ?>
                                <option value="<?php echo $ThongTin->ID; ?>"><?php echo $ThongTin->TenDanhMuc; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>


            <div class="card-10 bg-white">
                <h2>Ảnh: </h2>
                <hr>
                <label for="">Ảnh mô tả: </label>
                <input type="file" name="FileBaiDangMoTa" class="form-control" required>
                
                <label for="">Ảnh demo 1: </label>
                <input type="file" name="FileBaiDangDemo1" class="form-control" required>

                <label for="">Ảnh demo 2: </label>
                <input type="file" name="FileBaiDangDemo2" class="form-control" required>
                
                <a href="index.php?page=Profile" class="btn btn-dark">Hủy</a>
                <input type="submit" class="btn btn-primary" value="Thêm mới">
            </div>
        </form>
    </div>
</div>

