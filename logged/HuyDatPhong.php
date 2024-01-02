<?php
include("../config.php");
$maphieudatphong=$_GET['MaPDP'];
$mapdv=$_GET['MaPDV'];

    $sql1="UPDATE  chitietdatphong,phong SET phong.TrangThai='Trống' WHERE chitietdatphong.MaPhong=phong.MaPhong AND chitietdatphong.MaPDP='".$maphieudatphong."' ";
    mysqli_query($con,$sql1);
    $sql2="DELETE FROM chitietdatphong WHERE MaPDP='".$maphieudatphong."'";
    mysqli_query($con,$sql2);
    if(isset($_GET['MaPDV'])){
        $sql3="DELETE FROM chitietdichvu WHERE MaPDV='".$mapdv."'";
        mysqli_query($con,$sql3);
    }
    $sql4="DELETE FROM phieudichvu WHERE MaPDP='".$maphieudatphong."'";
    mysqli_query($con,$sql4);
    $sql5="DELETE FROM hoadon WHERE MaPDP='".$maphieudatphong."'";
    mysqli_query($con,$sql5);
    $sql6="DELETE FROM phieudatphong WHERE MaPDP='".$maphieudatphong."'";
    mysqli_query($con,$sql6);
    echo "success";
?>