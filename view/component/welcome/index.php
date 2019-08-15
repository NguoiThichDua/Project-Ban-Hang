<!-- 80 -->
<?php
    require "modal/SanPhamClass.php";
    $SanPham = new SanPhamClass();
    $ThongTins = $SanPham->LayTatCaSanPham();
?>
<div class="row">
    <?php
        foreach ($ThongTins as $ThongTin) {
    ?>
        <div class="col-5">
            <div class="card-10 bg-white" style="height: 545px">
                <img src="<?php echo $ThongTin->AnhDemo_1?>" alt="" width="100%" height="300px" class="bd-10">
            <hr>
                <h3><?php echo $ThongTin->TenSanPham?></h3>
                <p>
                    <strong>Mô tả: </strong>

                    <?php 
                    $strlen = strlen($ThongTin->MoTa);
                    $str = $ThongTin->MoTa;
                    
                        if($strlen > 80){
                            echo substr($str, 0, 200) . "...";
                        }else{
                            echo $ThongTin->MoTa;
                        }
                    ?>
                </p>
                <p>
                    <strong>Giá:<em style="color:red; margin-left:10px"><?php echo $ThongTin->Gia?></em></strong>
                </p>
               
            <hr>
                <div class="d-flex justify-content-end">
                    <a href="index.php?page=viewSanPham&ID=<?php echo $ThongTin->ID;?>" class="col-3 btn btn-primary">Đọc thêm</a>
                    <div class="col-3 btn btn-warning">Mua ngay</div>
                </div>
               
            </div>
        </div>
    <?php
        }
    ?>
</div>