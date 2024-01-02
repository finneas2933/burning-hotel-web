<?php
    include('../config.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `daubep` WHERE ID = $id";
    $result= mysqli_query($con,$sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hoten = $row["HoTen"];
            $gioitinh = $row["GioiTinh"];
            $ngaysinh = $row["NgaySinh"];
            $chucvu = $row["ChucVu"];
            $sonamkinhnghiem = $row["SoNamKinhNghiem"];
            $email = $row["Email"];
            $sodienthoai = $row["SoDienThoai"];
            $diachi = $row["DiaChi"];
            $mota = $row["MoTa"];
            $hinhanh = $row["HinhAnh"];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link css bootstrap -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- link slick -->
    <link rel="stylesheet" type="text/css" href="../common/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../common/slick/slick-theme.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet/less" type="text/css"
        href="../css/restaurant/chef/chefdetail.module.scss?v=<?php echo time(); ?>">
    <link rel="icon" href="../public_html/favicon.ico" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1"></script>
</head>

<body>
    <!-- header -->
    <?php include('./header.php'); ?>
    <!-- banner -->
    <section id="banner">
        <div class="container-fluid p-0 text-center">
            <div class="img h-100">
                <img src="../img/service/banner_service_1.jpg" alt="" class="w-100">
                <div class="box">
                    <div class="tieude"></div>
                    <p class="m-0" style="font-size: 14px;font-family: Montserrat-Regular">Restaurant</p>
                    <h3 style="font-size:36px;font-family: Montserrat-Bold;">Chef Details</h3>
                    <div class="tieude"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <section id="chef__profile">
        <div class="chef__image">
            <img src="<?php echo $hinhanh; ?>" alt="Chef Image">
        </div>
        <div class="chef__details">
            <div>
                <div class="chef__name"><?php echo $hoten; ?></div>
                <div class="chef__role"><?php echo $chucvu; ?></div>
                <p><?php echo $mota; ?></p>
            </div>
            <div class="hero__items">
                <div class="hero__items__left">
                    <div class="items">
                        <img src="../img/restaurant/icon/email.png" alt="icon" class="lab-icon" />
                        <div class="sup__detail">
                            <div class="lab-name">Email</div>
                            <div class="lab-details"><?php echo $email; ?></div>
                        </div>
                    </div>
                    <div class="items">
                        <img src="../img/restaurant/icon/experience.png" alt="icon" class="lab-icon" />
                        <div class="sup__detail">
                            <div class="lab-name">Experience</div>
                            <div class="lab-details"><?php  echo $sonamkinhnghiem; ?></div>
                        </div>
                    </div>
                </div>
                <div class="hero__items__right">
                    <div class="items">
                        <img src="../img/restaurant/icon/phone.png" alt="icon" class="lab-icon" />
                        <div class="sup__detail">
                            <div class="lab-name">Phone</div>
                            <div class="lab-details"><?php echo  $sodienthoai; ?></div>
                        </div>
                    </div>
                    <div class="items">
                        <img src="../img/restaurant/icon/location.png" alt="icon" class="lab-icon" />
                        <div class="sup__detail">
                            <div class="lab-name">Location</div>
                            <div class="lab-details"><?php echo $diachi; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include('../logged/footer.php'); ?>

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