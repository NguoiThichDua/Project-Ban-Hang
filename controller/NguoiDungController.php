<?php
    session_start();

    require "../modal/NguoiDungClass.php";   
    require "../modal/QuanTriClass.php";   

    if(isset($_GET["yc"])){
        $yeuCau = $_GET["yc"];

        switch ($yeuCau) {
            case 'suanguoidungcoanh':

                $ID = $_POST["ID"];
                $DuongDanDaiDienHienTai = $_POST["DuongDanAnhDaiDien"];
                $DuongDanBiaHienTai = $_POST["DuongDanAnhBia"];

                $NguoiDung = new NguoiDungClass();

                # Nhận file ảnh bìa
                $TenAnhBia = $_FILES['FileUploadSuaAnhBiaNguoiDung']['name'];
                $KieuAnhBia = $_FILES['FileUploadSuaAnhBiaNguoiDung']['type'];
                $KichThuocAnhBia = $_FILES['FileUploadSuaAnhBiaNguoiDung']['size'];
                $BoNhoTamAnhBia = $_FILES['FileUploadSuaAnhBiaNguoiDung']['tmp_name'];

                # Nhận file ảnh đại điện
                $TenAnhDaiDien = $_FILES['FileUploadSuaAnhDaiDienNguoiDung']['name'];
                $KieuAnhDaiDien = $_FILES['FileUploadSuaAnhDaiDienNguoiDung']['type'];
                $KichThuocAnhDaiDien = $_FILES['FileUploadSuaAnhDaiDienNguoiDung']['size'];
                $BoNhoTamAnhDaiDien = $_FILES['FileUploadSuaAnhDaiDienNguoiDung']['tmp_name'];

                # Đổi cả 2
                if($TenAnhBia != "" && $TenAnhDaiDien != ""){
                    # Đường dẫn cho copy file (cho hàm move)
                    $LocationFolderBia = "../public/images/user-images/anh-bia/";
                    $LocationFolderDaiDien = "../public/images/user-images/anh-daidien/";

                    # Đường dẫn cho hiển thị ảnh (lưu dưới database)
                    $DuongDanAnhBia = "public/images/user-images/anh-bia/";
                    $DuongDanAnhDaiDien = "public/images/user-images/anh-daidien/";

                    # Định dạng lại tên ảnh và duy chuyển đi
                    $format = "%H-%M-%S-";
                    $timestamp = time();
                    $strTime = strftime($format, $timestamp);

                    $DuongDanAnhFolerBia = $LocationFolderBia.$strTime.$TenAnhBia;
                    $DuongDanAnhFolerDaiDien = $LocationFolderDaiDien.$strTime.$TenAnhDaiDien;

                    # Remove file (Chưa hoàn thiện chỗ này)
                    // if($DuongDanMacDinhBia != "public/images/default-images/no-image.png" && $DuongDanMacDinhDaiDien != "public/images/default-images/no-image.jpg"){
                    //     unlink("../".$DuongDanDaiDienHienTai);
                    //     unlink("../".$DuongDanBiaHienTai);
                    // }

                    # copy file
                    move_uploaded_file($BoNhoTamAnhBia,$DuongDanAnhFolerBia);
                    move_uploaded_file($BoNhoTamAnhDaiDien,$DuongDanAnhFolerDaiDien);

                    $NguoiDung->SuaTaiKhoanNguoiDungByNguoiDung($DuongDanAnhBia.$strTime.$TenAnhBia, $DuongDanAnhDaiDien.$strTime.$TenAnhBia, $ID);
                    header("Location: ../index.php?page=SuaNguoiDung&ketqua=ThanhCong");

                    #Đổi bìa không đổi đại diện
                }else if($TenAnhBia != "" && $TenAnhDaiDien == ""){
                    # Đường dẫn cho copy file (cho hàm move)
                    $LocationFolderBia = "../public/images/user-images/anh-bia/";

                    # Đường dẫn cho hiển thị ảnh (lưu dưới database)
                    $DuongDanAnhBia = "public/images/user-images/anh-bia/";

                    # Định dạng lại tên ảnh và duy chuyển đi
                    $format = "%H-%M-%S-";
                    $timestamp = time();
                    $strTime = strftime($format, $timestamp);

                    $DuongDanAnhFolerBia = $LocationFolderBia.$strTime.$TenAnhBia;

                    # Remove file (chưa kiểm tra)
                    # unlink("../".$DuongDanBiaHienTai);

                    # copy file
                    move_uploaded_file($BoNhoTamAnhBia,$DuongDanAnhFolerBia);

                    $NguoiDung->SuaTaiKhoanNguoiDungByNguoiDung($DuongDanAnhBia.$strTime.$TenAnhBia, $DuongDanDaiDienHienTai, $ID);
                    header("Location: ../index.php?page=SuaNguoiDung&ketqua=ThanhCong");

                    # Đổi đại diện không đổi bìa
                }else if($TenAnhDaiDien != "" && $TenAnhBia == ""){
                    # Đường dẫn cho copy file (cho hàm move)
                    $LocationFolderDaiDien = "../public/images/user-images/anh-daidien/";

                    # Đường dẫn cho hiển thị ảnh (lưu dưới database)
                    $DuongDanAnhDaiDien = "public/images/user-images/anh-daidien/";

                    # Định dạng lại tên ảnh và duy chuyển đi
                    $format = "%H-%M-%S-";
                    $timestamp = time();
                    $strTime = strftime($format, $timestamp);

                    $DuongDanAnhFolerDaiDien = $LocationFolderDaiDien.$strTime.$TenAnhDaiDien;

                    # Remove file (chưa kiểm tra)
                    # unlink("../".$DuongDanDaiDienHienTai);

                    # copy file
                    move_uploaded_file($BoNhoTamAnhDaiDien,$DuongDanAnhFolerDaiDien);

                    $NguoiDung->SuaTaiKhoanNguoiDungByNguoiDung($DuongDanBiaHienTai, $DuongDanAnhDaiDien.$strTime.$TenAnhDaiDien, $ID);
                    header("Location: ../index.php?page=SuaNguoiDung&ketqua=ThanhCong");
                }else{
                    header("Location: ../index.php?page=SuaNguoiDung&ketqua=ThanhCong");
                }
            break;
            case 'suanguoidungkhonganh':
                # lấy các dữ liệu được post qua 
                $ID = $_POST["ID"];
                $Email = $_POST["Email"];
                $MatKhau = $_POST["MatKhau"];
                $NhapLai = $_POST["NhapLai"];
                $TenHienThi = $_POST["TenHienThi"];
                $GioiTinh = $_POST["GioiTinh"];
                $SoDienThoai = $_POST["SoDienThoai"];
                $DiaChi = $_POST["DiaChi"];
                $NgayTao = $_POST["NgayTao"];
                $KieuTaiKhoan = $_POST["KieuTaiKhoan"];

                $md5 = md5($MatKhau, false);

                # khởi tạo đối tượng mới
                $NguoiDung = new NguoiDungClass();
                $KiemTraSoDienThoaiTonTai = $NguoiDung->KiemTraSoDienThoai($SoDienThoai);

                # kiểm tra các điều kiện cần thiết để thêm tài khoản khi quản trị thêm vào
                if(strlen($MatKhau) < 5 ){
                    header("Location: ../index.php?page=SuaNguoiDung&ketqua=MatKhauYeu");
                }else if($MatKhau != $NhapLai){
                    header("Location: ../index.php?page=SuaNguoiDung&ketqua=MatKhauKhongTrung");
                }else if($KiemTraSoDienThoaiTonTai >= 1){
                    header("Location: ../index.php?page=SuaNguoiDung&ketqua=TonTaiSoDienThoai");
                }else if(strlen($Email) <= 0 || strlen($TenHienThi) <= 0 || strlen($SoDienThoai) <= 0 || strlen($DiaChi) <= 0){
                    header("Location: ../index.php?page=SuaNguoiDung&ketqua=TrongThongTin");
                }else{
                    $NguoiDung->SuaTaiKhoanNguoiDungByAdmin($md5, $TenHienThi, $GioiTinh, $SoDienThoai, $DiaChi, $NgayTao,$KieuTaiKhoan, $ID);
                    header("Location: ../index.php?page=SuaNguoiDung&ketqua=ThanhCong");
                }
            break;
            case 'dangxuat':
                # Thoát khỏi session khi đã đăng nhập
                session_destroy();
                header("Location: ../index.php");
            break;
            case 'dangNhap':
                if(isset($_POST["Email"]) && isset($_POST["MatKhau"])){
                    # lấy user và pass được post qua
                    $email = $_POST["Email"];
                    $matkhau = $_POST["MatKhau"];

                    $md5 = md5($matkhau, false);

                    # check đăng nhập xem phải là user hay không
                    $nguoiDung = new NguoiDungClass();
                    $revalue_user = $nguoiDung->checkDangNhap($email, $md5);

                    # check đăng nhập xem phải là admin hay không
                    $quanTri = new QuanTriClass();
                    $revalue_admin = $quanTri->checkDangNhap($email, $md5);

                    # nếu là user thì lấy session user
                    if($revalue_user != NULL){
                        if($revalue_user == "user"){
                            $_SESSION['user'] = $email;
                            header("Location: ../index.php?ketqua=DangNhapThanhCong");
                        }
                    # nếu là admin thì lấy session admin
                    }else if($revalue_admin != null){
                      if($revalue_admin == "admin"){
                            $_SESSION['admin'] = $email;
                            header("Location: ../index.php?ketqua=DangNhapThanhCong");
                        }
                    # nếu không phải là admin hay user
                    }else{
                        header("Location: ../index.php?page=DangNhap&ketqua=SaiMatKhau");
                    }
                }
                break;
            case 'themdangki':
                # lấy các dữ liệu được post qua || trim() cắt khoẳng trắng đầu đuôi
                $Email = trim($_POST["EmailDangKi"]);
                $MatKhau = $_POST["MatKhau"];
                $NhapLai = $_POST["NhapLai"];
                $TenHienThi = trim($_POST["TenHienThi"]);
                $GioiTinh = $_POST["GioiTinh"];
                $SoDienThoai = trim($_POST["SoDienThoai"]);
                $DiaChi = trim($_POST["DiaChi"]);
                $NgayTao = date("Y-m-d H:i:s");

                # khởi tạo đối tượng mới
                $NguoiDung = new NguoiDungClass();
                $KiemTraTaiKhoanTonTai = $NguoiDung->KiemTraTaiKhoan($Email);
                $KiemTraSoDienThoaiTonTai = $NguoiDung->KiemTraSoDienThoai($SoDienThoai);

                # mã hóa mật khẩu
                $md5 = md5($MatKhau, false);

                # kiểm tra các điều kiện cần thiết để thêm tài khoản khi người dùng đăng kí
                if(strlen($MatKhau) < 5 ){
                    header("Location: ../index.php?page=DangKi&ketqua=MatKhauYeu");
                }else if($KiemTraTaiKhoanTonTai >= 1){
                    header("Location: ../index.php?page=DangKi&ketqua=TonTaiTaiKhoan");
                }else if(strlen($Email) <= 0 || strlen($TenHienThi) <= 0 || strlen($SoDienThoai) <= 0 || strlen($DiaChi) <= 0){
                    header("Location: ../index.php?page=DangKi&ketqua=TrongThongTin");
                }else if($MatKhau != $NhapLai){
                    header("Location: ../index.php?page=DangKi&ketqua=MatKhauKhongTrung");
                }else if($KiemTraSoDienThoaiTonTai >= 1){
                    header("Location: ../index.php?page=DangKi&ketqua=TonTaiSoDienThoai");
                }else if(strlen($TenHienThi) <= 1){
                    header("Location: ../index.php?page=DangKi&ketqua=TenHienThiNgan");
                }else{
                    $NguoiDung->ThemTaiKhoanNguoiDung($Email ,$md5, $TenHienThi, $GioiTinh, $SoDienThoai, $DiaChi, $NgayTao);
                    header("Location: ../index.php?page=DangKi&ketqua=ThanhCong");
                }
                break;
            case 'them':
                # lấy các dữ liệu được post qua 
                $Email = $_POST["Email"];
                $MatKhau = $_POST["MatKhau"];
                $TenHienThi = $_POST["Ho"] ." ". $_POST["Ten"];
                $GioiTinh = $_POST["GioiTinh"];
                $SoDienThoai = $_POST["SoDienThoai"];
                $DiaChi = $_POST["DiaChi"];
                $NgayTao = date("Y-m-d H:i:s");

                # khởi tạo đối tượng mới
                $NguoiDung = new NguoiDungClass();
                $KiemTraTaiKhoanTonTai = $NguoiDung->KiemTraTaiKhoan($Email);
                $KiemTraSoDienThoaiTonTai = $NguoiDung->KiemTraSoDienThoai($SoDienThoai);

                # mã hóa mật khẩu
                $md5 = md5($MatKhau, false);

                # kiểm tra các điều kiện cần thiết để thêm tài khoản khi quản trị thêm vào
                if(strlen($MatKhau) < 5 ){
                    header("Location: ../index.php?page=TrangQuanLi&quanli=NguoiDung&index=1&ketqua=MatKhauYeu");
                }else if($KiemTraTaiKhoanTonTai >= 1){
                    header("Location: ../index.php?page=TrangQuanLi&quanli=NguoiDung&index=1&ketqua=TonTaiTaiKhoan");
                }else if($KiemTraSoDienThoaiTonTai >= 1){
                    header("Location: ../index.php?page=TrangQuanLi&quanli=NguoiDung&index=1&ketqua=TonTaiSoDienThoai");
                }else if(strlen($TenHienThi) <= 1){
                    header("Location: ../index.php?page=TrangQuanLi&quanli=NguoiDung&index=1&ketqua=TenHienThiNgan");
                }else{
                    $NguoiDung->ThemTaiKhoanNguoiDung($Email,$md5, $TenHienThi, $GioiTinh, $SoDienThoai, $DiaChi, $NgayTao);
                    header("Location: ../index.php?page=TrangQuanLi&quanli=NguoiDung&index=1&ketqua=ThanhCong");
                }
                break;
            case 'xoa':
                $ID = $_POST["ID"]; 
                $NguoiDung = new NguoiDungClass();
                $NguoiDung-> XoaTaiKhoanNguoiDung($ID);
                header("Location: ../index.php?page=TrangQuanLi&quanli=NguoiDung&index=1&ketqua=ThanhCong");
                break;

            case 'sua':
                # lấy các dữ liệu được post qua 
                $ID = $_POST["ID"];
                $Email = $_POST["Email"];
                $MatKhau = $_POST["MatKhau"];
                $TenHienThi = $_POST["TenHienThi"];
                $GioiTinh = $_POST["GioiTinh"];
                $SoDienThoai = $_POST["SoDienThoai"];
                $DiaChi = $_POST["DiaChi"];
                $NgayTao = $_POST["NgayTao"];
                $KieuTaiKhoan = $_POST["KieuTaiKhoan"];

                # khởi tạo đối tượng mới
                $NguoiDung = new NguoiDungClass();

                # mã hóa mật khẩu
                $md5 = md5($MatKhau, false);

                 # kiểm tra các điều kiện cần thiết để thêm tài khoản khi quản trị thêm vào
                if(strlen($MatKhau) < 5 ){
                    header("Location: ../index.php?page=TrangQuanLi&quanli=NguoiDun&index=1g&ketqua=MatKhauYeu");
                }else if($KieuTaiKhoan == 1){
                    # thay đổi kiểu tài khoản || nếu đổi thành admin thì sẽ xóa tài khoản user hiện tại và add user đó thành admin
                    $NguoiDung = new NguoiDungClass();
                    $NguoiDung-> XoaTaiKhoanNguoiDung($ID);

                    $QuanTri = new QuanTriClass();
                    $QuanTri->ThemTaiKhoanQuanTri($Email, $md5, $TenHienThi, "public/images/default-images/no-image.png");
                    header("Location: ../index.php?page=TrangQuanLi&quanli=NguoiDung&index=1&ketqua=DaThanhAdmin");
                }else{
                    $NguoiDung->SuaTaiKhoanNguoiDungByAdmin($md5, $TenHienThi, $GioiTinh, $SoDienThoai, $DiaChi, $NgayTao,$KieuTaiKhoan, $ID);
                    header("Location: ../index.php?page=TrangQuanLi&quanli=NguoiDung&index=1&ketqua=ThanhCong");
                }

                break;   
            
            default:
                # code...
                break;
        }
    }
?>