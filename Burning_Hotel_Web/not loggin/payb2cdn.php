<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay-B2</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link css bootstrap -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- link slick -->
    <link rel="stylesheet" type="text/css" href="../common/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../common/slick/slick-theme.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/pay1.css">
</head>

<body>

     <!-- header -->
   <?php
        include('header.php');
        ?>

    <!-- Banner -->
    <section id="banner">
        <div class="container-fluid p-0 text-center">
            <div class="img">
                <img src="../img/pay/banner.jpg" alt="" class="img-fluid">
                <div class="box">
                    <div class="trangtri"></div>
                    <p class="m-0" style="font-size: 14px;font-family: Montserrat-Regular">Home - <span
                            style="color: #937438;">Room List</span></p>
                    <h3 style="font-size:36px;font-family: Montserrat-Bold;">Thanh Toán</h3>
                    <div class="trangtri"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="step">
        <div class="a">
            <nav aria-label="...">
                <ul class="pagination d-flex justify-content-between mb-0">
                    <li class="page-item"><a class="page-link rounded-circle" href="#">1</a></li>
                    <li class="page-item" aria-current="page">
                        <span class="page-link rounded-circle">2</span>
                    </li>
                    <li class="page-item"><a class="page-link rounded-circle" href="#">3</a></li>
                </ul>
            </nav>
        </div>
        <div class="b">
            <nav aria-label="...">
                <ul class="pagination d-flex justify-content-between mb-0">
                    <li class="page-item" aria-current="page">
                        <span class="page-link  border-0">Thông tin khách hàng</span>
                    </li>
                    <li class="page-item"><a class="page-link  border-0" href="#">Chi tiết thanh toán</a></li>
                    <li class="page-item"><a class="page-link  border-0" href="#">Thành công</a></li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- endBanner -->

    <section id="Time" style="background-color: #352911; color: white;">
        <div class="container d-flex pt-3" style="align-items: center;">
            <img src="../img/thanhtoan1/icon-tt2.png" style="height: 45px;" alt="">
            <p class="mt-3 ms-1" style="font-family:Montserrat-Regular;">Thời gian hoàn tất thanh toán 15:00</p>
        </div>
    </section>

    <section id="center" style="background-color: #181A1B; color: white;">
        <div class="container pt-4" style="align-items: center;">
            <h3 class="mb-3 " style="font-family: Montserrat-Bold;">Chi Tiết Thanh Toán</h3>
            <img src="../img/pay/roomstyle_deluxe1.png" alt="" class=" rounded-3">
            <h3 class="pt-2" style="font-family: Montserrat-Bold;">Deluxe Room</h3>

        </div>
        <div class=" container d-flex mb-2">
            <div class="img">
                <img src="../img/icon_3p.png" alt="" class="img-fluid">
            </div>
            
            <p class="ps-1 m-0">(2) Guest's</p>
        </div>
        <div class=" container ps-3">
            <p class="mb-0 ms-4"> <i class="fa fa-circle"></i> Sức chứa tối đa 3 người</p>
            <p class="mb-0 ms-4"> <i class="fa fa-circle"></i> Sức chứa tiêu chuẩn 2</p>
            <p class="mb-0 ms-4"> <i class="fa fa-circle"></i> Cho phép ở thêm 1 người lớn và 1 trẻ nhỏ, trên 3 người bạn có
                thể sẽ chịu thêm phí</p>
        </div>
        <hr style="width: 80%; margin: 0 50px; border: 0; border-top: 5px solid;">
    </section>

    <section id="loaiphong" style="background-color:#181A1B; color: white;">

        <div class="container ">
            <h3 class="mb-3 pt-2" style="font-family: Montserrat-Bold;">Chi Tiết Giá</h3>
            <div class="row">
                <div class="col-6 d-flex">
                    <div>
                        <p class="m-0 ms-5" style="font-family:Montserrat-Regular;">1 phòng x 1 đêm</p>
                    </div>
                </div>
                <div class="col-6 ">
                    <div>
                        <p class="m-0" style=" padding-left: 200px; font-family:Montserrat-Regular;"> 300.000đ</p>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-6 d-flex">
                    <div>
                        <p class="m-0 ms-5" style="font-family:Montserrat-Regular;">Ưu đãi</p>
                    </div>
                </div>
                <div class="col-6 ">
                    <div>
                        <p class="m-0" style=" padding-left: 200px; font-family:Montserrat-Regular;"> Không có </p>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-6 d-flex">
                    <div>
                        <h5 class="ms-5" style="font-family:Montserrat-Regular;">Tổng thanh toán</h5>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <h5 style="color:#937438; padding-left: 200px; font-family:Montserrat-Regular;">300.000đ</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr style="width: 80%; margin: 0 50px; border: 0; border-top: 5px solid;">
    </section>

    <section id="pttt" style="background-color:#181A1B; color: white;">
        <div class="container">
            <div>
                <h3 class="mb-2 pt-2" style="font-family: Montserrat-Bold;">Phương Thức Thanh Toán</h3>
                <p class="m-0 ms-4" style="font-family:Montserrat-Regular; padding-right: 150px;">
                    Hưỡng dẫn thanh toán sẽ được gửi tới quý khách khi nhấn nút thanh toán phòng sẽ được gửi tới bạn,
                    vui
                    lòng thanh toán trước 10h45p 05/03/2002. Quá thời hạn trên chúng tôi có thể không gửi được phòng này
                    cho bạn nữa.
                </p>
                <h3 class=" pt-2" style="font-family: Montserrat-Bold;">Chọn ngân hàng</h3>
                <div class="nganhang d-flex pb-3">
                    <div class="row">
                        <div class="col-3  mt-3 ">
                            <div class="img">
                                <img src="../img/pay/bidv.jpg" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3  mt-3 ">
                            <div class="img">
                                <img src="../img/pay/techcombank.jpg" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3  mt-3 ">
                            <div class="img">
                                <img src="../img/pay/vietcombank.jpg" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3  mt-3 ">
                            <div class="img">
                                <img src="../img/pay/vietinbank.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr style="width: 80%; margin: 0 50px; border: 0; border-top: 5px solid;">
    </section>
    <section id="chon" style="background-color:#181A1B; color: white;">
        <div class="row d-flex ps-5 pt-3 pb-3">
            <div class="col-6">
                <label for="" style="font-family:Montserrat-Regular;">Thanh toán bằng QR-Pay</label>
            </div>
            <div class="col-6 ">
                <input type="radio" name="qr">
            </div>
        </div>

        <hr style="width: 80%; margin: 0 50px; border: 0; border-top: 5px solid;">
        <div class="row d-flex ps-5 pt-3 pb-3">
            <div class="col-6">
                <label for="" style="font-family:Montserrat-Regular;">Thẻ ATM/Tài khoản ngân hàng</label>
            </div>
            <div class="col-6 ">
                <input type="radio" name="qr">
            </div>
        </div>
        <hr style="width: 80%; margin: 0 50px; border: 0; border-top: 5px solid;">
        <div class="row d-flex ps-5 pt-3 pb-3">
            <div class="col-6">
                <label for="" style="font-family:Montserrat-Regular;">Thẻ Visa, Master Card</label>
            </div>
            <div class="col-6 ">
                <input type="radio" name="qr">
            </div>
        </div>
    </section>

    <section id="button">
        <div class="pb-3"><button style="font-family:Montserrat-Regular;">Thanh Toán</button></div>
    </section>

       <!-- footer -->
       <?php
        include('footer.php');
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