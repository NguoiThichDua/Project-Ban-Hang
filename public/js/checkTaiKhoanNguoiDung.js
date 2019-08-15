
/* Sử dụng cho model sửa tài khoản - Lấy các thông tin từ table để hiển thị lên form chỉnh sửa */
function SuaTaiKhoanNguoiDung(ID,Email,TenHienThi,MatKhau,GioiTinh,SoDienThoai,DiaChi,NgayTao, KieuTaiKhoan, DuongDanAnhBia, DuongDanAnhDaiDien){
   
    var modalSua = document.getElementById("SuaTaiKhoanNguoiDung");
    modalSua.style.display = 'block';

    var IDNguoiDung             = document.getElementById("IDNguoiDung");
    var EmailNguoiDung          = document.getElementById("EmailNguoiDung");
    var MatKhauNguoiDung        = document.getElementById("MatKhauNguoiDung");
    var SoDienThoaiNguoiDung    = document.getElementById("SoDienThoaiNguoiDung");
    var GioiTinhNguoiDung       = document.getElementById("GioiTinh");
    var DiaChiNguoiDung         = document.getElementById("DiaChiNguoiDung");
    var NgayTaoNguoiDung        = document.getElementById("NgayTaoNguoiDung");
    var TenHienThiNguoiDung     = document.getElementById("TenHienThiNguoiDung");

    var DuongDanAnhBiaNguoiDung          = document.getElementById("AnhBiaNguoiDung");
    var DuongDanAnhDaiDienNguoiDung      = document.getElementById("AnhDaiDienNguoiDung");
    // var KieuTaiKhoan     = document.getElementById("KieuTaiKhoan");

    IDNguoiDung.value = ID;
    EmailNguoiDung.value = Email;
    MatKhauNguoiDung.value = MatKhau;
    SoDienThoaiNguoiDung.value = SoDienThoai;
    GioiTinhNguoiDung.value = GioiTinh;
    DiaChiNguoiDung.value = DiaChi;
    NgayTaoNguoiDung.value = NgayTao;
    TenHienThiNguoiDung.value = TenHienThi;

    DuongDanAnhBiaNguoiDung.src = DuongDanAnhBia;
    DuongDanAnhDaiDienNguoiDung.src = DuongDanAnhDaiDien;
   
}

/* Sử dụng cho model xóa tài khoản - Lấy các thông tin từ table để hiển thị lên form chỉnh xóa */
function XoaTaiKhoanNguoiDung(ID,Email){
    var modalXoa = document.getElementById("XoaTaiKhoanNguoiDung");
    modalXoa.style.display = 'block';

    var IDNguoiDungXoa = document.getElementById("IDNguoiDungXoa");
    var TenNguoiDungXoa = document.getElementById("TenNguoiDungXoa");

    TenNguoiDungXoa.innerHTML = Email;  
    IDNguoiDungXoa.value = ID;
}

/* Thông báo lỗi ở file aler với id message */
function LoiNguoiDung(Loi){
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
    else if(Loi == "Email"){
        message.innerHTML = '\
        Thông báo    \
        <hr>\
        <strong>KHÔNG</strong> thể thay đổi Tên Tài Khoản';
        message.classList.add("bg-warning");
    }else if(Loi == "MatKhauNguoiDung"){
        message.innerHTML = '\
        Thông báo    \
        <hr>\
        <strong>Đây là mật khẩu người dùng</strong> cẩn thận thay đổi';
        message.classList.add("bg-warning");
    
    }else if(Loi == "ShowPass"){
        message.innerHTML = '\
        Thông báo    \
        <hr>\
        Bạn có thể ẩn hiện mật khẩu bằng phím <strong>Ctrl</strong> ';
        message.classList.add("bg-warning");
    
    }

    setTimeout(function(){
        message.style.display = 'none';
    },1750);
}