<?php
    $str1 = 'database/KetNoiNguoiDung.php';
    $str2 = '../database/KetNoiNguoiDung.php';
    $str3 = '../../../database/KetNoiNguoiDung.php';

    if(file_exists($str1)){
        $file = $str1;
    }else if(file_exists($str2)){
        $file = $str2;
    }else{
        $file = $str3;
    }
    require $file;
  
    class NguoiDungClass extends databaseNguoiDung{
        
        #Kiểm tra đăng nhập
        public function checkDangNhap($email, $matkhau){
            $check = $this->connect->prepare("SELECT * FROM nguoidung WHERE Email=? AND MatKhau=?");
            $check->setFetchMode(PDO::FETCH_OBJ);
            $check->execute(array($email, $matkhau));
            $list = $check->fetch();
            
            if($list != NULL){
                return $list->KieuTaiKhoan;
            }
            else{
                return NULL;
                }
            }

        #Kiểm tra tên tài khoản
        public function checkEmail($email){
            $check = $this->connect->prepare("SELECT * FROM nguoidung WHERE email=? ");
            $check->setFetchMode(PDO::FETCH_OBJ);
            $check -> execute(array($email));
            $count = count($check->fetchAll());
            return $count;
        }

        # Lấy tất cả tài khoản quản trị
        public function LayTatCaTaiKhoanNguoiDung(){
            $taiKhoan = $this->connect->prepare('SELECT * FROM nguoidung');
            $taiKhoan->setFetchMode(PDO::FETCH_OBJ);
            $taiKhoan->execute();
            $listTaiKhoan = $taiKhoan->fetchAll();
            return $listTaiKhoan;
        }

        #Lấy thông tin 1 tài khoản
        public function LayMotTaiKhoanNguoiDung($ID){
            $taiKhoan = $this->connect->prepare("SELECT * FROM nguoidung Where ID = ?");
			$taiKhoan->setFetchMode(PDO::FETCH_OBJ);
			$taiKhoan->execute(array($ID));
			$list = $taiKhoan->fetch(); 
			return $list;
        }

        #Lấy thông tin 1 tài khoản
        public function LayMotTaiKhoanNguoiDungEmail($Email){
            $taiKhoan = $this->connect->prepare("SELECT * FROM nguoidung Where Email = ?");
            $taiKhoan->setFetchMode(PDO::FETCH_OBJ);
            $taiKhoan->execute(array($Email));
            $list = $taiKhoan->fetch(); 
            return $list;
        }

        # Kiểm tra tài khoản có tồn tại không
        public function KiemTraTaiKhoan($TenTaiKhoan){
            $checkTK = $this->connect->prepare("SELECT * FROM nguoidung WHERE Email=?");
            $checkTK->setFetchMode(PDO::FETCH_OBJ);
            $checkTK->execute(array($TenTaiKhoan));
            $count = count($checkTK->fetchAll());
            return $count;
        }

        # Kiểm tra số điện thoại đã được sử dụng chưa
        public function KiemTraSoDienThoai($SoDienThoai){
            $checkSDT = $this->connect->prepare("SELECT * FROM nguoidung WHERE SoDienThoai=?");
            $checkSDT->setFetchMode(PDO::FETCH_OBJ);
            $checkSDT->execute(array($SoDienThoai));
            $count = count($checkSDT->fetchAll());
            return $count;
        }
        
        # Thêm tài khoản mới
        public function ThemTaiKhoanNguoiDung($Email ,$MatKhau, $TenHienThi, $GioiTinh, $SoDienThoai, $DiaChi, $NgayTao){
            $cauLenh = 'INSERT INTO nguoidung (Email, MatKhau, TenHienThi, GioiTinh, SoDienThoai, DiaChi, NgayTao) VALUES (?,?,?,?,?,?,?)';
            $themMoi = $this->connect->prepare($cauLenh);
            $themMoi->execute(array($Email, $MatKhau, $TenHienThi, $GioiTinh, $SoDienThoai, $DiaChi, $NgayTao));
        }

        # Chỉnh sửa tài khoản
        public function SuaTaiKhoanNguoiDungByAdmin($MatKhau, $TenHienThi, $GioiTinh, $SoDienThoai, $DiaChi, $NgayTao,$KieuTaiKhoan, $ID){
            $cauLenh = 'UPDATE nguoidung SET MatKhau = ?, TenHienThi = ?, GioiTinh = ?, SoDienThoai = ?, DiaChi = ?, NgayTao = ?, KieuTaiKhoan = ? WHERE nguoidung.ID = ?';
            $capNhat = $this->connect->prepare($cauLenh);
            $capNhat->execute(array($MatKhau, $TenHienThi, $GioiTinh, $SoDienThoai, $DiaChi, $NgayTao,$KieuTaiKhoan, $ID));
        }

        # Chỉnh sửa tài khoản
        public function SuaTienTaiKhoanNguoiDung($Tien, $ID){
            $cauLenh = 'UPDATE nguoidung SET Tien = ? WHERE nguoidung.ID = ?';
            $capNhat = $this->connect->prepare($cauLenh);
            $capNhat->execute(array($Tien, $ID));
        }

        # Chỉnh sửa tài khoản (ảnh)
        public function SuaTaiKhoanNguoiDungByNguoiDung($DuongDanAnhBia, $DuongDanAnhDaiDien, $ID){
        $cauLenh = 'UPDATE nguoidung SET DuongDanAnhBia = ?, DuongDanAnhDaiDien = ? WHERE nguoidung.ID = ?';
        $capNhat = $this->connect->prepare($cauLenh);
        $capNhat->execute(array($DuongDanAnhBia, $DuongDanAnhDaiDien, $ID));
        }

        # Xóa tài khoản
        public function XoaTaiKhoanNguoiDung($ID){
            $cauLenh = 'DELETE FROM nguoidung WHERE nguoidung.ID = ?';
            $xoa = $this->connect->prepare($cauLenh);
            $xoa->execute(array($ID));
        }
    }
?>