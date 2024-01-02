<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Check</title>
    <link rel="stylesheet" href="../css/roomcheck.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/a0ff9460a2.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="common/bootstrap-5.2.2-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
                    <h3 style="font-size:36px;font-family: Montserrat-Bold;">Room Check</h3>
                    <div class="trangtri"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- end banner -->
    <section id="check">
       <div class="checkroom_infor">
        <div class="infor_item"><input  type="text" name="" id="ten" placeholder="Nhập mã phòng"></div>
        <div class="infor_item"><input  type="text" name="" id="sdt" placeholder="Nhập số điện thoại"></div>         
        <div class="infor_item "><input id="btn" type="button" name="btn"  value="Kiểm Tra"></div> 
    </div>  
    </section>

     <!-- footer -->
     <?php
        include('footer.php');
        ?>

    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
     <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
</body> 
</html>