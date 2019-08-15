<?php
    require "modal/SanPhamClass.php";
    require "modal/DanhMucClass.php";

    if(isset($_GET["ID"])){
        $ID = $_GET["ID"];
        $SanPham = new SanPhamClass();
        $ThongTin = $SanPham->LayMotsanphamSanPham($ID);
    }

    $DanhMuc = new DanhMucClass();
    $ThongTins = $DanhMuc->LayTatCaDanhMuc();

?>
<div class="row">
   
    <div class="col-10 justify-content-end">
   
        <form action="controller/SanPhamController.php?yc=suakhonganh" method="post" class="w-100 container" enctype="multipart/form-data"> 
            <input type="text" name="ID_SanPhanSua"  class="form-control" required value="<?php echo $ThongTin->ID?>" style="display:none">
           
            <div class="card-10 bg-white">
            <h1>Sửa Bài Đăng</h1>
                <h2>Thông tin:</h2>
    <hr>
                <label for="">Tên sản phẩm:</label>
                <input type="text" name="TenSanPham"  class="form-control" required value="<?php echo $ThongTin->TenSanPham?>">
    <br>
                <label for="">Mô tả:</label>
                <textarea name="MoTa" id="MoTaThemBaiDang" cols="30" rows="20" class="form-control" required onkeyup="checkDoDaiMoTa()"><?php echo $ThongTin->MoTa?></textarea>
                    <span id="DemMoTa" style="float:right"></span>
    <br>
                <label for="">Giá:</label>
                <input type="number" name="Gia" class="form-control"  required min="0" value="<?php echo $ThongTin->Gia?>">
    <br>
                <label for="">Link code:</label>
                <input type="text" name="Link" class="form-control"  required value="<?php echo $ThongTin->Link?>">
    <br>
                <label for="">Danh mục:</label>
                <select name="ID_DanhMuc"  class="form-control w-95" required>
                    <?php
                        foreach ($ThongTins as $ThongTinDanhMuc) {
                            ?>
                                <option value="<?php echo $ThongTinDanhMuc->ID; ?>" <?php  if($ThongTinDanhMuc->ID == $ThongTin->ID_DanhMuc) echo "selected"?>><?php echo $ThongTinDanhMuc->TenDanhMuc; ?></option>
                            <?php
                        }
                    ?>
                </select>
                <a href="index.php?page=Profile" class="btn btn-dark">Hủy</a>
                <input type="submit" class="btn btn-primary" value="Thay Đổi">
            </div>
        </form>
    </div>

    <div class="col-10 justify-content-end">
        <form action="controller/SanPhamController.php?yc=suacoanh" method="post" class="w-100 container" enctype="multipart/form-data"> 
            <div class="card-10 bg-white">
                <h2>Ảnh: </h2>
                <hr>
                <input type="text" name="ID_SanPhanSua"  class="form-control" required value="<?php echo $ThongTin->ID?>" style="display:none">
                <label for="">Ảnh mô tả: </label>
                <div>
                    <div class="col-10">
                        <input type="file" name="FileBaiDangMoTa" class="form-control" required>
                    </div>
                    <div class="col-10">
                        <img src="<?php echo $ThongTin->AnhDemo_1?>" alt="" class="bd-10">
                    </div>
                </div>
               
                
                <label for="">Ảnh demo 1: </label>
                <div>
                    <div class="col-10">
                        <input type="file" name="FileBaiDangDemo1" class="form-control" required >
                    </div>
                    <div class="col-10">
                        <img src="<?php echo $ThongTin->AnhDemo_2?>" alt="" class="bd-10">
                    </div>
                </div>

                <label for="">Ảnh demo 2: </label>
                <div>
                    <div class="col-10">
                        <input type="file" name="FileBaiDangDemo2" class="form-control" required >   
                    </div>
                    <div class="col-10">
                        <img src="<?php echo $ThongTin->AnhDemo_3?>" alt="" class="bd-10">
                    </div>
                </div>
               
                <input type="text" name="AnhDemo_1" value="<?php echo $ThongTin->AnhDemo_1?>" style="display:none">
                <input type="text" name="AnhDemo_2" value="<?php echo $ThongTin->AnhDemo_2?>" style="display:none">
                <input type="text" name="AnhDemo_3" value="<?php echo $ThongTin->AnhDemo_3?>" style="display:none">
                
                <a href="index.php?page=Profile" class="btn btn-dark">Hủy</a>
                <input type="submit" class="btn btn-primary" value="Thay Đổi">
            </div>
        </form>
    </div>
</div>

