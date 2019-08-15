<div id="ThemTaiKhoanNguoiDung" class="model-NguoiDung" onclick="closeModal()">
    <form id="formThemTaiKhoanNguoiDung" action="controller/NguoiDungController.php?yc=them" method="post" class="b-sd-sm model-content animation" enctype="multipart/form-data">
    <span onclick="document.getElementById('ThemTaiKhoanNguoiDung').style.display='none'" class=" d-flex justify-content-end close " title="Đóng">&times;</span>
    <h1>Đăng Kí</h1>
        <!-- One "tab" for each step in the form: -->
    
        <div class="container-fluid">
            <div class="tab">Họ Tên:
            
                <p><input placeholder="Họ & Tên Đệm..." oninput="this.className = ''" name="Ho"></p>
                <p><input placeholder="Tên..." oninput="this.className = ''" name="Ten"></p>
            
            </div>
            <div class="tab">
                    <div class="justify-content-start">Giới Tính:</div>
                    <div class="col-3"><input type="radio" name="GioiTinh" value="0" checked> Nam</div> 
                    <div class="col-3"><input type="radio" name="GioiTinh" value="1">Nữ</div> 
                
            </div>
            <div class="tab">Thông Tin Liên Hệ:
                <p><input placeholder="Số Điện Thoại..." oninput="this.className = ''" name="SoDienThoai"></p>
                <p><input placeholder="Địa Chỉ..." oninput="this.className = ''" name="DiaChi"></p>
            </div>
        
            <div class="tab">Đăng Kí:
            
                    <p><input placeholder="E-mail..." oninput="this.className = ''" name="Email"></p>
                    <p><input placeholder="Password..." oninput="this.className = ''" name="MatKhau" type="password"></p>
            </div>
            <div class="tab">
                
            </div>
            <div style="overflow:auto;" class="clear-float">
                <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Trở lại</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Tiếp tục</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </div>
    </form>
</div>