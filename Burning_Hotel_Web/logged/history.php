<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/history.css?v=<?php echo time(); ?>" type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link css bootstrap -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- link slick -->
    <link rel="stylesheet" type="text/css" href="../common/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../common/slick/slick-theme.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Lịch sử đặt phòng</title>
</head>

<body>
    <?php
    include('header.php');
    include('../config.php');
    ?>
    <div class="main">
        <?php
        $sql = "SELECT *FROM phieudatphong AS pdp
                        INNER JOIN chitietdatphong AS ctdp ON pdp.MaPDP = ctdp.MaPDP
                        INNER JOIN phong AS p ON ctdp.MaPhong = p.MaPhong
                        LEFT JOIN phieudichvu AS pdv ON pdp.MaPDP = pdv.MaPDP
                        LEFT JOIN chitietdichvu AS ctdv ON pdv.MaPDV = ctdv.MaPDV
                        INNER JOIN khachhang AS kh ON kh.ID = pdp.MaKhachHang
                        INNER JOIN hoadon AS hd ON hd.MaPDP = pdp.MaPDP
                        LEFT JOIN phieumonan AS pma ON hd.MaHoaDon = pma.MaHoaDon
                        WHERE kh.ID = '" . $_SESSION['makhachhang'] . "'
                        GROUP BY pdp.MaPDP";

        $result = mysqli_query($con, $sql);
        $lichsuphongs = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $lichsuphongs[] = array(
                    'MaPDP' => $row["MaPDP"], 'MaPDV' => $row["MaPDV"], 'KieuPhong' => $row["KieuPhong"], 'TongTien' => $row["TongTien"],
                    'ThanhToanTruoc' => $row["ThanhToanTruoc"], 'TinhTrang' => $row['TinhTrang'],
                    'NgayDen' => $row["NgayDen"], 'NgayDi' => $row["NgayDi"], 'PhuongThucThanhToan' => $row['PhuongThucThanhToan'],
                    'IMG' => $row['IMG'], 'NgayTT' => $row["NgayTT"], 'TongTienMA' => $row["TongTienMA"]
                );
            }
        } else { ?> <p style="color: red; font-size: 30px; padding:78px;">Bạn chưa đặt phòng</p> <?php }

        ?>

        <div class="mainroom">
            <?php foreach ($lichsuphongs as $key => $value) {
                $ngayhientai = date("Y-m-d");
            ?>
                <div class="ngaydat"> <?php echo  $value['NgayTT'] ?></div>
                <div class="mainroom_1">
                    <div class="mainroom12">
                        <img src="<?php echo $value['IMG'] ?>" alt="" width="250px" height="200px">
                    </div>

                    <div class="mainroom11">
                        <p class="mainroom111"><?php echo $value['KieuPhong'] ?></p>
                        <p class="mainroom112">Tổng Tiền Phòng: <?php echo $value['TongTien'] ?> VNĐ</p>
                        <p class="mainroom114 tma" style="color: red;"> Tổng Tiền Món Ăn: <?php echo $value['TongTienMA']; ?> VNĐ</p>
                        <script>
                                var tienmonan = document.querySelectorAll('.tma');

                                for (var i = 0; i < tienmonan.length; i++) {
                                    var tma = tienmonan[i];
                                    var tienma = <?php echo empty($value['TongTienMA']) ? 0 : $value['TongTienMA']; ?>;
                                    if (tienma == 0) {
                                        tma.style.display = "none";
                                    } else {
                                        tma.style.display = "block";
                                    }
                                }
                        </script>
                        <p><span class="mainroom112">Ngày Đến:</span>
                            <span class="ngayden" style="margin-right: 20px;"> <?php echo $value['NgayDen'] ?></span>
                            <span class="mainroom112 ">Ngày Đi: <?php echo $value['NgayDi'] ?></span>
                        </p>
                        <p class="mainroom112">Ngày đặt phòng: <?php echo $value['NgayTT'] ?></p>
                    </div>
                    <div class="mainroom13">
                        <div class="mainroom131">Trạng thái</div>
                        <div class="mainroom132 trangthai ">
                            <?php
                            echo $value['TinhTrang'];
                            ?>
                        </div>

                        <div> <a style="text-decoration: none " href="thongtinphong.php?MaPDP=<?php echo $value['MaPDP'] ?>">Xem chi tiết</a></div>
                        <div> <a class="huyphong" style="text-decoration: none " href="#" onclick="huydatphong()">Hủy Đặt Phòng</a> </div>
                    </div>
                </div>

                <script>
                    var trangthaiElements = document.querySelectorAll('.trangthai');
                    var huyphongElements = document.querySelectorAll('.huyphong');
                    var ngaydenElements = document.querySelectorAll('.ngayden');
                    var ngayhientai = new Date();

                    //toLocaleDateString()
                    for (var i = 0; i < trangthaiElements.length; i++) {
                        var trangthai = trangthaiElements[i].innerText;
                        var huyphong = huyphongElements[i];
                        var ngayden = new Date(ngaydenElements[i].innerText);

                        if ((trangthai == 'Đã thanh toán' && ngayden > ngayhientai) || trangthai == 'Đã đặt cọc') {
                            huyphong.style.display = "block";
                        } else {
                            huyphong.style.display = "none";
                        }

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
                                xhr.open("GET", "HuyDatPhong.php?MaPDP=<?php echo $value['MaPDP'] ?>&MaPDV=<?php echo  $value['MaPDV'] ?>", true);
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

            <?php
            }
            ?>
        </div>

    </div>

    <?php
    include('footer.php')
    ?>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!-- bootstrap -->
    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <!-- slick -->
    <script src="../common/slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/scrip.js"></script>
</body>

</html>