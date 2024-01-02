<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phòng</title>
    <link rel="stylesheet" href="../css/thongtinphong.css?v=<?php echo time(); ?>" type='text/css'>
    <link rel="icon" href="../public_html/favicon.ico" type="image/png">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/a0ff9460a2.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <!-- menu -->

    <?php include('header.php'); ?>
    <?php
        include('../config.php');
        $maphieudatphong=$_GET['MaPDP'];
        if(ISSET($_POST['btn'])){
            $maphieudatphong=$_POST['madatphong'];
        }
        $NgayHienTai=date("Y-m-d ", time());

        $sql = "SELECT *FROM phieudatphong AS pdp
                        INNER JOIN chitietdatphong AS ctdp ON pdp.MaPDP = ctdp.MaPDP
                        INNER JOIN phong AS p ON ctdp.MaPhong = p.MaPhong
                        LEFT JOIN phieudichvu AS pdv ON pdp.MaPDP = pdv.MaPDP
                        LEFT JOIN chitietdichvu AS ctdv ON pdv.MaPDV = ctdv.MaPDV
                        LEFT JOIN dichvu AS dv ON ctdv.MaDichVu = dv.MaDichVu
                        INNER JOIN hoadon AS hd ON hd.MaPDP = pdp.MaPDP
                        WHERE pdp.MaPDP = '".$maphieudatphong."' ";
        $result = mysqli_query($con, $sql);
        $dichvus= array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $KieuPhong = $row['KieuPhong'];
                $GiaPhong = $row['GiaPhong'];
                $LoaiPhong = $row['LoaiPhong'];
                $TongTien = $row['TongTien'];
                $ThanhToanTruoc = $row['ThanhToanTruoc'];
                $PhuongThucThanhToan=$row['PhuongThucThanhToan'];
                $NgayTT=$row['NgayTT'];
                $IMG = $row['IMG'];
                $NgayDen = $row['NgayDen'];
                $NgayDi = $row['NgayDi'];
                $TinhTrang=$row['TinhTrang'];
                $MaPDV = $row['MaPDV'];
                $dichvus[]=array('TenDichVu'=>$row['TenDichVu'], 'GiaDichVu'=>$row['DonGia']);

            }
        }

        $songay1 = abs(strtotime($NgayDen) - strtotime($NgayDi));
        $songay=floor($songay1 / (60*60*24));
    ?>
    <div class="main">
        <div class="body">
            <div class="inforroom">
                <h1>Chi Tiết Phòng</h1>
                <p class="inforroom1">Mã Đặt Phòng : <?php echo $maphieudatphong ?></p>
                <p class="inforroom1">Loại Phòng: <?php echo $LoaiPhong ?></p>
                <div class="inforanh">
                    <img src="<?php echo $IMG ?>" alt="" width="550px" height="250px">
                    <div class="inforchu">
                        <div class="inforrice">
                            <div class="rice1"><?php echo $GiaPhong ?></div>
                            <div class="rice2">/Night</div>
                        </div>
                        <div class="rice3"> <?php echo $KieuPhong ?> </div>
                    </div>
                </div>
                <button onclick="huydatphong()" type="submit" name="btn" id="btn" class="btnthanhtoan">Hủy Đặt Phòng</button></a>
            </div>
            <div class="inforchitiet">
                <table>
                    <tr>
                        <td>Ngày đến: </td>
                        <td><?php echo  $NgayDen ?></td>
                    </tr>
                    <tr>
                        <td>Ngày trả:</td>
                        <td> <?php echo $NgayDi ?></td>
                    </tr>
                    <tr>
                        <td>Tên khách hàng: </td>
                        <td><?php echo $_SESSION['ten'] ?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td><?php echo $_SESSION['sdt'] ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $_SESSION['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Tiền Phòng(x <?php echo $songay?>ngày): </td>
                        <td><?php echo $GiaPhong*$songay ?> VNĐ</td>
                    </tr>
                    <tr>
                        <?php
                        ?>
                        <td>Dịch vụ:</td>
                        <td>
                        <?php
                            foreach($dichvus as $key => $value){
                                if (empty($value['TenDichVu'])) {
                                    echo '';
                                } else {
                                    echo $value['TenDichVu'].' '. $value['GiaDichVu'] ;
                                    ?>
                                    VNĐ
                                    </br>
                          
                            <?php 
                                }
                            }
                                ?>
                        </td>
                    </tr>
                  
                    <tr>
                        <td>Tổng tiền:</td>
                        <td><?php echo $TongTien ?> VNĐ</td>
                    </tr>
                    <tr>
                        <td>Đã thanh toán: </td>
                        <td><?php echo $ThanhToanTruoc ?> VNĐ</td>
                    </tr>
                    <tr>
                        <td>Phương thức thanh toán: </td>
                        <td><?php echo $PhuongThucThanhToan ?></td>
                    </tr>
                    <tr>
                        <td>Ngày thanh toán: </td>
                        <td><?php echo $NgayTT ?></td>
                    </tr>
                    <tr>
                        <td>Trạng thái:</td>
                        <td>
                        <?php
                           echo $TinhTrang;
                        ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <script>
        var ngayden = new Date("<?php echo date('Y-m-d', strtotime($NgayDen)); ?>");
        var ngayhientai = new Date("<?php echo date('Y-m-d', strtotime($NgayHienTai)); ?>");
        var ngayden_timestamp = ngayden.getTime();
        var ngayhientai_timestamp = ngayhientai.getTime();

        if (ngayden_timestamp > ngayhientai_timestamp) {
            document.getElementById("btn").style.display = "block";
        } else {
            document.getElementById("btn").style.display = "none";
        }

        if(ngayden>ngayhientai){
          document.getElementById("btn").style.display="block";  
        }
        else{
            document.getElementById("btn").style.display="none";  
        }
        function huydatphong() {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn hủy đặt phòng?',
                icon: 'question',
                iconColor: 'red', 
                showCancelButton: true,
                confirmButtonText: 'Tiếp Tục',
                cancelButtonText: 'Hủy bỏ',
            }).then((result) => {
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "HuyDatPhong.php?MaPDP=<?php echo $maphieudatphong ?>&MaPDV=<?php echo $MaPDV ?>", true);
                    console.log(<?php echo $maphieudatphong; ?>);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var response = xhr.responseText;
                            if (response == "success") {
                                Swal.fire({
                                    title: 'Hủy phòng thành công!',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                }).then(() => {
                                    window.location = "home.php";
                                });
                            } else {
                                Swal.fire({
                                    title: 'Lỗi',
                                    text: response,
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                });
                            }
                        }
                    };

                    xhr.send();
                } else {
                    Swal.fire({
                        title: 'Bỏ hủy đặt phòng',
                        icon: 'info',
                        confirmButtonText: 'OK',
                    });
                }
            });
        }
    </script>
    <!-- footer -->
    <?php include('footer.php'); ?>
</body>

</html>