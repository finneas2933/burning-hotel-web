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
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/restaurant/main.css?v= <?php echo time(); ?>">
  <link rel="icon" href="../public_html/favicon.ico" type="image/png">
  <script src="https://kit.fontawesome.com/a0ff9460a2.js" crossorigin="anonymous"></script>
  <!-- CSS only -->
  <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
</head>

<body>
  <!-- header -->
  <?php include("./header.php") ?>
  <!-- banner -->
  <section id="banner">
    <div class="container-fluid p-0 text-center">
      <div class="img h-100">
        <img src="../img/restaurant/main/banner.png" alt="" class="w-100">
        <div class="box">
          <p
            style="border-top: 2px solid #937438;border-bottom: 2px solid #937438;text-align:left; width:100px; margin-bottom:0px">
            RESTAURANT</p>
          <b style="font-size: 45px;text-align:left;">Yêu là phải nói, đói là phải ăn</b>
          <p>Tạm gác hết những âu lo nhanh nhanh đến nhà hàng và “chill” cùng Burning Restaurant thôi! 😋</p>
          <div>
            <Button class="btbook">Đặt Bàn</Button>
            <Button class="btget">
              <a href="./menu.php" style="text-decoration: none;border: none;color: white;">Xem Menu</a></Button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end banner -->

  </section>
  <!--History -->
  <section id="history" class="py-5">
    <div class="container">
      <div class="row pb-5">
        <div class="col-4 d-flex">
          <div class="img d-flex p-2">
            <img src="../img/restaurant/main/icondiachi.png" alt="" class="rounded-circle"
              style="background-color: black;width:70px; height:70px">
          </div>
          <div class="content p-2">
            <h5>Địa Chỉ</h5>
            <p>33 Lý Thường Kiệt, Hoàn Kiếm, Hà Nội.</p>
          </div>
        </div>
        <div class="col-4 d-flex">
          <div class="img d-flex p-2">
            <img src="../img/restaurant/main/icondiachi.png" alt="" class="rounded-circle"
              style="background-color: black;width:70px; height:70px">
          </div>
          <div class="content p-2">
            <h5>Giờ Mở Cửa</h5>
            <p>Cả tuần từ 9:00 AM - 9:00 PM</p>
          </div>
        </div>
        <div class="col-4 d-flex">
          <div class="img d-flex p-2">
            <img src="../img/restaurant/main/icondiachi.png" alt="" class="rounded-circle"
              style="background-color: black;width:70px; height:70px">
          </div>
          <div class="content p-2">
            <h5>Đặt Trước</h5>
            <p>7steam.chef@gmail.com</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6" style="border-right: 1px solid #B29A90">
          <img src="../img/restaurant/main/anh1.png" alt="" class="img-fluid" style="width:500px">
        </div>
        <div class="col-6 content ps-5">
          <h3>The Story</h3>
          <p>Dịp lễ này, không cần những món quà đắt đỏ, hay những bó hoa rực rỡ, mà đơn giản hơn, Burning Restaurant
            muốn cùng bạn đưa người ấy tận hưởng một buổi tối ngọt ngào, nhẹ nhàng và đầy sự trải nghiệm.</p>
          <div class="row">
            <div class="col-6">
              <h3>Single</h3>
              <p>Dành thời gian một mình tại khách sạn, tận hưởng sự riêng tư và chăm sóc đặc biệt dành cho bạn.</p>
            </div>
            <div class="col-6">
              <h3>Couple</h3>
              <p>Tìm một nơi không có ai nhìn chúng ta, tìm một nơi mà chúng ta không ai tìm! Buổi tối lãng mạng của đôi
                ta.</p>
            </div>
            <div class="col-6">
              <h3>Family</h3>
              <p>Gia đình là trái tim của chúng tôi. Tại đây, mọi khoảnh khắc là niềm vui và kỷ niệm đáng nhớ.</p>
            </div>
            <div class="col-6">
              <h3>Team Building</h3>
              <p>Hội hè hoàn hảo tại khách sạn, nơi tạo nên không khí thân thiện và gắn kết với đồng đội và công ty.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end History-->

  <!-- Menu -->
  <section id="menumonan" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-4">
          <p class="m-0" style="border-top: 2px solid #937438;border-bottom: 2px solid #937438; width: 48px">MENU</p>
          <h3>Burning Restaurant</h3>
          <p>Thực đơn đa dạng, phong phú Nhà hàng Việt Nam phục vụ một thực đơn đa dạng, phong phú với nhiều món ăn đặc
            sắc của Việt Nam</p>
          <img src="../img/restaurant/main/anh4.png" alt="" class="img-fluid">
          <button> <a href="./menu.php" style="text-decoration: none;color:#937438">See all dishes</a></button>
        </div>
        <div class="col-1"></div>
        <div class="col-7 p-4">
          <h4>Best Sellers</h4>
          <div class="row">
            <?php
            $sql = "SELECT * FROM doan ORDER BY SoLuongDaBan DESC LIMIT 8";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-2 d-flex justify-content-center">
                  <?php
                  echo '<img src="' . $row["img"] . '" alt="" class="rounded-circle" style="width:70px; height:70px">
            </div>
            <div class="col-7">
            <h4>' . $row["TenMon"] . ' </h4>
              <p>' . $row["ThanhPhan"] . '</p>
            </div>
            <div class="col-3 d-flex align-items-end justify-content-end">
              <b style="margin-bottom: 1rem;">' . number_format($row["ThanhTien"]) . ' VNĐ</b>
            </div>';
              }
            }
            ?>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- end Menu -->

  <!-- service -->
  <section id="service">
    <div class="container py-5">
      <div class="row bg-right">
        <div class="col-6 py-4 ps-0">
          <p style="border-top: 2px solid #937438;border-bottom: 2px solid #937438;text-align:left; width:67px">FEATURE
          </p>
          <h3 style="width:400px">Hương vị quê nhà</h3>
          <p style="width:600px">Tất cả các nguyên liệu của nhà hàng đều được tuyển chọn kỹ lưỡng, đảm bảo tươi ngon và
            chất lượng. Các món ăn được chế biến bởi đội ngũ đầu bếp chuyên nghiệp, giàu kinh nghiệm, mang đến cho bạn
            những hương vị thơm ngon, hấp dẫn.</p>
          <button class="p-2"><a href="./menu.php" style="text-decoration: none;color:#937438">View menu</a></button>
        </div>
        <div class="col-6 p-0">
          <div class="img1 d-flex justify-content-end">
            <img src="../img/restaurant/main/anh3.png" alt="" style="width: 600px;">
          </div>
        </div>
      </div>
      <div class="row bg-left">
        <div class="col-6 p-0">
          <div class="img1 d-flex justify-content-start">
            <img src="../img/restaurant/main/anh2.png" alt="" style="width: 600px;">
          </div>
        </div>
        <div class="col-6 p-4">
          <p style="border-top: 2px solid #937438;border-bottom: 2px solid #937438;text-align:left; width:67px">FEATURE
          </p>
          <h3>Đội ngũ đầu bếp tâm huyết</h3>
          <p style="width:600px">Khám phá sức sáng tạo và đam mê ẩm thực cùng đội ngũ đầu bếp tâm huyết của chúng tôi.
            Mỗi bữa ăn là một tác phẩm nghệ thuật, chăm sóc từng chi tiết nhỏ để mang đến trải nghiệm ẩm thực độc đáo và
            đầy cảm xúc từ đó mỗi bữa ăn trở thành một cuộc phiêu lưu ngon miệng và đáng nhớ </p>
          <button class="p-2"><a href="./chef__list.php" style="text-decoration: none;color:#937438">Xem
              thêm</a></button>
        </div>
      </div>
    </div>
  </section>
  <!-- end service -->

  <!-- book table -->
  <?php
  include('booktable.php')
    ?>
  <!-- footer -->
  <?php
  include('../logged/footer.php');
  ?>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script>
    $(".btbook").click(function () {
      var targetOffset = $("#booktable").offset().top;
      $('html,body').animate({ scrollTop: targetOffset }, 0);
    });
  </script>
  <!-- <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
  <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script> -->
</body>

</html>