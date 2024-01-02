<?php
session_start();
include("../config.php");

$data = json_decode(file_get_contents("php://input"));

$cartItemId = $data->cartItemId;

$sqlRemoveItem = "DELETE FROM giohang WHERE id = $cartItemId AND makhachhang = $_SESSION[makhachhang]";

if (mysqli_query($con, $sqlRemoveItem)) {
    echo json_encode(array('success' => true, 'message' => 'Xoá sản phẩm thành công.'));
} else {
    echo json_encode(array('success' => false, 'message' => 'Có lỗi xảy ra khi xoá sản phẩm.'));
}
?>
