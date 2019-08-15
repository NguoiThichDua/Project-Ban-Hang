function SuaDanhMuc(ID, Ten, DuongDanAnh){
    var IDDanhMuc = ID;
    var TenDanhMuc = Ten;
    var DuongDanAnhDanhMuc = DuongDanAnh;

    document.getElementById("SuaDanhMuc").style.display = "block";

    document.getElementById("IDDanhMuc").value = IDDanhMuc;
    document.getElementById("TenDanhMuc").value = TenDanhMuc;
    document.getElementById("HinhAnhDanhMuc").src = DuongDanAnhDanhMuc;
    document.getElementById("DuongDanInputDanhMuc").value = DuongDanAnhDanhMuc;
}

function XoaDanhMuc(ID, TenDanhMuc){
    document.getElementById("XoaDanhMuc").style.display = "block";

    document.getElementById("IDDanhMucXoa").value = ID;
    document.getElementById("TenDanhMucXoa").innerHTML = TenDanhMuc;
}