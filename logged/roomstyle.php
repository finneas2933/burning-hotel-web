<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>" type='text/css'>
    <link rel="stylesheet" href="../css/roomstyle.css?v=<?php echo time(); ?>" type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <title>Document</title>
</head>

<body>
    <!-- header -->
    <?php
    include('header.php');
    include('../config.php');
    ?>

    <!-- banner -->

    <div class="header">
        <img src="../img/pay/banner.jpg" alt="">
        <div class="header_mota">
            <span class="mota1">Home</span>
            <span class="mota2">-Room</span>
            <p class="mota3">ROOMSTYLE</p>
        </div>
    </div>
    <!-- end banner -->


    <!-- end banner -->

    <!-- main -->
    <div class="main">
        <div class="main_menu">
            <p>Booking now</p>
            <!-- nút checknow bên index1 -->

            <?php
                if (isset($_POST["btn"])) {
                    $ngayden = $_POST["ngayden"];
                    $ngaydi = $_POST["ngaydi"];
                    $nguoi = $_POST["room"];
                    $phong = $_POST["category"];
                 
                }
                if (isset($_POST["submit"])) {
                    $ngaydenrs = $_POST["ngaydenrs"];
                    $ngaydirs = $_POST["ngaydirs"];
                    $nguoi = $_POST["checknguoi"];
                    $phong = $_POST["checkphong"];
                  
                }
            
            ?>
            <div class="form">
                <form action="" method="POST">
                    <div class="form_item">
                        <input type="datetime-local" name="ngaydenrs" id="ngayden" placeholder="Check In" onchange="chonngayden()" value="<?php echo (isset($_POST["btn"])) ? $ngayden : $ngaydenrs; ?>"></div>
                        <div id="thongbaongayden" style="color: red"></div>
                    <div class="form_item">
                        <input type="datetime-local" name="ngaydirs" id="ngaydi" placeholder="Check Out" onchange="chonngaydi()" value="<?php echo (isset($_POST["btn"])) ? $ngaydi : $ngaydirs; ?>"></div>
                        <div id="thongbaongaydi" style="color: red"></div>
                        <script src="KiemTraNgay.js?v=<?php echo time(); ?>" ></script>
                    <div class="form_item">
                        <select name="checknguoi" id="room">
                            <?php
                                if (isset($_POST["btn"]) || isset($_POST["submit"])) {
                                    for ($i = 1; $i < 7; $i++) {
                                        $selected = ($nguoi == $i) ? 'selected' : '';
                                        echo "<option value='$i' $selected> $i người </option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form_item">
                        <select name="checkphong" id="phong">
                            <?php
                                $sql = "SELECT DISTINCT LoaiPhong FROM phong";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $loaiphongs[] =  $row['LoaiPhong'];
                                    }
                                    foreach ($loaiphongs as $loaiphong) {
                                        $selected = ($phong == $loaiphong ) ? 'selected' : '';
                                        echo "<option value='$loaiphong' $selected> $loaiphong </option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit"  onclick="return kiemtrangay()" name="submit"><img src="../img/icon_muiten.png">Check </button>
                </form>
            </div>
        </div>
        <?php

        $sql = "SELECT * FROM phong WHERE SLMAX >= '" . $nguoi . "' AND LoaiPhong = '" . $phong . "' AND TrangThai = 'Trống'";
        $result = mysqli_query($con, $sql);
        $phongs = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $phongs[] = array(
                    'KieuPhong' => $row['KieuPhong'], 'SLMax' => $row['SLMax'], "IMG" => $row['IMG'],
                    'GiaPhong' => $row['GiaPhong'], 'MaPhong' => $row['MaPhong']
                );
                echo "</br>";
            }
        }
        ?>
        <div class="mainroom">
            <?php foreach ($phongs as $key => $value) { ?>
                <div class="mainroom_1">
                    <div class="mainroom12 col-3">
                        <img src="<?php echo $value['IMG'] ?>" alt="" width="250px" height="200px">
                    </div>
                    <div class="mainroom11 col-6">
                        <p class="mainroom111"> <?php echo $value['KieuPhong']; ?> </p>

                        <p class="mainroom112">Sawy trevelers are looking for more than just the<br> next destination on
                            the map
                            . They are looking for a<br> memorable experience.</p>
                        <div class="icon">
                            <span class="icon_giuong"><img src="../img/icon_Room.png" width="32px" height="25px">(2)bed's
                            </span>
                            <span class="icon_nguoi"><img src="../img/icon_3p.png" alt="" width="32px" height="25px">(<?php echo $value['SLMax']; ?>)Guest's</span>
                        </div>
                    </div>
                    <div class="mainroom13 col-3">
                        <div class="mainroom131"><?php echo number_format($value['GiaPhong']) ?> VNĐ/Night</div>
                        <div class="mainroom132">
                            <i class="fa fa-star" style="color:yellow"> </i>
                            5/5
                        </div>
                        <div class="mainroom133">
                            <a onclick="return kiemtrangay()" href="roomdetail.php?MaPhong=<?php echo $value['MaPhong']; ?>">READ MORE</a>
                        </div>
                        <script>
                        function kiemtrangay() {
                            thongbaoden = document.getElementById("thongbaongayden").innerHTML;
                            thongbaodi = document.getElementById("thongbaongaydi").innerHTML;
                            
                            if (thongbaoden || thongbaodi) {
                                alert("Vui lòng kiểm tra lại thông tin!");
                                return false; 
                            } 
                            else {
                                return true;
                            }
                        }
                    </script>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    </div>
    <!--end main -->

    <!-- footer -->
    <?php include('footer.php'); ?>

    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <script>
    </script>
</body>

</html>