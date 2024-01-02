<?php
require_once('../config.php');

// Kiểm tra xem có dữ liệu POST được gửi đến không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ POST
    $cartItemId = $_POST['cartItemId'];
    $newQuantity = $_POST['newQuantity'];

    // Thực hiện cập nhật số lượng trong cơ sở dữ liệu
    $updateSql = "UPDATE giohang SET soluong = $newQuantity WHERE id = $cartItemId";
    $result = mysqli_query($con, $updateSql);

    if ($result) {
        $response = ['success' => true, 'message' => 'Quantity updated successfully.'];
        echo json_encode($response);
    } else {
        $response = ['success' => false, 'message' => 'Error updating quantity.'];
        echo json_encode($response);
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request.'];
    echo json_encode($response);
}

mysqli_close($con);
?>
