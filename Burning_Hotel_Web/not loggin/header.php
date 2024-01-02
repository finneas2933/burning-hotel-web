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
</head>
<body>
    <header id="menu">
        <div class="menu-nav">
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid px-5">
              <a class="navbar-brand" href="#"><img src="../img/logoBurning.png" alt="BurningLogo" class="logo"> BURNING</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="sub-nav collapse navbar-collapse flex-row-reverse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                  <li class="nav-item p-3">
                    <a class="a nav-link active" aria-current="page" href="./index.html">Trang Chủ</a>
                </li>
                <li class="nav-item dropdown p-3">
                  <a class="nav-link dropdown-toggle" href="./allroom.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Phòng
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./allroom.php">All Room</a></li>
                    <li><a class="dropdown-item" href="./deluxroom.php">Deluxe Room</a></li>
                    <li><a class="dropdown-item" href="./executiveroom.php">Executive Room</a></li>
                    <li><a class="dropdown-item" href="./suiteroom.php">Suite Room</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown p-3">
                  <a class="nav-link dropdown-toggle" href="./service.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dịch Vụ
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./service.php">All Service</a></li>
                    <li><a class="dropdown-item" href="./restaurant.php">Restaurant</a></li>
                    <li><a class="dropdown-item" href="./bar.php">Bar</a></li>
                    <li><a class="dropdown-item" href="./fitness.php">Gym & Fitness</a></li>
                    <li><a class="dropdown-item" href="./washingcloses.php">washing closes</a></li>
                  </ul>
                </li>
                <li class="nav-item p-3">
                    <a class="nav-link" href="./roomcheck.php">Kiểm Tra Phòng</a>
                </li>
                <li class="nav-item p-3">
                  <a class="nav-link" href="./page.php">Về Chúng Tôi</a>
              </li>
                <li class="nav-item p-3">
                    <a class="nav-link" href="./contact.php">Liên Hệ</a>
                </li>
                  <li class="nav-item p-3 ms-5">
                      <a href="../index.php"><input type="button" value="Đăng nhập"></a>
                  </li>
                  <li class="nav-item p-3">                   
                      <a href="../dangky.php"><input type="button" value="Đăng ký"></a>
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