/* Kiểm tra độ dài tài khoản và hiển thị lên client - kiểm tra khoản trắng và thay bằng - */
function checkTenTaiKhoan(){
    var tenTaiKhoan = document.getElementById('TenTaiKhoan').value + ""; 
    for (let index = 0; index < tenTaiKhoan.length; index++) {
        tenTaiKhoan = tenTaiKhoan.replace(" ", "-");
    }
    if (tenTaiKhoan.length <= 5) {
        document.getElementById('HienThiTen').value = tenTaiKhoan;
        document.getElementById('ThongBao').innerHTML = " <div style='color:red;'>(Độ Dài Tài Khoản Quá Ngắn)</div>";
    }else{
        document.getElementById('HienThiTen').value = tenTaiKhoan;
        document.getElementById('ThongBao').innerHTML = "";
    }
    
}

/* Kiểm tra độ dài mật khẩu và hiển thị lên client */
function checkMatKhau(){
    var matKhau = document.getElementById('MatKhau').value + "";

    if (matKhau.length <= 5) {
        document.getElementById('HienThiMatKhau').innerHTML = "Độ dài: "+matKhau.length + " <span style='color:red;'>(Độ Dài Mật Khẩu Quá Ngắn)</span>";
    }else if(matKhau.length > 5 && matKhau.length <= 10 ){
        document.getElementById('HienThiMatKhau').innerHTML = "Độ dài: "+matKhau.length + " <span style='color:#D7DF01;'>(Độ Dài Mật Khẩu Trung Bình)</span>";
    }else if(matKhau.length > 10){
        document.getElementById('HienThiMatKhau').innerHTML = "Độ dài: "+matKhau.length + " <span style='color:green;'>(Độ Dài Mật Khẩu Tốt)</span>";
    }
}

/* Kiểm tra tên hiển thị và hiển thị lên client*/
function checkTenHienThi(){
    var TenHienThi = document.getElementById('TenHienThi').value;
    document.getElementById('HienThiTenHienThi').innerHTML = "Tên hiển thị: <span style='color:green;'>"+ TenHienThi + "</span>";
}

/* Sử dụng cho model sửa tài khoản - Lấy các thông tin từ table để hiển thị lên form chỉnh sửa */
function SuaTaiKhoan(ID, TenTaiKhoan, MatKhau, TenHienThi,DuongDan){
   
    var modalSua = document.getElementById("SuaTaiKhoanQuanTri");
    modalSua.style.display = 'block';

    var IDQuanTri           = document.getElementById("IDQuanTri");
    var TenTaiKhoanQuanTri  = document.getElementById("TenTaiKhoanQuanTri");
    var MatKhauQuanTri      = document.getElementById("MatKhauQuanTri");
    var TenHienThiQuanTri   = document.getElementById("TenHienThiQuanTri");
    var HinhAnhQuanTri      = document.getElementById("HinhAnh");
    var DuongDanInput       = document.getElementById("DuongDanInput");

    var DuongDanMacDinh     = DuongDan;

    IDQuanTri.value = ID;
    TenTaiKhoanQuanTri.value = TenTaiKhoan;
    MatKhauQuanTri.value = MatKhau;
    TenHienThiQuanTri.value = TenHienThi;
    HinhAnhQuanTri.src = DuongDanMacDinh;
    DuongDanInput.value =DuongDanMacDinh;
}

/* Sử dụng cho model xóa tài khoản - Lấy các thông tin từ table để hiển thị lên form chỉnh xóa */
function XoaTaiKhoan(ID,TenTaiKhoan){
    var modalXoa = document.getElementById("XoaTaiKhoanQuanTri");
    modalXoa.style.display = 'block';

    var IDQuanTriXoa = document.getElementById("IDQuanTriXoa");
    var TenQuanTriXoa = document.getElementById("TenQuanTriXoa");

    TenQuanTriXoa.innerHTML = TenTaiKhoan;  
    IDQuanTriXoa.value = ID;
}

/* Thông báo lỗi ở file aler với id message */
function Loi(Loi){
    var message = document.getElementById('message');
    message.style.display = 'block';

    message.classList.remove("bg-danger");
    message.classList.remove("bg-warning");

    if(Loi == "ID"){
        message.innerHTML = '\
        Thông báo    \
        <hr>\
        <strong>KHÔNG</strong> thể thay đổi ID';
        message.classList.add("bg-danger");
    
    }
    else if(Loi == "TenTaiKhoan"){
        message.innerHTML = '\
        Thông báo    \
        <hr>\
        <strong>KHÔNG</strong> thể thay đổi Tên Tài Khoản';
        message.classList.add("bg-warning");
    }

    setTimeout(function(){
        message.style.display = 'none';
    },1750);
}