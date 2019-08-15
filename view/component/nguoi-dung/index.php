<?php
    require "modal/NguoiDungClass.php";

    # index được tạo ra bởi foreach phía dưới - phân trang sinh ra đường link

    if(isset($_GET["index"])){
        $tab = $_GET['index'];
    }
?>

<div class="col-7">
    <div class="row">
        <div class="col-10 justify-content-start">
            <div class="btn btn-primary" onclick="document.getElementById('ThemTaiKhoanNguoiDung').style.display='block'">Thêm mới <strong>Người Dùng</strong></div>
        </div>

        <div class="col-10 w-100">
            <table class="bg-white">
                <tr class="text-dark">
                    <th>Số thứ tự</th>
                    <th>Mã tài khoản</th>
                    <th>Tên tài khoản</th>
                    <th>Ảnh đại diện</th>
                    <th>Ngày tạo</th>
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

                    $NguoiDungs = new NguoiDungClass();
                    $ThongTins = $NguoiDungs->LayTatCaTaiKhoanNguoiDung();
                  
                    foreach($ThongTins as $ThongTin){
                        # Hiện đúng cái trang có $tab vì $tab với $pagesTable là 1 || lấy được chính xác bao nhiêu trường dữ liệu || ví vụ mỗi trang chứa 5 đối tượng thì sẽ lấy ra đúng bao nhiêu đối tượng đó khi phân trang
                        if($pagesTable == $tab){
                ?>
                
                <tr id="">
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo $ThongTin->ID; ?></td>
                    <td><?php echo $ThongTin->Email; ?></td>
                    <td>
                        <img class="bd-100" src="<?php echo $ThongTin->DuongDanAnhDaiDien; ?>" alt="Không thể hiển thị" width="100px" height="100px">
                    </td>
                    <td><?php echo $ThongTin->NgayTao; ?></td>
                    <td>
                        <div class="btn btn-primary" onclick="SuaTaiKhoanNguoiDung('<?php echo $ThongTin->ID; ?>','<?php echo $ThongTin->Email; ?>','<?php echo $ThongTin->TenHienThi; ?>','<?php echo $ThongTin->MatKhau; ?>','<?php echo $ThongTin->GioiTinh; ?>','<?php echo $ThongTin->SoDienThoai; ?>','<?php echo $ThongTin->DiaChi; ?>','<?php echo $ThongTin->NgayTao; ?>', '<?php echo $ThongTin->KieuTaiKhoan; ?>', '<?php echo $ThongTin->DuongDanAnhBia; ?>', '<?php echo $ThongTin->DuongDanAnhDaiDien; ?>')">Sửa</div>
                        <div class="btn btn-danger" onclick="XoaTaiKhoanNguoiDung('<?php echo $ThongTin->ID; ?>', '<?php echo $ThongTin->Email; ?>')">Xóa</div>
                    </td>
                </tr>
                
               <?php
                        }
                        # Phân trang (Tạo trang 1 2 3....) || Khi $index = 6 thì $pagesTable = 2 || Cũng hông biết sao thiếu cái này nó hông chạy nữa || mặc dù mình là người đánh ra
                        if($index % 3 == 0){
                ?>
                            <a href = "./index.php?page=TrangQuanLi&quanli=NguoiDung&index=<?php echo $pagesTable?>" style="display:none"><?php echo $pagesTable?></a>
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
            foreach($ThongTins as $thongTin){
                # Phân trang (Tạo trang 1 2 3....) || Khi $index = 4 thì $pagesTable = 2
                if($index2 % 3 == 0){
                    ?>
                        <a href = "./index.php?page=TrangQuanLi&quanli=NguoiDung&index=<?php echo $pagesTable2?>" class="btn btn-primary PhanTrangNguoiDung"><?php echo $pagesTable2?></a>
                        <?php
                            $pagesTable2++;
                    }
                    $index2++;
                }
            ?>

            <!-- Có thêm cái này là vì khi % cho số nào mà trang cuối cùng nó sẽ không hiện || cái này giúp nó hiện -->
            <a href = "./index.php?page=TrangQuanLi&quanli=NguoiDung&index=<?php echo $pagesTable++ ?>" class="btn btn-primary PhanTrangNguoiDung">Trang cuối</a>     
        </div>
    </div>
</div>