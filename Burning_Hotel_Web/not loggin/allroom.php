<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/allroom.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a0ff9460a2.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
                    <h3 style="font-size:36px;font-family: Montserrat-Bold;">All Room</h3>
                    <div class="trangtri"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->

         <div class="main">
            <div class="main_menu">
                <p>Booking now</p>
                <div class="form">
                    <form action="">
                        <div class="form_item"><input type="datetime-local" name="ngayden" id="ngay" placeholder="Check In"></div> 
                         <div class="form_item"><input type="datetime-local" name="ngaydi" id="ngay" placeholder="Check Out"></div> 
                        <div class="form_item">
                            <select name="" id="room">
                                <option value="">Room</option>
                            </select>       
                        </div>
                        <div class="form_item">
                            <select name="" id="category">
                                <option value="">Category</option>
                            </select>
                        </div>
                        <div class="btn">
                            <input class="check" type="button" value="Check">
                            <img src=".../ICON/icon_muiten.png" alt="">
                        </div>
                        </div>
                </form>
            </div>
            <div class="main_room">
                <div class="main_room1">
                    <div class="main_room1_1">
                        <div class="main_anh"><img src="../img/allroom/Junior_suite.jpg" alt="" ></div>
                        <div class="main_nd">
                            <p>$205/Night</p>
                            <p>Junior Suite</p>
                            <p>facilisis tempor erat facilisis. Proin<br>imperdiet rutrum cursus</p>
                            <div class="icon">
                                <span class="icon_giuong"><img  src="../img/icon_Room.png" width="30px" height="20px" >(2)bed's </span>
                                <span class="icon_nguoi" ><img  src="../img/icon_3p.png" alt="" width="30px" height="20px">(2)Guest's</span>
                            </div>
                        </div>
                    </div>
                    <div class="main_room1_2">
                        <div class="main_anh"><img src="../img/allroom/Superior_suite.jpg" alt="" ></div>
                        <div class="main_nd">
                            <p>$205/Night</p>
                            <p>Superior Room</p>
                            <p>facilisis tempor erat facilisis. Proin<br>imperdiet rutrum cursus</p>
                            <div class="icon">
                                <span class="icon_giuong"><img  src="../img/icon_Room.png" width="30px" height="20px" >(2)bed's </span>
                                <span class="icon_nguoi" ><img  src="../img/icon_3p.png" alt="" width="30px" height="20px">(2)Guest's</span>
                            </div>
                        </div>
                    </div>
                    <div class="main_room1_3">
                        <div class="main_anh"><img src="../img/allroom/Single_room.jpg" alt="" ></div>
                        <div class="main_nd">
                            <p>$205/Night</p>
                            <p>Single Room</p>
                            <p>facilisis tempor erat facilisis. Proin<br>imperdiet rutrum cursus</p>
                            <div class="icon">
                                <span class="icon_giuong"><img  src="../img/icon_Room.png" width="30px" height="20px" >(2)bed's </span>
                                <span class="icon_nguoi" ><img  src="../img/icon_3p.png" alt="" width="30px" height="20px">(2)Guest's</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="main_room2">
                        <div class="main_room2_1">
                            <div class="main_anh"><img src="../img/allroom/Deluxe_room.jpg" alt="" ></div>
                            <div class="main_nd">
                                <p>$205/Night</p>
                                <p>Deluxe Room</p>
                                <p>facilisis tempor erat facilisis. Proin<br>imperdiet rutrum cursus</p>
                                <div class="icon">
                                    <span class="icon_giuong"><img  src="../img/icon_Room.png" width="30px" height="20px" >(2)bed's </span>
                                    <span class="icon_nguoi" ><img  src="../img/icon_3p.png" alt="" width="30px" height="20px">(2)Guest's</span>
                                </div>
                            </div>
                        </div>
                        <div class="main_room2_2">
                            <div class="main_anh"><img src="../img/allroom/Standard_room.jpg" alt="" ></div>
                            <div class="main_nd">
                                <p>$205/Night</p>
                                <p>Standard Room</p>
                                <p>facilisis tempor erat facilisis. Proin<br>imperdiet rutrum cursus</p>
                                <div class="icon">
                                    <span class="icon_giuong"><img  src="../img/icon_Room.png" width="30px" height="20px" >(2)bed's </span>
                                    <span class="icon_nguoi" ><img  src="../img/icon_3p.png" alt="" width="30px" height="20px">(2)Guest's</span>
                                </div>
                            </div>
                        </div>
                        <div class="main_room2_3">
                            <div class="main_anh"><img src="../img/allroom/family_room.jpg" alt="" ></div>
                            <div class="main_nd">
                                <p>$205/Night</p>
                                <p>Family Room</p>
                                <p>facilisis tempor erat facilisis. Proin<br>imperdiet rutrum cursus</p>
                                <div class="icon">
                                    <span class="icon_giuong"><img  src="../img/icon_Room.png" width="30px" height="20px" >(2)bed's </span>
                                    <span class="icon_nguoi" ><img  src="../img/icon_3p.png" alt="" width="30px" height="20px">(2)Guest's</span>
                                </div>
                            </div>
                        </div>
                        </div> 
                        <div class="main_room3">
                            <div class="main_room3_1">
                                <div class="main_anh"><img src="../img/allroom/Deluxe_room1.jpg" alt="" ></div>
                                <div class="main_nd_anh">
                                    <p >$205/Night</p>
                                    <p>Deluxe Room</p>
                                    <p>facilisis tempor erat facilisis. Proin<br>imperdiet rutrum cursus</p>
                                    <div class="icon">
                                        <span class="icon_giuong"><img  src="../img/icon_Room.png" width="30px" height="20px" >(2)bed's </span>
                                        <span class="icon_nguoi" ><img  src="../img/icon_3p.png" alt="" width="30px" height="20px">(2)Guest's</span>
                                    </div>
                                </div>
                            </div>
                            <div class="main_room3_2">
                                <div class="main_anh"><img src="../img/allroom/Standard_room1.jpg" alt="" ></div>
                                <div class="main_nd_anh">
                                    <p>$205/Night</p>
                                    <p>Standard Room</p>
                                    <p>facilisis tempor erat facilisis. Proin<br>imperdiet rutrum cursus</p>
                                    <div class="icon">
                                        <span class="icon_giuong"><img  src="../img/icon_Room.png" width="30px" height="20px" >(2)bed's </span>
                                        <span class="icon_nguoi" ><img  src="../img/icon_3p.png" alt="" width="30px" height="20px">(2)Guest's</span>
                                    </div>
                                </div>
                            </div>
                            <div class="main_room3_3">
                                <div class="main_anh"><img src="../img/allroom/family_room1.jpg" alt="" ></div>
                                <div class="main_nd_anh">
                                    <p>$205/Night</p>
                                    <p>Family Room</p>
                                    <p>facilisis tempor erat facilisis. Proin<br>imperdiet rutrum cursus</p>
                                    <div class="icon">
                                        <span class="icon_giuong"><img  src="../img/icon_Room.png" width="30px" height="20px" >(2)bed's </span>
                                        <span class="icon_nguoi" ><img  src="../img/icon_3p.png" alt="" width="30px" height="20px">(2)Guest's</span>
                                    </div>
                                    </div>
                            </div>
                            </div>  
                </div>
         </div>

        <!-- footer -->
        <?php
        include('footer.php');
        ?>
        <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
        <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <script>
            flatpickr("#ngay", {
              enableTime: false,
              dateFormat: "d.m.Y"
            });
        </script>
</body>
</html>