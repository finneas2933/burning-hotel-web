<?php
session_start();
    require_once('../config.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btn_datphong"])) {
        $mahoadon = $_POST['mahoadon'];
        $tongtien = $_POST['tongtien'];
        $sql = "INSERT INTO phieumonan VALUES ('','" . $mahoadon . "','" . $tongtien . "')";
        if (mysqli_query($con, $sql)) {
            $maphieudatmon = mysqli_insert_id($con);
        }
        $sql = "SELECT * FROM giohang Where makhachhang= '" . $_SESSION['makhachhang'] . "'";
        $result = mysqli_query($con, $sql);
        $giohangs = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $giohangs[] = array(
                    'mamonan' => $row['mamonan'], 'soluong' => $row['soluong']
                );
            }
        }

        foreach ($giohangs as $key => $value) {
            $sql = "INSERT INTO chitietdatmon VALUES ('','" . $maphieudatmon . "','" . $value["mamonan"] . "','" . $value["soluong"] . "','')";
            mysqli_query($con, $sql);
        }
        $sql = "UPDATE hoadon SET TongTien= TongTien+$tongtien WHERE MaHoaDon= $mahoadon ";
        mysqli_query($con, $sql);
        $sql = "DELETE  FROM giohang WHERE makhachhang= '" . $_SESSION['makhachhang'] . "'";
        mysqli_query($con, $sql);
       
    }