<?php
    require "../modal/SanPhamClass.php";

    if(isset($_GET["yc"])){
        $request = $_GET["yc"];
        
        switch ($request) {
            case 'them':
                $TenSanPham = $_POST["TenSanPham"];
                $MoTa = $_POST["MoTa"];
                $Gia = $_POST["Gia"];
                $ID_DanhMuc = $_POST["ID_DanhMuc"];
                $ID_User = $_POST["ID_User"];
                $Link = $_POST["Link"];

                # Nhận file ảnh bìa
                $TenAnhMoTa = $_FILES['FileBaiDangMoTa']['name'];
                $BoNhoTamhMoTa = $_FILES['FileBaiDangMoTa']['tmp_name'];

                $TenAnhDemo1 = $_FILES['FileBaiDangDemo1']['name'];
                $BoNhoTamDemo1 = $_FILES['FileBaiDangDemo1']['tmp_name'];

                $TenAnhDemo2 = $_FILES['FileBaiDangDemo2']['name'];
                $BoNhoTamDemo2 = $_FILES['FileBaiDangDemo2']['tmp_name'];

                # Ngày tạo
                $format = "%H-%M-%S-";
                $timestamp = time();
                $strTime = strftime($format, $timestamp);
               

                # Đường dẫn cho copy file (cho hàm move)
                $LocationFolderMoTa = "../public/images/sanpham-images/mota/";
                $LocationFolderDemo1 = "../public/images/sanpham-images/demo/";
                $LocationFolderDemo2 = "../public/images/sanpham-images/demo/";

                # Đường dẫn cho hiển thị ảnh (lưu dưới database)
                $DuongDanAnhMoTa = "public/images/sanpham-images/mota/";
                $DuongDanAnhDemo1 = "public/images/sanpham-images/demo/";
                $DuongDanAnhDemo2 = "public/images/sanpham-images/demo/";

                if($TenAnhDemo1 != "" && $TenAnhDemo2 != "" && $TenAnhMoTa != ""){
                    $SanPham = new SanPhamClass();

                    # copy file
                    move_uploaded_file($BoNhoTamhMoTa,$LocationFolderMoTa.$strTime.$TenAnhMoTa);
                    move_uploaded_file($BoNhoTamDemo1,$LocationFolderDemo1.$strTime.$TenAnhDemo1);
                    move_uploaded_file($BoNhoTamDemo2,$LocationFolderDemo2.$strTime.$TenAnhDemo2);

                    $Them = $SanPham->ThemSanPhamKhongAnh(
                        $TenSanPham, 
                        $MoTa, 
                        $Gia, 
                        $ID_DanhMuc, 
                        $ID_User, 
                        $strTime, 
                        $Link, 
                        $DuongDanAnhMoTa.$strTime.$TenAnhMoTa, 
                        $DuongDanAnhDemo1.$strTime.$TenAnhDemo1, 
                        $DuongDanAnhDemo2.$strTime.$TenAnhDemo2
                    );

                    header("Location: ../index.php?page=ThemBaiDang&ketqua=ThanhCong");
              }else{
                header("Location: ../index.php?page=ThemBaiDang&ketqua=LoiTaiAnh");
              }
                break;

            case 'suacoanh':
                $ID = $_POST["ID_SanPhanSua"];

                # Nhận file ảnh bìa
                $TenAnhMoTa = $_FILES['FileBaiDangMoTa']['name'];
                $BoNhoTamhMoTa = $_FILES['FileBaiDangMoTa']['tmp_name'];

                $TenAnhDemo1 = $_FILES['FileBaiDangDemo1']['name'];
                $BoNhoTamDemo1 = $_FILES['FileBaiDangDemo1']['tmp_name'];

                $TenAnhDemo2 = $_FILES['FileBaiDangDemo2']['name'];
                $BoNhoTamDemo2 = $_FILES['FileBaiDangDemo2']['tmp_name'];

                 # Ngày tạo
                $format = "%H-%M-%S-";
                $timestamp = time();
                $strTime = strftime($format, $timestamp);
            

                # Đường dẫn cho copy file (cho hàm move)
                $LocationFolderMoTa = "../public/images/sanpham-images/mota/";
                $LocationFolderDemo1 = "../public/images/sanpham-images/demo/";
                $LocationFolderDemo2 = "../public/images/sanpham-images/demo/";

                # Đường dẫn cho hiển thị ảnh (lưu dưới database)
                $DuongDanAnhMoTa = "public/images/sanpham-images/mota/";
                $DuongDanAnhDemo1 = "public/images/sanpham-images/demo/";
                $DuongDanAnhDemo2 = "public/images/sanpham-images/demo/";

                # copy file
                move_uploaded_file($BoNhoTamhMoTa,$LocationFolderMoTa.$strTime.$TenAnhMoTa);
                move_uploaded_file($BoNhoTamDemo1,$LocationFolderDemo1.$strTime.$TenAnhDemo1);
                move_uploaded_file($BoNhoTamDemo2,$LocationFolderDemo2.$strTime.$TenAnhDemo2);

                $SanPham = new SanPhamClass();
                $Sua = $SanPham->SuaSanPhamCoAnh($DuongDanAnhMoTa.$strTime.$TenAnhMoTa, $DuongDanAnhDemo1.$strTime.$TenAnhDemo1, $DuongDanAnhDemo2.$strTime.$TenAnhDemo2, $ID);
                header("Location: ../index.php?page=suaBaiDang&ID=$ID&ketqua=ThanhCong");

                break;
            case 'suakhonganh':
                $ID = $_POST["ID_SanPhanSua"];
                $TenSanPham = $_POST["TenSanPham"];
                $MoTa = $_POST["MoTa"];
                $Gia = $_POST["Gia"];
                $ID_DanhMuc = $_POST["ID_DanhMuc"];
                $Link = $_POST["Link"];

               $SanPham = new SanPhamClass();
               $Sua = $SanPham->SuaSanPhamKhongAnh($TenSanPham, $MoTa, $Gia, $ID_DanhMuc, $Link, $ID);
               header("Location: ../index.php?page=suaBaiDang&ID=$ID&ketqua=ThanhCong");

                break;
            case "xoa":
                $ID = $_POST["IDSanPhamXoa"];
                $SanPham = new SanPhamClass();
                $Xoa = $SanPham->XoaSanPham($ID);

                header("Location: ../index.php?page=Profile&ketqua=ThanhCong");
                break;

            case "xoaAdmin":
                $ID = $_POST["IDSanPhamXoaAdmin"];
                $SanPham = new SanPhamClass();
                $Xoa = $SanPham->XoaSanPham($ID);

                header("Location: ../index.php?page=TrangQuanLi&quanli=BaiDang&index=1&ketqua=ThanhCong");
                break;    
            default:
                # code...
                break;
        }
    }

?>