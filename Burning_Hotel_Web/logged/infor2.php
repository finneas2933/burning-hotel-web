<?php
 session_start();
 require_once('../config.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btn"])){
        $matkhau = $_POST["password"];
        $sql1 = "SELECT * FROM khachhang WHERE ID = '" . $_SESSION['makhachhang'] . "' AND PassWord = '" . $matkhau . "'";
        $result = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result) == 0) {
            $response='Mật khẩu không đúng!  ' ;
        }
        else{
            $hoten = $_POST["ten"];
            $email = $_POST["email"];
            $sdt = $_POST["sdt"];
            $cmnd = $_POST["cmnd"];
            $diachi = $_POST['diachi'];
            $gioitinh = $_POST['gender'];
            $sql = "SELECT * FROM khachhang WHERE Email = '" . $email . "' OR SDT = '" . $sdt . "' OR ID ='" . $_SESSION['makhachhang'] . "' ";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 1) {
                $response='Email hoặc mật khẩu đã tồn tại! Vui lòng kiểm tra lại';
            } else {
                $sql = "UPDATE khachhang SET HoTen='" . $hoten . "', SDT='" . $sdt . "', Email='" . $email . "',DiaChi='" . $diachi . "',GioiTinh='" . $gioitinh . "', CMND='" . $cmnd . "' WHERE SDT='" . $_SESSION['sdt'] . "'";
                $result = mysqli_query($con, $sql);
                if ($result == true) {
                    $response="Cập Nhập Thành Công!";
                }
            }
        }
        echo $response;
        
    }

    ?>