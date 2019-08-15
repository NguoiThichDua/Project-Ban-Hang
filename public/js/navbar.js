/* 
    When the user scrolls down, hide the navbar. 
    When the user scrolls up, show the navbar 
*/

var afterScroll = window.pageYOffset;      

/* Sử dụng cho navbar menu */
window.onscroll = function(){
    var beforeScroll = window.pageYOffset;
    if(afterScroll > beforeScroll){
        document.getElementById('navbar').style.top = "0";
    }else{
        document.getElementById('navbar').style.top = "-50px";
    }

    afterScroll = beforeScroll;
}

/* Sử dụng cho thông báo alert - Khi ấn phím bất kì thì thông báo với id alert sẽ biến mất */
window.onkeypress = function(){
    var alertSuccess = document.getElementById("alert");

    if(alertSuccess != null){
        alertSuccess.style.display = 'none';
    }

    
}