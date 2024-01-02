<?php
    include('../config.php');
    $maphong = $_GET['maphong'];
    $sql = "UPDATE phong SET TrangThai='Trống' WHERE MaPhong='" . $maphong . "'";
    if (mysqli_query($con, $sql)) {
        echo 'Cập nhật thành công';
    } else {
        echo 'Cập nhật không thành công' ;
    }
    ?>
