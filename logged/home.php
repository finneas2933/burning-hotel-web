<?php
require_once '../config.php';

session_start();

if (isset($_GET['code'])) {
  // Xử lý đăng nhập qua Google
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  if (isset($token['access_token'])) {
    $client->setAccessToken($token['access_token']);
  } else {
    $token['access_token'] = null;
    $client->setAccessToken($token);
  }

  // Lấy thông tin người dùng từ Google
  $google_oauth = new Google\Service\Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();

  $email = $google_account_info['email'];

  // Kiểm tra xem người dùng đã tồn tại trong cơ sở dữ liệu dựa trên email
  $sql = "SELECT * FROM khachhang WHERE Email = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // Người dùng đã tồn tại, chuyển hướng sang trang home.php
    $userinfo = $result->fetch_assoc();
    $_SESSION['ten'] = $userinfo['HoTen'];
    $_SESSION['makhachhang'] = $userinfo['ID'];
    // echo "Email: " . $_SESSION['makhachang'];
    $_SESSION['email'] = $email;
    header("Location: home.php");
    exit;
  } else {
    // Người dùng chưa tồn tại, thêm vào cơ sở dữ liệu
    $full_name = $google_account_info['name'];
    $token = $google_account_info['id'];

    $sql = "INSERT INTO khachhang(HoTen, SDT, Email, CMND, PassWord, AccessToken)
                VALUES (?, '', ?, '', '', ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $full_name, $email, $token);
    $stmt->execute();

    if (!$stmt) {
      echo "User is not created";
      die();
    }

    $userinfo = [
      'email' => $email,
      'full_name' => $full_name,
      'token' => $token
    ];
    $_SESSION['ten'] = $full_name;
    $_SESSION['email'] = $email;

    header("Location: resgiterwithgoogle.php");
  }

  // Lưu thông tin người dùng vào phiên
  $_SESSION['email'] = $email;
  header("Location: resgiterwithgoogle.php");
}

