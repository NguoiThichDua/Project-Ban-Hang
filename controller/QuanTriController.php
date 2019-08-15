<?php
    require '../modal/QuanTriClass.php';
    if(isset($_GET['yc'])){
        $request = $_GET['yc'];

       switch ($request) {
            case 'them':
                # Nhận thông tin người dùng post qua
                $TenTaiKhoan = $_POST['TenTaiKhoan'];
                $MatKhau     = $_POST['MatKhau'];
                $TenHienThi  = $_POST['TenHienThi'];
                
                # Nhận file media
                $TenAnhF = $_FILES['FileUpload']['name'];
                $KieuAnhF = $_FILES['FileUpload']['type'];
                $KichThuocAnhF = $_FILES['FileUpload']['size'];
                $BoNhoTamF = $_FILES['FileUpload']['tmp_name'];

                # Đường dẫn cho copy file
                $LocationFolder = "../public/images/admin-images/";

                # Đường dẫn cho hiển thị ảnh (lưu dưới database)
                $DuongDanAnh = "public/images/admin-images/";

                $QuanTri = new QuanTriClass();

                # Kiểm tra tài khoản đã tồn tại chưa
                $kiemTraTaiKhoanTonTai = $QuanTri->KiemTraTaiKhoan($TenTaiKhoan);
                
                # Tạo chuỗi ngẫu nhiên để mã hóa mật khẩu
                # ======================================================================================= #
             
 
                // function generate_string($input, $strength = 6) {
                //     $input_length = strlen($input);
                //     $random_string = '';
                //     for($i = 0; $i < $strength; $i++) {
                //         $random_character = $input[mt_rand(0, $input_length - 1)];
                //         $random_string .= $random_character;
                //     }
                
                //     return $random_string;
                // }

                // $chuoiNgauNhien = generate_string($MatKhau,strlen($MatKhau));
             
 
                $md5 = md5($MatKhau, false);


                # ======================================================================================= #

                # Kiểm tra độ dài tài khoản và mật khẩu
                if(strlen($TenTaiKhoan) <= 5 ){
                    header("Location: ../index.php?page=TrangQuanLi&quanli=QuanTri&index=1&ketqua=TenTaiKhoanQuaNgan");
                }else if(strlen($MatKhau) <= 5){
                    header("Location: ../index.php?page=TrangQuanLi&quanli=QuanTri&index=1&ketqua=MatKhauYeu");
                }else if($kiemTraTaiKhoanTonTai > 0){
                    header("Location: ../index.php?page=TrangQuanLi&quanli=QuanTri&index=1&ketqua=TonTaiTaiKhoan");
                
                }else{
                    if($TenAnhF != ''){
                        # Có ảnh

                        # Định dạng lại tên ảnh và duy chuyển đi
                        $format = "%H-%M-%S-";
                        $timestamp = time();
                        $strTime = strftime($format, $timestamp);
                        $DuongDanAnhFoler = $LocationFolder.$strTime.$TenAnhF;
                        
                        # copy file
                        move_uploaded_file($BoNhoTamF,$DuongDanAnhFoler);

                        # Thêm có ảnh
                        $QuanTri->ThemTaiKhoanQuanTri($TenTaiKhoan, $md5, $TenHienThi, $DuongDanAnh.$strTime.$TenAnhF);
                        header("Location: ../index.php?page=TrangQuanLi&quanli=QuanTri&index=1&ketqua=ThanhCong");
                    }else{
                        # Thêm không ảnh
                        $QuanTri->ThemTaiKhoanQuanTri($TenTaiKhoan, $md5, $TenHienThi, "public/images/default-images/no-image.png");
                        header("Location: ../index.php?page=TrangQuanLi&quanli=QuanTri&index=1&ketqua=ThanhCong");
                    }
                }
                
            break;
            case 'xoa':
               $ID = $_POST["ID"];

               $QuanTri = new QuanTriClass();
               $QuanTri->XoaTaiKhoanQuanTri($ID);
               
               header("Location: ../index.php?page=TrangQuanLi&quanli=QuanTri&index=1&ketqua=ThanhCong");
            break;
            case 'sua':
                # Nhận thông tin người dùng post qua
                $ID                 = $_POST['ID'];
                $TenTaiKhoan        = $_POST['TenTaiKhoan'];
                $MatKhau            = $_POST['MatKhau'];
                $TenHienThi         = $_POST['TenHienThi'];
                $DuongDanMacDinh    = $_POST['DuongDanInput'];
                
                # Nhận file media
                $TenAnhF = $_FILES['FileUploadSuaQuanTri']['name'];
                $KieuAnhF = $_FILES['FileUploadSuaQuanTri']['type'];
                $KichThuocAnhF = $_FILES['FileUploadSuaQuanTri']['size'];
                $BoNhoTamF = $_FILES['FileUploadSuaQuanTri']['tmp_name'];

                $LocationFolder = "../public/images/admin-images/";
                $DuongDanAnh = "public/images/admin-images/";

                $md5 = md5($MatKhau, false);

                $QuanTri = new QuanTriClass();

                if($TenAnhF != null){
                    # Có Ảnh...
                    # Định dạng lại tên ảnh và duy chuyển đi
                    $format = "%H-%M-%S-";
                    $timestamp = time();
                    $strTime = strftime($format, $timestamp);

                    $DuongDanAnhFoler = $LocationFolder.$strTime.$TenAnhF;

                    move_uploaded_file($BoNhoTamF,$DuongDanAnhFoler);

                    if($DuongDanMacDinh != "public/images/default-images/no-image.png"){
                        unlink("../".$DuongDanMacDinh);
                    }
                    


                    # Sửa có ảnh
                    $QuanTri->SuaTaiKhoanQuanTri($md5, $TenHienThi, $DuongDanAnh.$strTime.$TenAnhF, $ID);
                    header("Location: ../index.php?page=TrangQuanLi&quanli=QuanTri&index=1&ketqua=ThanhCong");

                }else{
                    # Sửa Không Ảnh...
                    $QuanTri->SuaTaiKhoanQuanTri($md5, $TenHienThi, $DuongDanMacDinh, $ID);
                    header('Location: ../index.php?page=TrangQuanLi&quanli=QuanTri&index=1&ketqua=ThanhCong');
                }

                break;
           default:
               echo 'Yêu cầu không xác định';
            break;
       }
    }else{
        echo 'Không nhận được yêu cầu';
    }
?>