<?php

    if(isset($_GET["ID"])){
        $ID = $_GET["ID"];
    }

    require "modal/NguoiDungClass.php";
    require "modal/SanPhamClass.php";
    require "modal/DanhMucClass.php";

    $SanPham = new SanPhamClass();
    $ThongTinSanPham = $SanPham->LayMotSanPham($ID);

    if(isset($_SESSION['admin'])){
       
    }
    if(isset($_SESSION['user'])){
        $Email = $_SESSION['user'];

        $NguoiDung = new NguoiDungClass();
        $ThongTinNguoiDung = $NguoiDung->LayMotTaiKhoanNguoiDungEmail($Email);
    }
?>

<div class="row">
    <div class="col-10 card-10 bg-white ">
        <h2><?php echo $ThongTinSanPham->TenSanPham;?></h2>
    <hr>
        <div class="d-flex justify-content-start">
            <h2 class="text-danger">Giá: <?php echo $ThongTinSanPham->Gia?></h2>
        </div>
    </div>


    <div class="col-10 card-10 bg-white " style="display:block">
        <div class="col-7">
            <img src="<?php echo $ThongTinSanPham->AnhDemo_1?>" alt="" class="bd-10">  
        </div>

        <div class="col-3" style="display:block">
           <h3 class="d-flex justify-content-center"><i>Chi tiết:</i></h3>
        <hr>
           <strong>Danh mục: </strong>
           <?php
                $DanhMuc = new DanhMucClass();
                $ThongTinDanhMuc = $DanhMuc->LayMotdanhmucDanhMuc($ThongTinSanPham->ID_DanhMuc);
                echo "<span class='text-primary ml-3'><em>".$ThongTinDanhMuc->TenDanhMuc."</em></span>";
           ?>
        <br>
        <br>
            <strong>Mô Tả: </strong>

            <?php
                echo "<span class='ml-3'><em>".$ThongTinSanPham->MoTa."</em></span>";
            ?>
        <br>
        <br>
            <strong>Người Tạo: </strong>
            <?php
                $NguoiTao = new NguoiDungClass();
                $ThongTinNguoiTao = $NguoiTao->LayMotTaiKhoanNguoiDung($ThongTinSanPham->ID_User);

                echo "<span class='ml-3 text-success'><em>".$ThongTinNguoiTao->TenHienThi."</em></span>";
            ?>
             <br>
        <br>
            <strong>Ngày Tạo: </strong>
            <?php
                echo "<span class='ml-3'><em>".substr($ThongTinSanPham->NgayTao, 0, 8)."</em></span>";
            ?>
        </div>
    </div>
    <div class="col-10 card-10 bg-white " style="display:block">
        <div>
            <h3>Ảnh minh họa: </h3>
        </div>
        <div class="container-fluid">
            <div class="m-3 d-flex justify-content-center">
                <img src="<?php echo $ThongTinSanPham->AnhDemo_2?>" alt="" class="bd-10" width="100%">  
            </div>
            <div class="m-3 d-flex justify-content-center">
                <img src="<?php echo $ThongTinSanPham->AnhDemo_3?>" alt="" class="bd-10" width="100%">  
            </div>
        </div>
            
        <div class="d-flex justify-content-end">
            <div class="col-3 btn btn-dark">Trở về</div>
            <form action="controller/GiaoDichController.php" method="post">
                <input type="text" name="ThongTinNguoiDung" value="<?php echo $ThongTinNguoiDung->ID;?>" style="display:none">
                <input type="text" name="ThongTinSanPham" value="<?php echo $ThongTinSanPham->ID;?>" style="display:none">
                <input type="submit" value="Mua" class="btn btn-warning">
            </form>
          
        </div>
        <div class="d-flex justify-content-end">
          <div class="card-10 bg-light">
                <?php
                    if(isset($_REQUEST["ketqua"])){
                        $ketqua = $_REQUEST["ketqua"];

                        switch ($ketqua) {
                            case 'khongdutien':
                                echo "Giao dịch không thành công";
                                break;
                            case 'damua':
                                echo "Link dowload: " . "<a href='$ThongTinSanPham->Link' target='_blank'> ".$ThongTinSanPham->Link."</a>";
                                break;
                            default:
                                # code...
                                break;
                        }
                    }
                ?>
          </div>
        </div>
    </div>

    <div class="col-10 card-10 bg-white " style="display: inline-block">
        <div>
            <div class="col-5 d-flex justify-content-start">
            <h3>Bình luận: </h3>
            </div>
            <div class="col-5 d-flex justify-content-end">
                <h3 class="" id="DemMoTaBinhLuan"></h3>
            </div>
            
            
        </div>
        <div>
            <form action="controller/CommentController.php?comment=them&ID_SanPham=<?php echo $ThongTinSanPham->ID;?>&ID_User=<?php echo $ThongTinNguoiDung->ID?>" method="post">   
                <textarea style="font-size:22px" name="NoiDung" id="DoDaiBL" cols="30" rows="10" class="form-control" required onkeydown="DoDaiBinhLuan()"></textarea>
                <div class="d-flex justify-content-end">
                    <input type="submit" class="col-3 btn btn-primary" value="Bình luận"/>
                </div>
            </form>
        </div>
    </div>

    <div class="col-10 card-10 bg-white" style="display: inline-block">
       <?php
            if(isset($_SESSION["user"])){
            require "modal/CommentClass.php";

            $Comment = new CommentClass();
            # lấy tất cả comment của bài đăng đó bằng ID
            $ThongTinComment = $Comment->LayTatCaComment($ThongTinSanPham->ID);
            # ThongTin là lấy từng comment ra 
            foreach ($ThongTinComment as $ThongTin) {
                ?>
                <div class="d-flex justify-content-center">
                    <div class="card-10 bg-white p-0" style="display: block">
                        <?php
                            
                                $ID_User = $ThongTin->ID_User;
                                $NguoiDung = new NguoiDungClass();
                                $ThongTinNguoiDungComment = $NguoiDung->LayMotTaiKhoanNguoiDung($ID_User);
                        ?>
                       
                        <div class='col-3'>
                            <img src="<?php echo $ThongTinNguoiDungComment->DuongDanAnhDaiDien;?>" alt="" width="100px" height="100px" class="bd-100"> 
                        </div>

                        <div class='col-7 d-flex justify-content-start' style="display: block">
                            <h3 class=""><?php echo $ThongTinNguoiDungComment->TenHienThi?></h3>
                           
                        <hr>
                            <div>
                                <?php echo $ThongTin->NoiDung;?>
                            </div>
                            <?php
                                if($ThongTinNguoiDungComment->ID == $ThongTin->ID_User && $ThongTinNguoiDung->ID == $ThongTinNguoiDungComment->ID){
                                    ?>
                                        <form action="controller/CommentController.php?comment=xoa&ID_Comment=<?php echo $ThongTin->ID; ?>&ID_SanPham=<?php echo $ThongTinSanPham->ID;?>" method="post">
                                            <small class="d-flex justify-content-end text-danger">
                                                <input type="submit" class="btn btn-danger" value="Xóa">
                                            </small>
                                        </form>
                                    <?php
                                }
                            ?>
                        </div>  
                    </div>
                </div>
            <?php
            }  
        }else{
            echo "<div class='text-primary'>Bạn không thể thấy comment nếu chưa đăng nhập</div>";
        }
            ?>
    </div>
</div>
