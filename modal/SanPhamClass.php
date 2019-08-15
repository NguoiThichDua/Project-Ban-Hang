<?php
    $str1 = 'database/KetNoiSanPham.php';
    $str2 = '../database/KetNoiSanPham.php';
    $str3 = '../../../database/KetNoiSanPham.php';

    if(file_exists($str1)){
        $file = $str1;
    }else if(file_exists($str2)){
        $file = $str2;
    }else{
        $file = $str3;
    }
    require $file;
  
    class SanPhamClass extends databaseSanPham{

        #Kiểm tra tên sản phẩm
        public function checkTenSanPham($TenSanPham){
            $check = $this->connect->prepare("SELECT * FROM sanpham WHERE TenSanPham = ? ");
            $check->setFetchMode(PDO::FETCH_OBJ);
            $check -> execute(array($TenSanPham));
            $count = count($check->fetchAll());
            return $count;
        }

        # Lấy tất cả tài khoản sản phẩm
        public function LayTatCaSanPham(){
            $sanpham = $this->connect->prepare('SELECT * FROM sanpham');
            $sanpham->setFetchMode(PDO::FETCH_OBJ);
            $sanpham->execute();
            $listsanpham = $sanpham->fetchAll();
            return $listsanpham;
        }

        # Lấy tất cả tài khoản sản phẩm của 1 user
        public function LayTatCaSanPhamCuaUser($ID){
            $sanpham = $this->connect->prepare('SELECT * FROM sanpham WHERE ID_User = ?');
            $sanpham->setFetchMode(PDO::FETCH_OBJ);
            $sanpham->execute(array($ID));
            $listsanpham = $sanpham->fetchAll();
            return $listsanpham;
        }

        #Lấy thông tin 1 sản phẩm
        public function LayMotSanPham($ID){
            $sanpham = $this->connect->prepare("SELECT * FROM sanpham Where ID = ?");
			$sanpham->setFetchMode(PDO::FETCH_OBJ);
			$sanpham->execute(array($ID));
			$list = $sanpham->fetch(); 
			return $list;
        }
        
        # Thêm mới 
        public function ThemSanPhamKhongAnh($TenSanPham, $MoTa, $Gia, $ID_DanhMuc, $ID_User, $NgayTao, $Link, $AnhDemo_1, $AnhDemo_2, $AnhDemo_3){
            $cauLenh = 'INSERT INTO sanpham (TenSanPham, MoTa, Gia, ID_DanhMuc, ID_User, NgayTao, Link, AnhDemo_1, AnhDemo_2, AnhDemo_3) VALUES (?,?,?,?,?,?,?,?,?,?)';
            $themMoi = $this->connect->prepare($cauLenh);
            $themMoi->execute(array($TenSanPham, $MoTa, $Gia, $ID_DanhMuc, $ID_User, $NgayTao, $Link, $AnhDemo_1, $AnhDemo_2, $AnhDemo_3));
        }

        # Chỉnh sửa 
        public function SuaSanPhamKhongAnh($TenSanPham, $MoTa, $Gia, $ID_DanhMuc, $Link, $ID){
            $cauLenh = 'UPDATE sanpham SET TenSanPham = ?, MoTa = ?, Gia = ?, ID_DanhMuc = ?, Link = ? WHERE sanpham.ID = ?';
            $capNhat = $this->connect->prepare($cauLenh);
            $capNhat->execute(array($TenSanPham, $MoTa, $Gia, $ID_DanhMuc, $Link, $ID));
        }
        public function SuaSanPhamCoAnh($AnhDemo_1, $AnhDemo_2, $AnhDemo_3, $ID){
            $cauLenh = 'UPDATE sanpham SET AnhDemo_1 = ?, AnhDemo_2 = ?, AnhDemo_3 = ? WHERE sanpham.ID = ?';
            $capNhat = $this->connect->prepare($cauLenh);
            $capNhat->execute(array($AnhDemo_1, $AnhDemo_2, $AnhDemo_3, $ID));
        }

        # Xóa
        public function XoaSanPham($ID){
            $cauLenh = 'DELETE FROM sanpham WHERE sanpham.ID = ?';
            $xoa = $this->connect->prepare($cauLenh);
            $xoa->execute(array($ID));
        }
    }
?>