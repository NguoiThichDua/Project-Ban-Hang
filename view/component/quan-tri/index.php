
<?php
    if(isset($_GET["index"])){
        $tab = $_GET['index'];
    }
?>

<div class="col-7">
    <div class="row">
        <div class="col-10 justify-content-start">
            <div class="btn btn-primary" onclick="document.getElementById('ThemTaiKhoanQuamTri').style.display='block'">Thêm mới <strong>Quản Trị</strong></div>
        </div>

        <div class="col-10 w-100">
            <table class="bg-white">
                <tr class="text-dark">
                    <th>Số thứ tự</th>
                    <th>Mã tài khoản</th>
                    <th>Tên tài khoản</th>
                    <th>Tên hiển thị</th>
                    <th>Hình ảnh</th>
                    <th>Chức năng</th>
                </tr>
                <?php
                    require 'modal/QuanTriClass.php';

                    $stt = 1;
                    # Là số xác định số trường dữ liệu
                    $index = 1;
                    $index2 = 1;
                    # tab trang
                    $pagesTable = 1;
                    $pagesTable2 = 1;

                    $quanTri = new QuanTriClass();
                    $thongTins = $quanTri->LayTatCaTaiKhoanQuanTri();

                    foreach($thongTins as $thongTin){
                        # Hiện đúng cái trang có $tab vì $tab với $pagesTable là 1 || lấy được chính xác bao nhiêu records luôn vì cái % ở dưới
                        if($pagesTable == $tab){
                ?>
                            <tr>
                                <td><?php echo $stt++ ?></td>
                                <td><?php echo $thongTin->ID ;?></td>
                                <td><?php echo $thongTin->TenTaiKhoan ;?></td>
                                <td><?php echo $thongTin->TenHienThi ;?></td>
                                <td>
                                    <img class="bd-100" width="100px" height="100px" src="<?php echo $thongTin->DuongDanAnh?>" alt="Không thể hiển thị">
                                </td>
                                <td>
                                    <div class="col-10">
                                        <div class="btn btn-primary" onclick="SuaTaiKhoan('<?php echo $thongTin->ID;?>', '<?php echo $thongTin->TenTaiKhoan;?>','<?php echo $thongTin->MatKhau;?>','<?php echo $thongTin->TenHienThi;?>','<?php echo $thongTin->DuongDanAnh;?>')">Sửa</div>
                                        <div class="btn btn-danger" onclick="XoaTaiKhoan('<?php echo $thongTin->ID;?>', '<?php echo $thongTin->TenTaiKhoan;?>')">Xóa</div>
                                    </div>
                                </td>
                            </tr>
                <?php
                        }
                        # Phân trang (Tạo trang 1 2 3....) || Khi $index = 4 thì $pagesTable = 2
                        if($index % 3 == 0){
                ?>
                            <a href = "./index.php?page=TrangQuanLi&quanli=QuanTri&index=<?php echo $pagesTable?>" style="display:none"><?php echo $pagesTable?></a>
                <?php
                            $pagesTable++;
                        } 
                        $index++;
                    }
                ?>   
            </table>
        </div>

        <div class="col-10 PhanTrang mt-1 bd-10 justify-content-end">
               <?php
                 foreach($thongTins as $thongTin){
                    # Phân trang (Tạo trang 1 2 3....) || Khi $index = 4 thì $pagesTable = 2
                    if($index2 % 3 == 0){
                ?>
                        <a href = "./index.php?page=TrangQuanLi&quanli=QuanTri&index=<?php echo $pagesTable2?>" class="PhanTrangQuanTri btn btn-primary"><?php echo $pagesTable2?></a>
                <?php
                         $pagesTable2++;
                        }
                        $index2++;
                    }
               ?>
                <!-- Có thêm cái này là vì khi % cho số nào mà trang cuối cùng nó sẽ không hiện || cái này giúp nó hiện -->
                <a href = "./index.php?page=TrangQuanLi&quanli=QuanTri&index=<?php echo $pagesTable++ ?>" class="PhanTrangQuanTri btn btn-primary">Trang cuối</a>     
        </div>
    </div>
</div>