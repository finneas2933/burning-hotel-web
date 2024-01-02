<?php
session_start();
include("../config.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btn"])) {
    $ngayDen = $_POST['ngayDen'];
    $ngayDi = $_POST['ngayDi'];
    $thanhtoantruoc = $_POST['thanhtoantruoc'];
    $phaitra = $_POST['tongtien'];
    $phuongthucthanhtoan = $_POST['phuongthucthanhtoan'];
    $makhachhang = $_SESSION['makhachhang'];
    $maphong = $_POST["maphong"];
    $ngaytt = date("Y-m-d");

    $sql = "INSERT INTO phieudatphong VALUES ('','" . $makhachhang . "',NULL,'" . $phaitra . "','" . $thanhtoantruoc . "','" . $phuongthucthanhtoan . "','" . $ngaytt . "')";
    if (mysqli_query($con, $sql)) {
        $maphieudatphong = mysqli_insert_id($con);
    }

    $sql = "INSERT INTO chitietdatphong VALUES ('','" . $maphieudatphong . "','" . $maphong . "','" . $ngayDen . "','" . $ngayDi . "')";
    mysqli_query($con, $sql);

    $sql = "UPDATE phong SET TrangThai='Đầy' WHERE MaPhong='" . $maphong . "'";
    mysqli_query($con, $sql);

    if ($_SESSION["tiendichvu"] > 0) {
        $sql = "INSERT INTO phieudichvu VALUES ('','" . $maphieudatphong . "','" . $_SESSION["tiendichvu"] . "')";
        if (mysqli_query($con, $sql)) {
            $maphieudichvu = mysqli_insert_id($con);
        }

        foreach ($_SESSION['madichvu'] as $mdv) {
            $sql1 = "INSERT INTO chitietdichvu VALUES ('','" . $maphieudichvu . "','" . $mdv . "')";
            mysqli_query($con, $sql1);
        }
    }

    if ($thanhtoantruoc == $phaitra) {
        $trangthai = "Đã thanh toán";
    } else {
        if ($ngaytt < $ngayDen) {
            $trangthai = 'Đã đặt cọc';
        } else {
            $trangthai = 'Chờ thanh toán';
        }
    }

    $sql = "INSERT INTO hoadon VALUES ('','" . $maphieudatphong . "','" . $phaitra . "','" . $trangthai . "')";
    mysqli_query($con, $sql);

    echo $maphieudatphong;

}
?>