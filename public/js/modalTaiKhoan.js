/* Ẩn các modal quản trị (modal thêm xóa sửa) */

function closeModal(){
    var modalThem = document.getElementById("ThemTaiKhoanQuamTri");
    var modalSua = document.getElementById("SuaTaiKhoanQuanTri");
    var modalXoa = document.getElementById("XoaTaiKhoanQuanTri");

    var modalThemNguoiDung = document.getElementById("ThemTaiKhoanNguoiDung");
    var modalSuaNguoiDung = document.getElementById("SuaTaiKhoanNguoiDung");
    var modalXoaNguoiDung = document.getElementById("XoaTaiKhoanNguoiDung");

    var modalThemDanhMuc = document.getElementById("ThemDanhMuc");
    var modalSuaDanhMuc = document.getElementById("XoaDanhMuc");
    var modalXoaDanhMuc = document.getElementById("SuaDanhMuc");


    window.onclick = function(event) {
        if (event.target == modalThem) {
            modalThem.style.display = "none";
        }
        if (event.target == modalSua) {
            modalSua.style.display = "none";
        }
        if (event.target == modalXoa) {
            modalXoa.style.display = "none";
        }
        if (event.target == modalThemNguoiDung) {
            modalThemNguoiDung.style.display = "none";
        }
        if (event.target == modalSuaNguoiDung) {
            modalSuaNguoiDung.style.display = "none";
        }
        if (event.target == modalXoaNguoiDung) {
            modalXoaNguoiDung.style.display = "none";
        }
        if (event.target == modalThemDanhMuc) {
            modalThemDanhMuc.style.display = "none";
        }
        if (event.target == modalSuaDanhMuc) {
            modalSuaDanhMuc.style.display = "none";
        }
        if (event.target == modalXoaDanhMuc) {
            modalXoaDanhMuc.style.display = "none";
        }
    }
}

/* Hiển thị mật khẩu */
function showPass(){
    var pass = document.getElementById('MatKhau');
    if(pass.type == "password"){
        pass.type = "text";
    }else{
        pass.type = "password"
    }
}
