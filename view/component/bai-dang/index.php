<?php
    require "modal/SanPhamClass.php";

    if(isset($_GET["index"])){
        $tab = $_GET['index'];
    }
?>

<div class="col-7">
    <div class="row">
        <div class="col-10 w-100">
        <table class="bg-white">
            <tr class="text-dark">
                <th>Số thứ tự</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Chức năng</th>
            </tr>
            <?php
                $stt = 1;

                # Là số xác định số trường dữ liệu
                $index = 1;
                $index2 = 1;
                # tab trang
                $pagesTable = 1;
                $pagesTable2 = 1;

                $SanPhams = new SanPhamClass();
                $ThongTins = $SanPhams->LayTatCaSanPham();
              
                foreach($ThongTins as $thongTin){
                    if($tab == $pagesTable){
            ?>
                    <tr>
                        <td><?php echo $stt++ ?></td>
                        <td><?php echo $thongTin->ID ;?></td>
                        <td><?php echo $thongTin->TenSanPham ;?></td>
                        <td>
                            <img class="bd-100" width="100px" height="100px" src="<?php echo $thongTin->AnhDemo_1?>" alt="Không thể hiển thị">
                        </td>
                        <td>
                            <div class="col-10">
                                <div class="btn btn-danger" onclick="XoaSanPhamAdmin('<?php echo $thongTin->ID;?>', '<?php echo $thongTin->TenSanPham;?>')">Xóa</div>
                            </div>
                        </td>
                    </tr>
            <?php
                    }
                    if($index % 3 == 0){ ?>
                        <a href = "./index.php?page=TrangQuanLi&quanli=BaiDang&index=<?php echo $pagesTable?>" style="display:none"><?php echo $pagesTable?></a>
                    <?php 
                        # là cái quyết định cái nào nằm ở đâu
                        $pagesTable++;
                    }
                    $index++;
                }
            ?>   
        </table>
    </div>
    <div class="col-10 PhanTrang mt-1 bd-10 justify-content-end">
            <?php
            foreach($ThongTins as $thongTin){
                # Phân trang (Tạo trang 1 2 3....) || Khi $index = 4 thì $pagesTable = 2
                if($index2 % 3 == 0){
                    ?>
                        <a href = "./index.php?page=TrangQuanLi&quanli=BaiDang&index=<?php echo $pagesTable2?>" class="btn btn-primary PhanTrangNguoiDung"><?php echo $pagesTable2?></a>
                        <?php
                            $pagesTable2++;
                    }
                    $index2++;
                }
            ?>

            <!-- Có thêm cái này là vì khi % cho số nào mà trang cuối cùng nó sẽ không hiện || cái này giúp nó hiện -->
            <a href = "./index.php?page=TrangQuanLi&quanli=BaiDang&index=<?php echo $pagesTable++ ?>" class="btn btn-primary PhanTrangNguoiDung">Trang cuối</a>     
        </div>
   </div>
</div>