<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burning Washing Closes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link css bootstrap -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- link slick -->
    <link rel="stylesheet" type="text/css" href="../common/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../common/slick/slick-theme.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/restaurant.css?v=<?php echo time(); ?>" type='text/css'>
    <link rel="icon" href="../public_html/favicon.ico" type="image/png">
</head>

<body>
    <!-- header -->
    <?php include('header.php'); ?>

    <!-- banner -->
    <section id="banner">
        <div class="container-fluid p-0 text-center">
            <div class="img h-100">
                <img src="../img/service/banner_service_1.jpg" alt="" class="w-100">
                <div class="box">
                    <div class="trangtri"></div>
                    <p class="m-0" style="font-size: 14px;font-family: Montserrat-Regular">Home - <span style="color: #C89E4B;">Service</span></p>
                    <h3 style="font-size:36px;font-family: Montserrat-Bold;">Restaurant</h3>
                    <div class="trangtri"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <!-- content -->
    <form action="" method="POSt">
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="left me-5">
                        <h5 class="mb-4">MENU TỔNG</h5>
                        <div class="d-flex justify-content-between">
                            <p class="m-0"><i class="fa fa-angle-double-right me-1"></i>Món ăn nổi bật</p>
                            <p class="m-0">(08)</p>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <p class="m-0"><i class="fa fa-angle-double-right me-1"></i>Món khai vị</p>
                            <p class="m-0">(15)</p>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <p class="m-0"><i class="fa fa-angle-double-right me-1"></i>Món chính</p>
                            <p class="m-0">(14)</p>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <p class="m-0"><i class="fa fa-angle-double-right me-1"></i>Món tráng miệng</p>
                            <p class="m-0">(10)</p>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <p class="m-0"><i class="fa fa-angle-double-right me-1"></i>Đồ uống</p>
                            <p class="m-0">(08)</p>
                        </div>
                        <div class="mt-4 mb-4 d-flex justify-content-between">
                            <p class="m-0"><i class="fa fa-angle-double-right me-1"></i>Buffet</p>
                            <p class="m-0">(05)</p>
                        </div>
                    </div>
                    <div class="right px-4 ">
                        <h5 class="mt-4">THỰC ĐƠN</h5>
                        <h6 class="mt-3">Món nổi bật</h6>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "burninghotel");
                        if (!$con) {
                            echo 'Kết nối không thành công';
                        }
                        $sql = "SELECT * FROM monnoibat";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $monnoibat[] = array('TenMon' => $row['TenMon'], 'Gia' => $row['Gia'], 'IMG' => $row['IMG']);
                            }
                        }
                        ?>
                        <div class="row ">
                            <section class="regular">
                                <?php foreach ($monnoibat as $key => $value) { ?>
                                    <div class="col-4  mt-3 ">
                                        <div class="img">
                                            <img src="../img/Doan/<?php echo $value['IMG'] ?>" alt="" class="w-100 ">
                                            <div class="content">
                                                <p class="m-0" style="font-size: 12px;"><span name="gia" style="color:#C89E4B;"><?php echo $value['Gia'] ?></span>
                                                    / 1 Phần</p>
                                                <p class="m-0 " name="tenmon" style="font-size: 14px;"><?php echo $value['TenMon'] ?></p>
                                                <div class="trangtri"></div>
                                                <!-- <button type="submit" name='bnt1'>
                                                Thêm
                                            </button> -->
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </section>
                            <div class="trangtri1"></div>

                        </div>

                        <h6 class="mt-3">Món khai vị</h6>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "burninghotel");
                        if (!$con) {
                            echo 'Kết nối không thành công';
                        }
                        $sql = "SELECT * FROM monkhaivi";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $monkhaivi[] = array('TenMon' => $row['TenMon'], 'Gia' => $row['Gia'], 'IMG' => $row['IMG']);
                            }
                        }
                        ?>
                        <div class="row ">
                            <section class="regular">
                                <?php foreach ($monkhaivi as $key => $value) { ?>
                                    <div class="col-4  mt-3 ">
                                        <div class="img">
                                            <img src="../img/Doan/<?php echo $value['IMG'] ?>" alt="" class="w-100 ">
                                            <div class="content">
                                                <p class="m-0" style="font-size: 12px;"><span style="color:#C89E4B;"><?php echo $value['Gia'] ?></span>
                                                    / 1 Phần</p>
                                                <p class="m-0 " style="font-size: 14px;"><?php echo $value['TenMon'] ?></p>
                                                <div class="trangtri"></div>
                                                <!-- <button>
                                                Thêm
                                            </button> -->
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </section>
                            <div class="trangtri1"></div>

                        </div>

                        <h6 class="mt-3">Món chính</h6>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "burninghotel");
                        if (!$con) {
                            echo 'Kết nối không thành công';
                        }
                        $sql = "SELECT * FROM monchinh";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $monchinh[] = array('TenMon' => $row['TenMon'], 'Gia' => $row['Gia'], 'IMG' => $row['IMG']);
                            }
                        }
                        ?>
                        <div class="row ">
                            <section class="regular">
                                <?php foreach ($monchinh as $key => $value) { ?>
                                    <div class="col-4  mt-3 ">
                                        <div class="img">
                                            <img src="../img/Doan/<?php echo $value['IMG'] ?>" alt="" class="w-100 ">
                                            <div class="content">
                                                <p class="m-0" style="font-size: 12px;"><span style="color:#C89E4B;"><?php echo $value['Gia'] ?></span>
                                                    / 1 Phần</p>
                                                <p class="m-0 " style="font-size: 14px;"><?php echo $value['TenMon'] ?></p>
                                                <div class="trangtri"></div>
                                                <!-- <button type="submit" name="btn3">
                                                Thêm
                                            </button> -->
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </section>
                            <div class="trangtri1"></div>

                        </div>

                        <h6 class="mt-3">Món tráng miệng</h6>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "burninghotel");
                        if (!$con) {
                            echo 'Kết nối không thành công';
                        }
                        $sql = "SELECT * FROM montrangmieng";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $montrangmieng[] = array('TenMon' => $row['TenMon'], 'Gia' => $row['Gia'], 'IMG' => $row['IMG']);
                            }
                        }
                        ?>
                        <div class="row ">
                            <section class="regular">
                                <?php foreach ($montrangmieng as $key => $value) { ?>
                                    <div class="col-4  mt-3 ">
                                        <div class="img">
                                            <img src="../img/MonTrangMieng/<?php echo $value['IMG'] ?>" alt="" class="w-100 ">
                                            <div class="content">
                                                <p class="m-0" style="font-size: 12px;"><span style="color:#C89E4B;"><?php echo $value['Gia'] ?></span>
                                                    / 1 Phần</p>
                                                <p class="m-0 " style="font-size: 14px;"><?php echo $value['TenMon'] ?></p>
                                                <div class="trangtri"></div>
                                                <!-- <button type="submit" name="bnt4">
                                                Thêm
                                            </button> -->
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </section>
                            <div class="trangtri1"></div>

                        </div>

                        <h6 class="mt-3">Đồ uống</h6>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "burninghotel");
                        if (!$con) {
                            echo 'Kết nối không thành công';
                        }
                        $sql = "SELECT * FROM douong";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $douong[] = array('TenDoUong' => $row['TenDoUong'], 'Gia' => $row['Gia'], 'IMG' => $row['IMG']);
                            }
                        }
                        ?>
                        <div class="row ">
                            <section class="regular">
                                <?php foreach ($douong as $key => $value) { ?>
                                    <div class="col-4  mt-3 ">
                                        <div class="img">
                                            <img src="../img/DoUong/<?php echo $value['IMG'] ?>" alt="" class="w-100 ">
                                            <div class="content">
                                                <p class="m-0" style="font-size: 12px;"><span style="color:#C89E4B;"><?php echo $value['Gia'] ?></span>
                                                    / 1 Phần</p>
                                                <p class="m-0 " style="font-size: 14px;"><?php echo $value['TenDoUong'] ?></p>
                                                <div class="trangtri"></div>
                                                <!-- <button type="submit" name="btn5">
                                                Thêm
                                            </button> -->
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </section>
                            <div class="trangtri1"></div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <section id="buffet" style="background-color: black; color: white; font-family: Montserrat-Regular;">
            <div class="container">
                <div class="row">
                    <div class="left me-5"></div>
                    <div class="right p-0">
                        <h6 class="mt-3">Buffet</h6>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "burninghotel");
                        if (!$con) {
                            echo 'Kết nối không thành công';
                        }
                        $sql = "SELECT * FROM setbuffet";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $setbuffet[] = array('TenSet' => $row['TenSet'], 'Gia' => $row['Gia'], 'IMG' => $row['IMG']);
                            }
                        }
                        ?>
                        <div class="row ">
                            <?php foreach ($setbuffet as $key => $value) { ?>
                                <div class="col-3">
                                    <div class="img ">
                                        <img src="../img/Doan/<?php echo $value['IMG'] ?>" alt="" class="h-100 w-100 rounded-4">
                                        <div id="modal">
                                            <!-- Button trigger modal -->
                                            <div class="button1">
                                                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Chi Tiết
                                                </button>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content dialog">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $value['TenSet'] ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <img src="../img/Doan/<?php echo $value['IMG'] ?>" alt="" height="200px" class="w-100 rounded-4">
                                                                </div>
                                                                <div class="col-6">
                                                                    <h5>Menu bao gồm</h5>
                                                                    <p>
                                                                        1, Gỏi chân gà rút xương ngó sen <br>
                                                                        2, Súp tam tơ <br>
                                                                        3, Cá diêu hồng xốt cam <br>
                                                                        4, Bò nấu tiêu xanh dùng kèm với bánh mì <br>
                                                                        5, Lẩu thập cẩm dùng kèm với mì <br>
                                                                        6, Bánh tuyết thiên sứ <br>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </form>
    <?php
    if (isset($_POST['btn1'])) {

        foreach ($monnoibat as $key => $value) {
            echo $value['TenMon'];
            echo $value['Gia'];
        }
    }
    ?>
    <!-- end content -->
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include('footer.php'); ?>

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