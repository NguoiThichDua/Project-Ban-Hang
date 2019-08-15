function checkMatKhau(){
    var MatKhauDangKi = document.getElementById("MatKhauDangKi").value + "";
    var DoDaiMatKhauDangKi = document.getElementById("DoDaiMatKhauDangKi");

    if(MatKhauDangKi.length <= 5){
        DoDaiMatKhauDangKi.innerHTML = "<small>Độ dài: " + MatKhauDangKi.length + " <span style='color:red'> (yếu)</span><small>";
    }else if(MatKhauDangKi.length > 5 && MatKhauDangKi.length <= 10){
        DoDaiMatKhauDangKi.innerHTML = "<small>Độ dài: " + MatKhauDangKi.length + " <span style='color:orange'> (vừa)</span><small>";
    }else if(MatKhauDangKi.length > 10){
        DoDaiMatKhauDangKi.innerHTML = "<small>Độ dài: " + MatKhauDangKi.length + " <span style='color:MediumSeaGreen'> (mạnh)</span><small>";
    }
}

function checkNhapLaiMatKhau(){
    var MatKhauDangKi = document.getElementById("MatKhauDangKi").value + "";
    var MatKhauNhapLai = document.getElementById("NhapLaiDangKi").value + "";
   
    var CheckGiongNhau = document.getElementById("NhapLai");

    if(MatKhauDangKi != MatKhauNhapLai){
        CheckGiongNhau.innerHTML = "<small style='color:red'>Mật khẩu không trùng</small>";
    }else{
        CheckGiongNhau.innerHTML = "<small style='color:MediumSeaGreen'>OK...!</small>";
    } 
}

function showPassDangKi(event){ 
    if(event.keyCode == 17){   
        var pass = document.getElementById('MatKhauDangKi');
        if(pass.type == "password"){
            pass.type = "text";
        }else{
            pass.type = "password"
        }
      
    }
}
function showPassDangNhap(){
    var pass = document.getElementById('MatKhauDangNhap');
    if(pass.type == "password"){
        pass.type = "text";
    }else{
        pass.type = "password"
    }
}

function checkEmailDangKi(){
    /* Xử dụng Ajax để load thông tin email đã được sử dụng chưa ngay và luôn */
    $(document).ready(function(e) {
        var email = document.getElementById("Email").value;

        /* #ShowCheckEmailDangKi sẻ load dữ liệu được xử lí ở file checkEmail.php */
        $("#ShowCheckEmailDangKi").load("view/component/dangki-dangnhap/checkEmail.php" , {email: email});
   });

}

function checkDoDaiMoTa(){
    var lenght = 5000;

    var yourLenght = document.getElementById("MoTaThemBaiDang").value + "";
    var DemMoTa = document.getElementById("DemMoTa");

    var count = lenght - yourLenght.length;

    if(count > 0){
        DemMoTa.innerHTML = "<small style='color:#4caf50'>Còn "+ count +" kí tự</small>";
    }else{
        DemMoTa.innerHTML = "<small style='color:red'>Không khả dụng "+ count +" kí tự</small>";
    }
}





