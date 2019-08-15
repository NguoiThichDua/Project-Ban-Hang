<?php
    $str1 = 'database/KetNoiDanhMuc.php';
    $str2 = '../database/KetNoiDanhMuc.php';
    $str3 = '../../../database/KetNoiDanhMuc.php';

    if(file_exists($str1)){
        $file = $str1;
    }else if(file_exists($str2)){
        $file = $str2;
    }else{
        $file = $str3;
    }
    require $file;
  
    class DanhMucClass extends databaseDanhMuc{

        #Kiểm tra tên danh mục
        public function checkTenDanhMuc($TenDanhMuc){
            $check = $this->connect->prepare("SELECT * FROM danhmuc WHERE TenDanhMuc = ? ");
            $check->setFetchMode(PDO::FETCH_OBJ);
            $check -> execute(array($TenDanhMuc));
            $count = count($check->fetchAll());
            return $count;
        }

        # Lấy tất cả tài khoản danh mục
        public function LayTatCaDanhMuc(){
            $danhmuc = $this->connect->prepare('SELECT * FROM danhmuc');
            $danhmuc->setFetchMode(PDO::FETCH_OBJ);
            $danhmuc->execute();
            $listdanhmuc = $danhmuc->fetchAll();
            return $listdanhmuc;
        }

        #Lấy thông tin 1 danh mục
        public function LayMotdanhmucDanhMuc($ID){
            $danhmuc = $this->connect->prepare("SELECT * FROM danhmuc Where ID = ?");
			$danhmuc->setFetchMode(PDO::FETCH_OBJ);
			$danhmuc->execute(array($ID));
			$list = $danhmuc->fetch(); 
			return $list;
        }
        
        # Thêm mới
        public function ThemDanhMuc($TenDanhMuc, $DuongDanAnh, $NgayTao){
            $cauLenh = 'INSERT INTO danhmuc (TenDanhMuc, DuongDanAnh, NgayTao) VALUES (?,?,?)';
            $themMoi = $this->connect->prepare($cauLenh);
            $themMoi->execute(array($TenDanhMuc, $DuongDanAnh, $NgayTao));
        }

        # Chỉnh sửa 
        public function SuaDanhMuc($TenDanhMuc, $DuongDanAnh, $ID){
            $cauLenh = 'UPDATE danhmuc SET TenDanhMuc = ?, DuongDanAnh = ? WHERE danhmuc.ID = ?';
            $capNhat = $this->connect->prepare($cauLenh);
            $capNhat->execute(array($TenDanhMuc, $DuongDanAnh, $ID));
        }

        # Xóa
        public function XoaDanhMuc($ID){
            $cauLenh = 'DELETE FROM danhmuc WHERE danhmuc.ID = ?';
            $xoa = $this->connect->prepare($cauLenh);
            $xoa->execute(array($ID));
        }
    }
?>