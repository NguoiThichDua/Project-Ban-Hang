<div class="col-10 mt-2">
    <?php
        if(isset($_GET['ketqua'])){
        $ketQua = $_GET['ketqua'];
            # Nhận biến kết quả và kiểm tra để in ra thông báo
           switch ($ketQua) {
               case 'ThanhCong':
               ?>
                   <div class='alert success' id="alert">
                        <strong>Thành công!</strong> Thao tác đã được thực hiện...! 
                        <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>
                        <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                    </div>
                <?php
                   break;
                case 'ThatBai':
                ?>
                    <div class='alert danger' id="alert">
                        <strong>Thất bại!</strong> Thao tác không thành công...!
                        <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                        <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                    </div>
                <?php
                   break;
                case 'TonTaiTaiKhoan':
                   ?>
                       <div class='alert danger' id="alert">
                           <strong>Thất bại!</strong> Tên tài khoản này đã được sử dụng...! 
                           <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                           <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                   <?php
                      break;
                case 'TonTaiSoDienThoai':
                    ?>
                        <div class='alert warning' id="alert">
                            <strong>Thất bại!</strong> Số điện thoại này đã được sử dụng...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'TenTaiKhoanQuaNgan':
                ?>
                    <div class='alert warning' id="alert">
                        <strong>Thất bại!</strong> Tên tài khoản quá ngắn... Tên tài khoản phải từ <strong>6 kí tự trở lên</strong>...! 
                        <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                        <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                    </div>
                <?php
                    break;
                case 'MatKhauYeu':
                    ?>
                        <div class='alert warning' id="alert">
                            <strong>Thất bại!</strong> Mật khẩu không an toàn... Mật khẩu phải từ <strong>6 kí tự trở lên</strong>...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'TenHienThiNgan':
                    ?>
                        <div class='alert warning' id="alert">
                            <strong>Thất bại!</strong>Tên tài khoản quá ngắn...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'DaThanhAdmin':
                    ?>
                        <div class='alert success' id="alert">
                            <strong>Thành công!</strong> Đã thay đổi tài khoản thành admin...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'MatKhauKhongTrung':
                    ?>
                        <div class='alert danger' id="alert">
                            <strong>Thất bại!</strong> Mật khẩu và mật khẩu nhập lại không khớp...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'SaiMatKhau':
                    ?>
                        <div class='alert danger' id="alert">
                            <strong>Thất bại!</strong> Mật khẩu hoặc tài khoản không đúng...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'DangNhapThanhCong':
                    ?>
                        <div class='alert success' id="alert">
                            <strong>Thành công!</strong> Đã đăng nhập...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'khongcoquyen':
                    ?>
                        <div class='alert warning' id="alert">
                            <strong>Thất bại!</strong> bạn không có quyền cho tác vụ này...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'TrongThongTin':
                    ?>
                        <div class='alert warning' id="alert">
                            <strong>Thất bại!</strong> Bạn đã bỏ trống thông tin...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'LoiTaiAnh':
                    ?>
                        <div class='alert warning' id="alert">
                            <strong>Thất bại!</strong> Tải ảnh lên thất bại...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'comment_true':
                    ?>
                        <div class='alert success w-100' id="alert">
                            <strong>Thành công!</strong> Đã thêm bình luận...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'commentxoa_true':
                    ?>
                        <div class='alert success w-100' id="alert">
                            <strong>Thành công!</strong> Đã xóa bình luận...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'khongdutien':
                    ?>
                        <div class='alert success w-100' id="alert">
                            <strong>Thất bại!</strong> Không đủ tiền để mua...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
                case 'damua':
                    ?>
                        <div class='alert success w-100' id="alert">
                            <strong>Thành công!</strong> đã giao dịch...! 
                            <span onclick="document.getElementById('alert').style.display='none'" class="  close2 " title="Đóng">&times;</span>   
                            <small class="float-right text-white">(Nhấn phím bất kì để đóng)</small>
                        </div>
                    <?php
                    break;
               default:
                   # code...
                   break;
           }
        }else{

        }
    ?>
</div>




