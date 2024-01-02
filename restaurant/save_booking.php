<?php
session_start();
include('../config.php');

// Kiểm tra nếu có dữ liệu được gửi từ trang HTML
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ dữ liệu gửi đi
    $persons = $_POST['persons'];
    $timing = $_POST['timing'];
    $date = $_POST['date'];
    $note = $_POST['note'];

    // Thực hiện câu truy vấn để lưu thông tin vào CSDL
    $insertQuery = "INSERT INTO datban (MaKhachHang, SoLuong, ThoiGian, NgayDat, NgayDen, TinhTrang, MaNhanVien) 
    VALUES ('$_SESSION[makhachhang]', '$persons', '$timing', NOW(), '$date', 'Chờ', NULL)";

    if ($con->query($insertQuery) === TRUE) {
        // Lấy ID của bản ghi vừa được thêm vào
        $lastInsertedID = $con->insert_id;

        // Trả về kết quả và ID cho trang HTML
        echo "success|" . $lastInsertedID;
    } else {
        echo "Error: " . $insertQuery . "<br>" . $con->error;
    }

    // Đóng kết nối CSDL
    $con->close();
} else {
    echo "Invalid request";
}
?>
