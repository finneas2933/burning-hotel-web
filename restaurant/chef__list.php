<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link css bootstrap -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- link slick -->
    <link rel="stylesheet" type="text/css" href="../common/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../common/slick/slick-theme.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet/less" type="text/css"
        href="../css/restaurant/chef/cheflist.module.scss?v=<?php echo time(); ?>">
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
                    <h3 style="font-size:36px;font-family: Montserrat-Bold;">Meet Our Professional Chefs</h3>
                    <div class="tieude"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <?php
    include('../config.php');

    $sql = "SELECT db.ID, db.HoTen, db.NgaySinh, cv.TenChucVu, db.HinhAnh FROM `daubep` db, `chucvu` cv WHERE db.MaChucVu=cv.MaChucVu"; // Thêm cột 'id' vào truy vấn SQL
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo '<section id="chef" class="pb-5">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-4 text-center">
                    <a href="chef__detail.php?id=' . $row["ID"] . '"><img class="cheflist" src="' . $row["HinhAnh"] . '" alt=""></a>
                    <a href="chef__detail.php?id=' . $row["ID"] . '"><h4 class="chefname">' . $row["HoTen"] . '</h4></a>
                        <span>' . $row["TenChucVu"] . '</span>
                    
                </div>';
        }
        echo '</div>
            </div>
        </section>';

    } else {
        echo "Không có dữ liệu thành viên nào trong cơ sở dữ liệu.";
    }
    ?>

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