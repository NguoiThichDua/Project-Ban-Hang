<?php
    require "modal/NguoiDungClass.php";
    require "modal/SanPhamClass.php";

    $email =  $_SESSION['user'];
    $NguoiDung = new NguoiDungClass();
    $user = $NguoiDung->LayMotTaiKhoanNguoiDungEmail($email);
?>
<div class="row">
    <div class="col-10">
        <img src="<?php echo $user->DuongDanAnhBia?>" class="bd-10" alt="Lỗi ảnh" width="100%" height="650px">
    </div>

    <div class="col-10 d-flex justify-content-start" >
        <img src="<?php echo $user->DuongDanAnhDaiDien?>" class="bd-200 bdr" alt="Lỗi ảnh" width="200px" height="200px" style="margin-top:-450px; margin-left:100px;">
    </div>

    <div class="col-3"  style="display:block">
        <div class="card-9 bg-white" style="margin-left:0">
            <h4>Thông tin</h4>
            <hr>
            <p>
                <span>Tên tài khoản:</span> <strong><em style="color:red"><?php echo $user->Email?></em></strong>
            </p>
            <p>
                <span>Giới tính:</span> 
                <em>
                    <?php 
                       if($user->GioiTinh == 0){
                           echo "<strong><em>Nam</em></strong>";
                       }else{
                           echo "<strong><em>Nữ</em></strong>";
                       }
                    ?>
                </em> 
            </p>
            <p>
                <span>Địa chỉ:</span> <strong><em><?php echo $user->DiaChi?></em> </strong>
            </p>
            <p>
                <span>Ngày tạo:</span><strong><em><?php echo $user->NgayTao?></em> </strong>
            </p>
            <p>
                <span>Loại tài khoản:</span> <strong><em style="color:DodgerBlue"><?php echo $user->KieuTaiKhoan?></em> </strong>
            </p>
        </div>
                   
        <div class="card-9 bg-white mt-3" style="margin-left:0">
            <h4>Chức năng:</h4>
            <hr>
            <p>
                <a href="index.php?page=SuaNguoiDung" style="text-decoration: none" class="d-flex justify-content-center btn btn-success text-center">
                    Chỉnh Sửa Tài Khoản
                </a>
            </p>
            <p>
                <a href="index.php?page=ThemBaiDang" style="text-decoration: none" class="d-flex justify-content-center btn btn-primary text-center">
                   Thêm Sản Phẩm
                </a>
            </p>
        </div>
    </div>

    <div class="col-7" style="display:block"> 
        <?php
            $ID = $user->ID;
            $SanPham = new SanPhamClass();
            $SanPhams = $SanPham->LayTatCaSanPhamCuaUser($ID);
           
            foreach ($SanPhams as $sp) {
                ?>
                    <div class="card-10 bg-white w-95 ml-3" >
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo $sp->AnhDemo_1?>" class="bd-10" alt="Lỗi hiển thị"  width="500px" height="300px">  
                        </div>
                        <div class="d-flex justify-content-center">
                            <h1><?php echo $sp->TenSanPham;?></h1>     
                        </div>
            <hr>      
                        <h4>Mô tả: <em><?php echo $sp->MoTa;?></em></h4> 
                        <h4>Giá: <em><?php echo $sp->Gia;?></em></h4> 

                        <div class="d-flex justify-content-end">
                            <div onclick="Redirect('<?php echo $sp->ID ?>')" class="btn btn-success text-center w-10">Sửa</div>
                            <div class="btn btn-danger text-center w-10" onclick="XoaSanPham('<?php echo $sp->ID ?>','<?php echo $sp->TenSanPham ?>')">Xóa</div>
                        </div>
                    
                    </div>
                <?php
            }
        ?>
    </div>
</div>