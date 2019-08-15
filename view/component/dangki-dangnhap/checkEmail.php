<?php
    # Từ hàm checkEmailDangKi() của checkDangKi-DangNhap lấy được email để kiểm tra tài khoản email đã được sử dụng chưa

    require "../../../modal/NguoiDungClass.php";

   if(isset($_REQUEST['email'])){
        $email = $_REQUEST['email'];

        $check = new NguoiDungClass();
        $count = $check->checkEmail($email);
       
        if($count == 1){
            echo "<small style='color: red'>Email đã được sử dụng</small>";
        }else if($count == 0){
            echo "<small style='color: MediumSeaGreen'>Bạn có thể sử dụng email này</small>";
        }else{
            echo "<small style='color: red'>Lỗi không xác định</small>";
        }
        
        
    }
?>