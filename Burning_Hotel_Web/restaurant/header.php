<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
  <title>Document</title>
  <link rel="icon" href="../public_html/favicon.ico" type="image/png">
</head>

<body>
  <header id="menu">
    <div class="menu-nav">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-5">
          <a class="navbar-brand" href="../logged/home.php"><img src="../img/logoBurning.png" alt="BurningLogo" class="logo" style="opacity: 0.75;">
            BURNING</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="sub-nav collapse navbar-collapse flex-row-reverse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item p-3 me-4">
                <a class="a nav-link active" aria-current="page" href="../logged/home.php">Trang Chủ</a>
              </li>
              <li class="nav-item dropdown p-3 me-4">
                <a class="nav-link dropdown-toggle" href="../logged/allroom.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Phòng
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../logged/allroom.php">All Room</a></li>
                  <li><a class="dropdown-item" href="../logged/deluxroom.php">Deluxe Room</a></li>
                  <li><a class="dropdown-item" href="../logged/executiveroom.php">Executive Room</a></li>
                  <li><a class="dropdown-item" href="../logged/suiteroom.php">Suite Room</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown p-3 me-4">
                <a class="nav-link dropdown-toggle" href="../logged/service.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dịch Vụ
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../logged/service.php">All Service</a></li>
                  <li><a class="dropdown-item" href="./index.php">Restaurant</a></li>
                  <li><a class="dropdown-item" href="../logged/bar.php">Bar</a></li>
                  <li><a class="dropdown-item" href="../logged/fitness.php">Gym & Fitness</a></li>
                  <li><a class="dropdown-item" href="../logged/washingcloses.php">washing closes</a></li>
                </ul>
              </li>
              <li class="nav-item p-3 me-4">
                <a class="nav-link" href="./index.php">Nhà Hàng</a>
              </li>
              <li class="nav-item p-3 me-4">
                <a class="nav-link" href="../logged/roomcheck.php">Kiểm Tra Phòng</a>
              </li>
              
              <li class="nav-item p-3 me-4">
                <a class="nav-link" href="../logged/contact.php">Liên Hệ</a>
              </li>
              <li class="nav-item ms-4">
                <div class="dropdown">
                  <button class="btn-secondary dropdown-toggle border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="fa-stack fa-2x">
                      <i class="fa fa-circle-thin fa-stack-2x" style="color: #B89146;"></i>
                      <i class="fa fa-user-o fa-stack-1x" style="color: #B89146;"></i>
                    </span>
                  </button>
                  <ul class="dropdown-menu">
                    <li style="color: white; text-align: center; text-transform:capitalize"><?php echo $_SESSION['ten'] ?></li>
                    <li><a class="dropdown-item" href="../logged/infor.php"><img src="../img/icon_ThongTinCaNhan.png" alt="" class="icon"> Thông Tin Cá Nhân</a></li>
                    <li><a class="dropdown-item" href="../logged/history.php"><img src="../img/icon_NgayDat.png" alt="" class="icon">Lịch Sử Đặt Phòng</a></li>
                    <li><a class="dropdown-item" href="../logout.php"><img src="../img/icon_DangXuat.png" alt="" class="p-1" height="34px">Đăng Xuất</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
  <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
</body>

</html>