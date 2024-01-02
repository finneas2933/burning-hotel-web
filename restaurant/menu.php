<?php
session_start();
include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/restaurant/menu/menu.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="icon" href="../public_html/favicon.ico" type="image/png">
    <script src="https://kit.fontawesome.com/a0ff9460a2.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
</head>

<body>
    <!-- header -->
    <?php include('./header.php'); ?>
    <!-- end header -->
    <!-- banner -->
    <section id="banner">
        <div class="container-fluid p-0 text-center">
            <div class="img h-100">
                <img src="../img/restaurant/menu/banner.png" alt="" class="w-100">
                <div class="box">
                    <h3
                        style="font-size:20px;font-family: Montserrat-Bold;border-top: 2px solid #937438;border-bottom: 2px solid #937438;width:63px">
                        MENU</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <!-- drink -->
    <section id="drink">
        <div class="container  py-5">
            <div class="row">
                <div class="col-4 pe-0">
                    <img src="../img/restaurant/menu/anh1.png" alt="" class="img-fluid" style="height: 100%; width: 85%">
                </div>
                <div class="col-8">
                    <h3>Drink</h3>
                    <?php
                    $sql = "SELECT * FROM doan WHERE PhanLoai = 'Nước uống' LIMIT 4";
                    $result = $con->query($sql);

                    // Bắt đầu vòng lặp để hiển thị dữ liệu
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="row">';
                            echo '<div class="col-2 d-flex justify-content-center">';
                            echo '<img src="'. $row["img"] .'" alt="" class="rounded-circle" style="width:70px; height:70px">';
                            echo '</div>';
                            echo '<div class="col-8">';
                            echo '<h4>' . $row["TenMon"] . '</h4>';
                            echo '<p>' . $row["ThanhPhan"] . '</p>';
                            echo '</div>';
                            echo '<div class="col-2 d-flex align-items-end justify-content-end">';
                            echo '<b style="margin-bottom: 1rem;">' . number_format($row["ThanhTien"]) . ' VNĐ</b>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 kết quả";
                    }
                    ?>
                <button class="butn" onclick="redirectToMenuList('Nước uống')">See all drink</button>
                <!-- <button class="butn"><a href="cart.php">See all drink</a></button> -->

                </div>
                <!-- <button class="butn" onclick="redirectToMenuList('Món chính')">See Main Dishes</button> -->
            </div>
        </div>
        </div>
    </section>
    <!-- end drink -->

    <div class="container-fluid p-0">
        <img src="../img/restaurant/menu/anh2.png" alt="" class="w-100" style="height: 200px;">
    </div>

    <!-- appetizer -->
    <section id="appetizer">
        <div class="container py-5">
            <div class="row">
                <div class="col-8 pe-0">
                    <h3>Appetizer</h3>
                    <?php
                    $sql_appetizer = "SELECT * FROM doan WHERE PhanLoai = 'Món khai vị' LIMIT 4";
                    $result_appetizer = $con->query($sql_appetizer);

                    // Bắt đầu vòng lặp để hiển thị dữ liệu
                    if ($result_appetizer->num_rows > 0) {
                        while ($result = $result_appetizer->fetch_assoc()) {
                            echo '<div class="row">';
                            echo '<div class="col-2 d-flex justify-content-center">';
                            echo '<img src="'. $result["img"] .'" alt="" class="rounded-circle" style="width:70px; height:70px">';
                            echo '</div>';
                            echo '<div class="col-8">';
                            echo '<h4>' . $result["TenMon"] . '</h4>';
                            echo '<p>' . $result["ThanhPhan"] . '</p>';
                            echo '</div>';
                            echo '<div class="col-2 d-flex align-items-end  justify-content-end">';
                            echo '<b style="margin-bottom: 1rem;">' . number_format($result["ThanhTien"]) . ' VNĐ</b>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 kết quả";
                    }
                    ?>
                    <button class="butn" onclick="redirectToMenuList('Món khai vị')">See all appetizer</button>
                </div>
                <div class="col-4">
                    <img src="../img/restaurant/menu/khaivi.jpg" alt="" class="img-fluid" style="height: 100%; width: 85%">
                </div>
            </div>
        </div>
    </section>
    <!-- end Appetizer -->

    <div class="container-fluid p-0">
        <img src="../img/restaurant/menu/anh4.png" alt="" class="w-100" style="height: 200px;">
    </div>

    <!-- maindishes -->
    <section id="maindishes">
        <div class="container py-5">
            <div class="row">
                <div class="col-4 pe-0">
                    <img src="../img/restaurant/menu/monchinh.png" alt="" class="img-fluid" style="height: 100%; width: 85%">
                </div>
                <div class="col-8">
                    <h3>Main dishes</h3>
                    <?php
                    $sql_maindishes = "SELECT * FROM doan WHERE PhanLoai = 'Món chính' LIMIT 4";
                    $result_maindishes = $con->query($sql_maindishes);

                    // Bắt đầu vòng lặp để hiển thị dữ liệu
                    if ($result_maindishes->num_rows > 0) {
                        while ($row_maindishes = $result_maindishes->fetch_assoc()) {
                            echo '<div class="row">';
                            echo '<div class="col-2 d-flex justify-content-center">';
                            echo '<img src="'. $row_maindishes["img"] .'" alt="" class="rounded-circle" style="width:70px; height:70px">';
                            echo '</div>';
                            echo '<div class="col-8">';
                            echo '<h4>' . $row_maindishes["TenMon"] . '</h4>';
                            echo '<p>' . $row_maindishes["ThanhPhan"] . '</p>';
                            echo '</div>';
                            echo '<div class="col-2 d-flex align-items-end  justify-content-end">';
                            echo '<b style="margin-bottom: 1rem;">' . number_format($row_maindishes["ThanhTien"]) . ' VNĐ</b>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 kết quả";
                    }
                    ?>
                    <button class="butn" onclick="redirectToMenuList('Món chính')">See all maindishes</button>
                </div>
            </div>
        </div>
    </section>
    <!-- end maindishes -->

    <div class="container-fluid p-0">
        <img src="../img/restaurant/menu/anh2.png" alt="" class="w-100" style="height: 200px;">
    </div>

    <!-- dessert -->
    <section id="dessert">
        <div class="container py-5">
            <div class="row">
                <div class="col-8 pe-0">
                    <h3>Dessert</h3>
                    <?php
                    $sql_dessert = "SELECT * FROM doan WHERE PhanLoai = 'Món tráng miệng' LIMIT 4";
                    $result_dessert = $con->query($sql_dessert);

                    // Bắt đầu vòng lặp để hiển thị dữ liệu
                    if ($result_dessert->num_rows > 0) {
                        while ($result = $result_dessert->fetch_assoc()) {
                            echo '<div class="row">';
                            echo '<div class="col-2 d-flex justify-content-center">';
                            echo '<img src="'. $result["img"] .'" alt="" class="rounded-circle" style="width:70px; height:70px">';
                            echo '</div>';
                            echo '<div class="col-8">';
                            echo '<h4>' . $result["TenMon"] . '</h4>';
                            echo '<p>' . $result["ThanhPhan"] . '</p>';
                            echo '</div>';
                            echo '<div class="col-2 d-flex align-items-end  justify-content-end">';
                            echo '<b style="margin-bottom: 1rem;">' . number_format($result["ThanhTien"]) . ' VNĐ</b>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 kết quả";
                    }
                    ?>
                    <button class="butn" onclick="redirectToMenuList('Món tráng miệng')">See all dessert</button>
                </div>
                <div class="col-4">
                    <img src="../img/restaurant/menu/trangmieng.png" alt="" class="img-fluid" style="height: 100%; width: 85%">
                </div>
            </div>
        </div>
    </section>

    <!-- end dessert -->

    <div class="container-fluid p-0">
        <img src="../img/restaurant/menu/anh4.png" alt="" class="w-100" style="height: 200px;">
    </div>

    <!-- fastfood -->
    <section id="fastfood">
        <div class="container py-5">
            <div class="row">
                <div class="col-4 pe-0">
                    <img src="../img/restaurant/menu/fastfood.jpg" alt="" class="img-fluid" style="height: 100%; width: 85%">
                </div>
                <div class="col-8">
                    <h3>Fast Food</h3>
                    <?php
                    $sql_fastfood = "SELECT * FROM doan WHERE PhanLoai = 'Đồ ăn nhanh' LIMIT 4";
                    $result_fastfood = $con->query($sql_fastfood);

                    // Bắt đầu vòng lặp để hiển thị dữ liệu
                    if ($result_fastfood->num_rows > 0) {
                        while ($row_fastfood = $result_fastfood->fetch_assoc()) {
                            echo '<div class="row">';
                            echo '<div class="col-2 d-flex justify-content-center">';
                            echo '<img src="'. $row_fastfood["img"] .'" alt="" class="rounded-circle" style="width:70px; height:70px">';
                            echo '</div>';
                            echo '<div class="col-8">';
                            echo '<h4>' . $row_fastfood["TenMon"] . '</h4>';
                            echo '<p>' . $row_fastfood["ThanhPhan"] . '</p>';
                            echo '</div>';
                            echo '<div class="col-2 d-flex align-items-end  justify-content-end">';
                            echo '<b style="margin-bottom: 1rem;">' . number_format($row_fastfood["ThanhTien"]) . ' VNĐ</b>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 kết quả";
                    }
                    ?>
                    <button class="butn" onclick="redirectToMenuList('Đồ ăn nhanh')">See all fastfood</button>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        function redirectToMenuList(category) {
            window.location.href = 'menu__list.php?category=' + encodeURIComponent(category);
        }
    </script>
    <!-- end dessert -->
    <!-- book table -->
    <?php include('booktable.php') ?>
    <!-- footer -->
    <?php include('../logged/footer.php'); ?>
</body>

</html>