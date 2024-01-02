<?php
require_once('../config.php');

if (isset($_GET['customer_id'])) {
    $customerId = $_GET['customer_id'];

    $sql = "SELECT giohang.id id, doan.id mamonan, doan.img, giohang.soluong soluong, giohang.gia gia, doan.tenmon tenmon
            FROM giohang
            INNER JOIN doan ON giohang.mamonan = doan.id
            WHERE giohang.makhachhang =  $customerId";
    $result = $con->query($sql);

    $cartItems = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cartItems[] = [
                'id' => $row['id'],
                'mamonan' => $row['mamonan'],
                'img' => $row['img'],
                'soluong' => $row['soluong'],
                'gia' => $row['gia'],
                'tenmon' => $row['tenmon']
            ];
        }
    }

    echo json_encode($cartItems);
} else {
    echo json_encode([]);
}

?>