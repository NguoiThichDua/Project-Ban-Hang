<?php
    $str1 = 'database/KetNoiQuanTri.php';
	$str2 = '../database/KetNoiQuanTri.php';

	if(file_exists($str1)){
		$file = $str1;
	}
	else{
		$file = $str2;
	}
	require $file;

    class QuanTriClass extends databaseQuanTri{
    #Kiểm tra đăng nhập
        public function checkDangNhap($tentaikhoan, $matkhau){
            $check = $this->connect->prepare("SELECT * FROM quantri WHERE TenTaiKhoan=? AND MatKhau=?");
            $check->setFetchMode(PDO::FETCH_OBJ);
            $check->execute(array($tentaikhoan, $matkhau));
            $list = $check->fetch();
            
            if($list != NULL){
                return $list->KieuTaiKhoan;
            }
            else{
                return NULL;
            }
        }

        # Lấy tất cả tài khoản quản trị
        public function LayTatCaTaiKhoanQuanTri(){
            $taiKhoan = $this->connect->prepare('Select * from quantri');
            $taiKhoan->setFetchMode(PDO::FETCH_OBJ);
            $taiKhoan->execute();
            $listTaiKhoan = $taiKhoan->fetchAll();
            return $listTaiKhoan;
        }

        #Lấy thông tin 1 tài khoản
        public function LayMotTaiKhoanQuanTri($ID){
            $taiKhoan = $this->connect->prepare("Select * from quantri Where ID = ?");
			$taiKhoan->setFetchMode(PDO::FETCH_OBJ);
			$taiKhoan->execute(array($ID));
			$list = $taiKhoan->fetch(); 
			return $list;
        }

        # Kiểm tra tài khoản có tồn tại không
        public function KiemTraTaiKhoan($TenTaiKhoan){
            $checkTK = $this->connect->prepare("SELECT * FROM quantri WHERE TenTaiKhoan=?");
            $checkTK->setFetchMode(PDO::FETCH_OBJ);
            $checkTK->execute(array($TenTaiKhoan));
            $count = count($checkTK->fetchAll());
            return $count;
        }
        
        # Thêm tài khoản mới
        public function ThemTaiKhoanQuanTri($TenTaiKhoan, $MatKhau, $TenHienThi, $DuongDanAnh){
            $cauLenh = 'INSERT INTO quantri (TenTaiKhoan, MatKhau, TenHienThi, DuongDanAnh) VALUES (?,?,?,?)';
            $themMoi = $this->connect->prepare($cauLenh);
            $themMoi->execute(array($TenTaiKhoan, $MatKhau, $TenHienThi, $DuongDanAnh));
        }

        # Chỉnh sửa tài khoản
        public function SuaTaiKhoanQuanTri($MatKhau, $TenHienThi, $DuongDanAnh, $ID){
            $cauLenh = 'UPDATE quantri SET MatKhau = ?, TenHienThi = ?, DuongDanAnh = ? WHERE quantri.ID = ?';
            $capNhat = $this->connect->prepare($cauLenh);
            $capNhat->execute(array($MatKhau, $TenHienThi, $DuongDanAnh, $ID));
        }

        # Xóa tài khoản
        public function XoaTaiKhoanQuanTri($ID){
            $cauLenh = 'DELETE FROM quantri WHERE quantri.ID = ?';
            $xoa = $this->connect->prepare($cauLenh);
            $xoa->execute(array($ID));
        }
    }
?>