<?php
    session_start();
    include("../config.php");

    $data = json_decode(file_get_contents("php://input"));

    $cartItemId = $data->cartItemId;
    $newQuantity = $data->newQuantity;

    $sqlUpdateQuantity = "UPDATE giohang SET soluong = $newQuantity WHERE id = $cartItemId AND makhachhang = $_SESSION[makhachhang]";

    if (mysqli_query($con, $sqlUpdateQuantity)) {
        echo json_encode(array('success' => true, 'message' => 'Cập nhật số lượng thành công.'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật số lượng.'));
    }
?>
