var ngayhientai = new Date();
function chonngaydi() {
    var ngayden = new Date(document.getElementById("ngayden").value);
    var ngaydi = new Date(document.getElementById("ngaydi").value);
    if(ngaydi>ngayhientai){
        if(ngayden > ngayhientai && ngayden<ngaydi){
            document.getElementById("thongbaongaydi").innerHTML = "";
            document.getElementById("thongbaongayden").innerHTML = "";
            localStorage.setItem("ngayden", ngayden.toISOString().split('T')[0]);
            localStorage.setItem("ngaydi", ngaydi.toISOString().split('T')[0]);
        }
        else if(ngayden > ngayhientai && ngayden>ngaydi){
            document.getElementById("thongbaongaydi").innerHTML = "Ngày đi không hợp lệ";
        }
        else if(ngayden<ngayhientai){
            document.getElementById("thongbaongayden").innerHTML = "Ngày đến không hợp lệ";
            document.getElementById("thongbaongaydi").innerHTML = "";
        }
    }
    else{
        document.getElementById("thongbaongaydi").innerHTML = "Ngày đi không hợp lệ";
    }
   

}

function chonngayden() {
    var ngayden = new Date(document.getElementById("ngayden").value);
    var ngaydi = new Date(document.getElementById("ngaydi").value);
    if(ngayden>ngayhientai){
        if(ngaydi > ngayhientai && ngayden<ngaydi){
            document.getElementById("thongbaongaydi").innerHTML = "";
            document.getElementById("thongbaongayden").innerHTML = "";
            localStorage.setItem("ngayden", ngayden.toISOString().split('T')[0]);
            localStorage.setItem("ngaydi", ngaydi.toISOString().split('T')[0]);
        }
        else if(ngaydi > ngayhientai && ngayden>ngaydi){
            document.getElementById("thongbaongayden").innerHTML = "Ngày đến không hợp lệ";
        }
        else if(ngaydi<ngayhientai){
            document.getElementById("thongbaongayden").innerHTML = "";
            document.getElementById("thongbaongaydi").innerHTML = "Ngày đi không hợp lệ";
        }
    }
    else{
        document.getElementById("thongbaongayden").innerHTML = "Ngày đến không hợp lệ";
    }
}