<?php
    class databaseDanhMuc{
        public $connect;
        public function databaseDanhMuc(){
            try {
                $this->connect = new PDO('mysql:host=localhost;dbname=BanHang;charset=utf8','root','');
                $this->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (Throwable $th) {
                echo "Kết nối cơ sở dữ liệu thất bại - Không thể thực hiện các chức năng liên quan";
            }
        }
    }
?>