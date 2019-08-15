<?php

    require "../modal/NguoiDungClass.php";
    require "../modal/SanPhamClass.php";

    $SanPham = new SanPhamClass();
    $NguoiDung = new NguoiDungClass();

    if(isset($_POST["ThongTinNguoiDung"]) && isset($_POST["ThongTinSanPham"])){
        $IDNguoiDung = $_POST["ThongTinNguoiDung"];
        $IDSanPham = $_POST["ThongTinSanPham"];

        $ThongTinNguoiDung = $NguoiDung->LayMotTaiKhoanNguoiDung($IDNguoiDung);
        $IDNguoiDung = $ThongTinNguoiDung->ID;
        $TienNguoiDung = $ThongTinNguoiDung->Tien;

        $ThongTinSanPham = $SanPham->LayMotSanPham($IDSanPham);
        $ID = $ThongTinSanPham->ID;
        $GiaSanPham = $ThongTinSanPham->Gia;
        
        if($TienNguoiDung < $GiaSanPham){
            header("Location: ../index.php?page=viewSanPham&ID=$ID&ketqua=khongdutien");
        }
        if($TienNguoiDung > $GiaSanPham){
            $Tien = $TienNguoiDung - $GiaSanPham;
            $updateTien = $NguoiDung->SuaTienTaiKhoanNguoiDung($Tien,$IDNguoiDung);
            header("Location: ../index.php?page=viewSanPham&ID=$ID&ketqua=damua");
        }

       
       
    }else{
        echo "Chưa đăng nhập";
    }
?>