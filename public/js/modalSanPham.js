function XoaSanPham(ID, TenSanPham){
    document.getElementById("XoaSanPham").style.display = "block";
    document.getElementById("IDSanPhamXoa").value = ID;
    document.getElementById("TenSanPhamXoa").innerHTML = TenSanPham;
}


function Redirect(ID) {
    window.location="index.php?page=suaBaiDang&ID="+ID;
}

function XoaSanPhamAdmin(ID, TenSanPham){
    document.getElementById("XoaSanPhamAdmin").style.display = "block";
    document.getElementById("IDSanPhamXoaAdmin").value = ID;
    document.getElementById("TenSanPhamXoaAdmin").innerHTML = TenSanPham;
}

function DoDaiBinhLuan(){
    var lenght = 5000;

    var yourLenght = document.getElementById("DoDaiBL").value + "";
    var DemMoTa = document.getElementById("DemMoTaBinhLuan");

    var count = lenght - yourLenght.length;

    if(count > 0){
        DemMoTa.innerHTML = "<small style='color:#4caf50'>(Còn "+ count +" kí tự)</small>";
    }else{
        DemMoTa.innerHTML = "<small style='color:red'>(Không khả dụng "+ count +" kí tự)</small>";
    }
}