if (!isset($_SESSION['email'])) {
  // Chưa đăng nhập, chuyển về trang đăng nhập
  header("Location: ../index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- link css bootstrap -->
  <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
  <!-- link slick -->
  <link rel="stylesheet" type="text/css" href="../common/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="../common/slick/slick-theme.css">
  <!-- <link rel="stylesheet" href="../css/style.css"> -->
  <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>" type='text/css'>
  <link rel="stylesheet" href="../css/trangchu1.css?v=<?php echo time(); ?>" type='text/css'>
  <link rel="icon" href="../public_html/favicon.ico" type="image/png">
</head>

<body>
  <!-- header -->
  <?php include('header.php'); ?>

  <!-- Slider -->
  <section id="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="true">
      <!-- <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
             
          </div> -->
      <div class="carousel-inner">
        <div class="slide-item carousel-item active">
          <img src="../img/trangchu1/banner_1.jpg" class="d-block w-100 img-fluid" height="auto" alt="">
          <div class="carousel-btn d-md-block">
          </div>
        </div>
        <div class="slide-item carousel-item">
          <img src="../img/trangchu1/banner_1.jpg" class="d-block w-100 img-fluid" height="auto" alt="">
          <div class="carousel-btn d-md-block">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <!-- endSlider -->

  <!-- checknow -->
  <?php include('thanhcheck.php'); ?>
  <!-- end checknow -->

  <!-- Accommodations -->
  <section id="accommodations">
    <div class="container">
      <div class="row">
        <div class="col-5">
          <p style="color: #937438;font-family: Montserrat-Regular;">Accommodations</p>
          <h3>Chào Mừng Đến Với Khách Sạn Và Khu Nghỉ Dưỡng Của Chúng Tôi</h3>
          <p class="mb-5 mt-4" style="color: #707070;width: 350px;font-family: Montserrat-Regular;">Những du khách hiểu biết không chỉ tìm kiếm điểm đến tiếp theo trên bản đồ. Họ đang tìm kiếm một trải nghiệm đáng nhớ và kết bạn mới trên đường đi.</p>
          <button class="mt-4">READ NOW <i class="fa fa-long-arrow-right"></i></button>
        </div>
        <div class="col-7">
          <div class="right">
            <div class="img-1">
              <img src="../img/trangchu1/accommodations_1.jpg" alt="">
              <div class="img-2">
                <img src="../img/trangchu1/accommodations_2.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end Accommodations -->

  <!-- room -->
  <section id="room">
    <div class="container">
      <div class="row">
        <div class="col-5">
          <p class="m-0" style="color: #937438;font-family: Montserrat-Regular;">Deluxe And Luxury</p>
          <h3>Our Luxury Rooms</h3>
        </div>
        <div class="col-7 d-flex justify-content-end" style="align-items: center;">
          <ul class="nav nav-pills">
            <li class="nav-item p-2">
              <a class="nav-link active  rounded-0" aria-current="page" href="allroom.php" style="background-color:#937438;">All</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link active rounded-0" href="./deluxroom.php" style="background-color:black;">Deluxe</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link active rounded-0" href="./executiveroom.php" style="background-color:black;">Executive</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link active rounded-0" href="./suiteroom.php" style="background-color:black;">Suite</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container pb-5">
      <div class="row">
        <div class="col-3">
          <div class="img h-100">
            <img src="../img/trangchu1/accommodations_1.jpg" alt="" class="img-fluid h-100">
            <div class="content">
              <p class="m-0"><span style="color:#BB9959;">$134</span>/Đêm</p>
              <h5>Small Suite</h5>
              <div class="trangtri"></div>
              <a href="#" style="font-size: 14px; font-family: Montserrat-Medium;"><i class="fa fa-chevron-circle-right"></i> BOOKING NOW</a>
            </div>
          </div>

        </div>
        <div class="col-6">
          <div class="img">
            <img src="../img/trangchu1/room_2.jpg" alt="" class="img-fluid">
            <div class="content">
              <p class="m-0"><span style="color:#BB9959;">$199</span>/Đêm</p>
              <h5>Deluxe Room</h5>
              <div class="trangtri1"></div>
              <a href="#" style="font-size: 14px; font-family: Montserrat-Medium;"><i class="fa fa-chevron-circle-right"></i> BOOKING NOW</a>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="img">
            <img src="../img/trangchu1/room_3.jpg" alt="" class="img-fluid h-100">
            <div class="content">
              <p class="m-0"><span style="color:#BB9959;">$134</span>/Đêm</p>
              <h5>Small Suite</h5>
              <div class="trangtri"></div>
              <a href="#" style="font-size: 14px; font-family: Montserrat-Medium;"><i class="fa fa-chevron-circle-right"></i> BOOKING NOW</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- end room -->

  <!-- deals -->
  <section id="deals">
    <div class="container-fluid p-0">
      <div class="img">
        <img src="../img/trangchu1/deals.jpg" alt="" class="w-100 h-100">
        <div class="box">
          <h3>Đặt phòng khách sạn, nhận ưu đãi & <br> đặt vé máy bay trực tuyến.</h3>
        </div>
      </div>
    </div>
  </section>
  <!-- end deals -->

  <!-- service -->
  <section id="service">
    <div class="container-fluid">
      <div class="row p-5">
        <div class="col-4 d-flex">
          <div class="img d-flex">
            <img src="../img/trangchu1/icon_Cleaning.png" alt="" class="rounded-circle p-2" style="background-color: #1C1F20;">
          </div>
          <div class="content p-3">
            <h5>Room Cleaning</h5>
            <p>Proin massa augue, lacinia at blandit ac, fringilla scelerisque tortor</p>
          </div>
        </div>
        <div class="col-4 d-flex">
          <div class="img d-flex">
            <img src="../img/trangchu1/icon_Wifi.png" alt="" class="rounded-circle p-2" style="background-color: #1C1F20;">
          </div>
          <div class="content p-3">
            <h5>Room Wifi</h5>
            <p>Proin massa augue, lacinia at blandit ac, fringilla scelerisque tortor</p>
          </div>
        </div>
        <div class="col-4 d-flex">
          <div class="img d-flex">
            <img src="../img/trangchu1/icon_Map.png" alt="" class="rounded-circle p-2" style="background-color: #1C1F20;">
          </div>
          <div class="content p-3">
            <h5>Pickup & Drop</h5>
            <p>Proin massa augue, lacinia at blandit ac, fringilla scelerisque tortor</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container pb-5">
      <div class="row ps-5 bg-right mb-100">
        <div class="col-5 p-4">
          <p style="color:#937438;">Food</p>
          <h3>Restaurant Burning</h3>
          <p>Với sự hợp tác giữa BURNING và VINFAST cùng với mong muốn cho quý khách thì bên chúng tôi có dịch vụ ăn uống bao gồm đặt đồ lên phòng hoặc đặt bàn dưới nhà ăn </p>
          <a href = "../restaurant/index.php"><button class="p-2" >READING NOW<i class="fa fa-long-arrow-right"></i></button></a>
          
        </div>
        <div class="col-7 p-0">
          <div class="img1 d-flex justify-content-end">
            <img src="../img/trangchu1/service_1.jpg" alt="" style="width: 600px;">
          </div>
        </div>
      </div>
      <div class="row pe-5 bg-left mb-100">
        <div class="col-7 p-0">
          <div class="img1 d-flex justify-content-start">
            <img src="../img/trangchu1/service_2.jpg" alt="" style="width: 600px;">
          </div>
        </div>
        <div class="col-5 p-4">
          <p style="color:#937438;">Fitness Equipment</p>
          <h3>Finess Center Burning</h3>
          <p>Với sự hợp tác giữa BURNING và VINFAST cùng với mong muốn cho quý khách thì bên chúng tôi có dịch vụ ăn uống bao gồm đặt đồ lên phòng hoặc đặt bàn dưới nhà ăn </p>
          <button class="p-2">READING NOW <i class="fa fa-long-arrow-right"></i></button>
        </div>
      </div>
      <div class="row ps-5 bg-right mb-100">
        <div class="col-5 p-4">
          <p style="color:#937438;">Experiences</p>
          <h3>Burning Bar</h3>
          <p>Với sự hợp tác giữa BURNING và VINFAST cùng với mong muốn cho quý khách thì bên chúng tôi có dịch vụ ăn uống bao gồm đặt đồ lên phòng hoặc đặt bàn dưới nhà ăn </p>
          <button class="p-2">READING NOW <i class="fa fa-long-arrow-right"></i></button>
        </div>
        <div class="col-7 p-0">
          <div class="img1 d-flex justify-content-end">
            <img src="../img/trangchu1/service_3.jpg" alt="" style="width: 600px;">
          </div>
        </div>
      </div>
      <div class="row pe-5 bg-left mb-100">
        <div class="col-7 p-0">
          <div class="img1 d-flex justify-content-start">
            <img src="../img/trangchu1/service_4.jpg" alt="" style="width: 600px;">
          </div>
        </div>
        <div class="col-5 p-4">
          <p style="color:#937438;">Fitness Equipment</p>
          <h3>Washing clothes super fast</h3>
          <p>Với sự hợp tác giữa BURNING và VINFAST cùng với mong muốn cho quý khách thì bên chúng tôi có dịch vụ ăn uống bao gồm đặt đồ lên phòng hoặc đặt bàn dưới nhà ăn </p>
          <button class="p-2">READING NOW <i class="fa fa-long-arrow-right"></i></button>
        </div>
      </div>
    </div>
  </section>
  <!-- end service -->

  <!-- footer -->
  <?php include('footer.php'); ?>

  <script>
    var makh = <?php echo json_encode($_SESSION['makhachhang']); ?>;
    localStorage.setItem("makhachhang", makh);
</script>
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