<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/roomstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->
    <title>Document</title>
</head>

<body>
      <!-- header -->
   <?php
        include('header.php');
        ?>

    <!-- banner -->
    <section id="banner">
        <div class="container-fluid p-0 text-center">
            <div class="img h-100">
                <img src="../img/pay/banner.jpg" alt="" class="w-100">
                <div class="box">
                    <div class="trangtri"></div>
                    <p class="m-0" style="font-size: 14px;font-family: Montserrat-Regular">Home - <span
                            style="color: #C89E4B;">Service</span></p>
                    <h3 style="font-size:36px;font-family: Montserrat-Bold;">Room Style</h3>
                    <div class="trangtri"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- end banner -->
   
    <!-- main -->
    <div class="main">
        <div class="main_menu">
            <p>Booking now</p>
            <div class="form">
                <form action="" method="POST">
                    <div class="form_item"><input type="datetime-local" name="ngayden" id="ngay" placeholder="Check In" value="">
                    </div>
                    <div class="form_item"><input type="datetime-local" name="ngaydi" id="ngay" placeholder="Check Out" value="">
                    </div>
                    <div class="form_item">
                        <select name="" id="room">
                             <option value="">Delexe</option>
                             <option value="">Suite</option>
                        </select>
                    </div>
                    <div class="form_item">
                        <select name="" id="category">
                        
                        </select>
                    </div>
                    <div class="btn">
                        <input class="check" type="button" value="Check -->">
                    </div>
            </div>
            </form>

        </div>
        <div class="mainroom">
            <div class="mainroom_1">
                <div class="mainroom12">
                    <img src="../img/roomstyle/Deluxe_normal.jpg" alt="" width="250px" height="200px">
                </div>
                <div class="mainroom11">
                    <p class="mainroom111">Deluxe normal (807)</p>
                    <p class="mainroom112">Sawy trevelers are looking for more than just the<br> next destination on
                        the map
                        . They are looking for a<br> memorable experience.</p>
                    <div class="icon">
                        <span class="icon_giuong"><img src="../img/icon_Room.png" width="35px" height="30px">(2)bed's
                        </span>
                        <span class="icon_nguoi"><img src="../img/icon_3p.png" alt="" width="35px"
                                height="30px">(3)Guest's</span>
                    </div>
                </div>
                <div class="mainroom13">
                    <div class="mainroom131">$205/Night</div>
                    <div class="mainroom132">2.9/5</div>
                    <div class="mainroom133">READ MORE</div>
                </div>
            </div>
            <div class="mainroom_2">
                <div class="mainroom12">
                    <img src="../img/roomstyle/junior_suite.jpg" alt="" width="250px" height="200px">
                </div>
                <div class="mainroom11">
                    <p class="mainroom111">Junior Suite</p>
                    <p class="mainroom112">Sawy trevelers are looking for more than just the<br> next destination on
                        the map
                        .They are looking for a<br> memorable experience.</p>
                        <div class="icon">
                            <span class="icon_giuong"><img src="../img/icon_Room.png" width="35px" height="30px">(2)bed's
                            </span>
                            <span class="icon_nguoi"><img src="../img/icon_3p.png" alt="" width="35px"
                                    height="30px">(3)Guest's</span>
                        </div>
                </div>
                <div class="mainroom13">
                    <div class="mainroom131">$205/Night</div>
                    <div class="mainroom132">2.9/5</div>
                    <div class="mainroom133">READ MORE</div>
                </div>
            </div>
            <div class="mainroom_3">
                <div class="mainroom12">
                    <img src="../img/roomstyle/double_room.jpg" alt="" width="250px" height="200px">
                </div>
                <div class="mainroom11">
                    <p class="mainroom111">Double Room</p>
                    <p class="mainroom112">Sawy trevelers are looking for more than just the<br> next destination on
                        the map
                        . They are looking for a<br> memorable experience.</p>
                        <div class="icon">
                            <span class="icon_giuong"><img src="../img/icon_Room.png" width="35px" height="30px">(2)bed's
                            </span>
                            <span class="icon_nguoi"><img src="../img/icon_3p.png" alt="" width="35px"
                                    height="30px">(3)Guest's</span>
                        </div>
                </div>
                <div class="mainroom13">
                    <div class="mainroom131">$205/Night</div>
                    <div class="mainroom132">2.9/5</div>
                    <div class="mainroom133">READ MORE</div>
                </div>
            </div>
            <div class="mainroom_4">
                <div class="mainroom12">
                    <img src="../img/roomstyle/small_suite.jpg" alt="" width="250px" height="200px">
                </div>
                <div class="mainroom11">
                    <p class="mainroom111">Small Suite</p>
                    <p class="mainroom112">Sawy trevelers are looking for more than just the<br> next destination on
                        the map
                        . They are looking for a<br> memorable experience.</p>
                        <div class="icon">
                            <span class="icon_giuong"><img src="../img/icon_Room.png" width="35px" height="30px">(2)bed's
                            </span>
                            <span class="icon_nguoi"><img src="../img/icon_3p.png" alt="" width="35px"
                                    height="30px">(3)Guest's</span>
                        </div>
                </div>
                <div class="mainroom13">
                    <div class="mainroom131">$205/Night</div>
                    <div class="mainroom132">2.9/5</div>
                    <div class="mainroom133">READ MORE</div>
                </div>
            </div>
            <div class="mainroom_5">
                <div class="mainroom12">
                    <img src="../img/roomstyle/Luxury_room.jpg" alt="" width="250px" height="200px">
                </div>
                <div class="mainroom11">
                    <p class="mainroom111">Luxury Room</p>
                    <p class="mainroom112">Sawy trevelers are looking for more than just the<br> next destination on
                        the map
                        . They are looking for a<br> memorable experience.</p>
                        <div class="icon">
                            <span class="icon_giuong"><img src="../img/icon_Room.png" width="35px" height="30px">(2)bed's
                            </span>
                            <span class="icon_nguoi"><img src="../img/icon_3p.png" alt="" width="35px"
                                    height="30px">(3)Guest's</span>
                        </div>
                </div>
                <div class="mainroom13">
                    <div class="mainroom131">$205/Night</div>
                    <div class="mainroom132">2.9/5</div>
                    <div class="mainroom133">READ MORE</div>
                </div>
            </div>
        </div>
    </div>
    <!--end main -->
     <!-- footer -->
     <?php
        include('footer.php');
        ?>


    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <!-- <script>
        flatpickr("#ngay", {
            enableTime: false,
            dateFormat: "d.m.Y"
        });
    </script> -->
</body>

</html>