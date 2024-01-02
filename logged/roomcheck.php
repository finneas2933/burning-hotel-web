<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Check</title>
    <link rel="stylesheet" href="../css/roomcheck.css?v=<?php echo time(); ?>" type='text/css'>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/a0ff9460a2.js" crossorigin="anonymous"></script> // link lấy icon
    <!-- CSS only -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="icon" href=".../public_html/favicon.ico" type="image/png">
</head>

<body>
    <!-- header -->
    <?php
     include('header.php');
     include('../config.php');
      ?>

    <!-- banner -->
    <section id="banner">
        <div class="container-fluid p-0 text-center">
            <div class="img h-100">
                <img src="../img/pay/banner.jpg" alt="" class="w-100">
                <div class="box">
                    <div class="trangtri"></div>
                    <p class="m-0" style="font-size: 14px;font-family: Montserrat-Regular">Home - <span style="color: #EBB853;">Service</span></p>
                    <h3 style="font-size:36px;font-family: Montserrat-Bold;">Room Check</h3>
                    <div class="trangtri"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- end banner -->
    <section id="check">
        <div class="checkroom_infor">
            <form action="thongtinphong.php" method="POST">
                <div class="infor_item"><input type="text" name="madatphong" id="madatphong" placeholder="Nhập mã phòng"></div>
                <div class="infor_item"><input type="text" name="sdt" id="sdt" placeholder="Nhập số điện thoại"></div>
                <div class="infor_item"><button id="btn" type="submit" name="btn">Kiểm Tra</button></div>
            </form>
        </div>
    </section>
    <?php
    if (isset($_POST['btn'])) {
        $madatphong = $_POST['madatphong'];
        $sdt = $_POST['sdt'];
       
        if ($madatphong == "" || $sdt == "") {
            echo '<script>
                alert("Vui lòng nhập đầy đủ thông tin");
                window.location="javascript: history.go(-1)";
                </script>';
            exit;
        }
        $sql = "SELECT * From phieudatphong,quanlytaikhoan where phieudatphong.MaKhachHang=quanlytaikhoan.ID AND  phieudatphong.MaKhachHang='".$_SESSION['makhachhang']."' AND quanlytaikhoan.SDT='" . $sdt . "' AND phieudatphong.MaPDP='" . $madatphong . "'";
        $_result = mysqli_query($con, $sql);
        if (mysqli_num_rows($_result) == 0) {
            echo '<script>
                alert("Số điện thoại không tồn tại! Vui lòng kiểm tra lại"); 
                window.location="javascript: history.go(-1)";
                </script>';
            exit;
        }
        $row = mysqli_fetch_assoc($_result);
        if ($madatphong != $row['MaPDP']) {
            echo '<script>
                alert("Mã phòng sai! Vui lòng kiểm tra lại"); 
                window.location="javascript: history.go(-1)";
                </script>';
            exit;
        } else {
            echo '<script> 
                window.location="thongtinphong.php";
                </script>';
        }
    }
    ?>

    <!-- footer -->
    <?php include('footer.php'); ?>

    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
</body>

</html>