<?php
    session_start();
    include("../config.php");

    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    if (!isset($_SESSION['makhachhang'])) {
        echo json_encode(array('success' => false, 'message' => 'Bạn phải đăng nhập để thêm món vào giỏ hàng.'));
        exit();
    }

    $sqlCheckExistence = "SELECT * FROM giohang WHERE makhachhang = $_SESSION[makhachhang] AND mamonan = $productId";
    $resultCheckExistence = mysqli_query($con, $sqlCheckExistence);

    if (mysqli_num_rows($resultCheckExistence) > 0) {
        $row = mysqli_fetch_assoc($resultCheckExistence);
        $newQuantity = $row['soluong'] + $quantity;
        $sqlUpdateQuantity = "UPDATE giohang SET soluong = $newQuantity WHERE makhachhang = $_SESSION[makhachhang] AND mamonan = $productId";
        mysqli_query($con, $sqlUpdateQuantity);
    } else {
        $sqlAddToCart = "INSERT INTO giohang (mamonan, soluong, gia, makhachhang) 
        SELECT ID, $quantity, ThanhTien, $_SESSION[makhachhang] FROM doan WHERE ID = $productId";
        mysqli_query($con, $sqlAddToCart);
    }

    $countResult = mysqli_query($con, "SELECT COUNT(*) as soluongmon FROM giohang WHERE makhachhang = $_SESSION[makhachhang]");
    $countRow = mysqli_fetch_assoc($countResult);
    $so_luong_mon = $countRow['soluongmon'];

    echo json_encode(array('success' => true, 'so_luong_mon' => $so_luong_mon));
?>