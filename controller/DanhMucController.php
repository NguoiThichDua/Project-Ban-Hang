<?php
    require "../modal/DanhMucClass.php";

    if(isset($_GET["yc"])){
        $request = $_GET["yc"];
        switch ($request) {
            case 'them':
                    $TenDanhMuc = $_POST["TenDanhMuc"];

                    # Nhận file media
                    $TenAnh = $_FILES['FileTenDanhMuc']['name'];
                    $KieuAnh = $_FILES['FileTenDanhMuc']['type'];
                    $KichThuocAnh = $_FILES['FileTenDanhMuc']['size'];
                    $BoNhoTam = $_FILES['FileTenDanhMuc']['tmp_name'];

                    # Ngày tạo
                    $format = "%H-%M-%S-";
                    $timestamp = time();
                    $strTime = strftime($format, $timestamp);

                    # Đường dẫn cho copy file
                    $LocationFolder = "../public/images/danhmuc-images/";

                    # Đường dẫn cho hiển thị ảnh (lưu dưới database)
                    $DuongDanAnh = "public/images/danhmuc-images/" . $strTime . $TenAnh;

                    $DuongDanAnhFoler = $LocationFolder.$strTime.$TenAnh;
                        
                    # copy file
                    move_uploaded_file($BoNhoTam,$DuongDanAnhFoler);

                    $them = new DanhMucClass();
                    $them->ThemDanhMuc($TenDanhMuc, $DuongDanAnh, $strTime);

                    header("Location: ../index.php?page=TrangQuanLi&quanli=DanhMuc&ketqua=ThanhCong&index=1");
                break;
            case 'sua':
                # Nhận dữ liệu được post qua
                $IDDanhMuc = $_POST["IDDanhMuc"];
                $TenDanhMuc = $_POST["TenDanhMuc"];
                $DuongDanMacDinh = $_POST["DuongDanInputDanhMuc"];

                # Nhận file media
                $TenAnh = $_FILES['FileUploadSuaDanhMuc']['name'];
                $KieuAnh = $_FILES['FileUploadSuaDanhMuc']['type'];
                $KichThuocAnh = $_FILES['FileUploadSuaDanhMuc']['size'];
                $BoNhoTam = $_FILES['FileUploadSuaDanhMuc']['tmp_name'];

                # Ngày tạo
                $format = "%H-%M-%S-";
                $timestamp = time();
                $strTime = strftime($format, $timestamp);

                $DanhMuc = new DanhMucClass();

                # Đường dẫn cho copy file
                $LocationFolder = "../public/images/danhmuc-images/";

                # Đường dẫn cho hiển thị ảnh (lưu dưới database)
                $DuongDanAnh = "public/images/danhmuc-images/" . $strTime . $TenAnh;

                # Có ảnh
                if($TenAnh != ""){
                     # copy file
                    $DuongDanAnhFoler = $LocationFolder.$strTime.$TenAnh;
                    move_uploaded_file($BoNhoTam,$DuongDanAnhFoler);

                    unlink("../".$DuongDanMacDinh);

                    $DanhMuc->SuaDanhMuc($TenDanhMuc, $DuongDanAnh, $IDDanhMuc);
                    header("Location: ../index.php?page=TrangQuanLi&quanli=DanhMuc&ketqua=ThanhCong&index=1");
                }else{
                    $DanhMuc->SuaDanhMuc($TenDanhMuc, $DuongDanMacDinh, $IDDanhMuc);
                    header("Location: ../index.php?page=TrangQuanLi&quanli=DanhMuc&ketqua=ThanhCong&index=1");
                }
                break;
            case "xoa":
                $ID = $_POST["IDDanhMucXoa"];
                $DanhMuc = new DanhMucClass();
                $DanhMuc->XoaDanhMuc($ID);
                header("Location: ../index.php?page=TrangQuanLi&quanli=DanhMuc&ketqua=ThanhCong&index=1");
                break;
            default:
                # code...
                break;
        }
    }

?>