<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="KiemTraNgay.js"></script>
</head>

<body>
  <?php
    include('../config.php');
  ?>
  <section id="checknow">
    <div class="container check text-white " style="height: 97px;">
      <form action="roomstyle.php" onsubmit="return kiemtrangay()" method="POST">
        <div class="row" style="margin: 0 auto; padding:20px">
          <div class="col">
            <p class="m-0"> Check-in </p>
            <input type="datetime-local" name="ngayden" id="ngayden" onchange="chonngayden()" value="" required>
            <b id="thongbaongayden" style="color: red; font-size: 12px;"></b>
            <?php
             $ngayhientai=date("d-m-Y ", time());
            ?>
          </div>
          <div class="col">
            <p class="m-0">
              Check-out
            </p>            
            <input type="datetime-local" name="ngaydi" id="ngaydi" onchange="chonngaydi()" value="" required>
            <b id="thongbaongaydi" style="color: red; font-size: 12px;"></b>
          </div>
          <div class="col">
            <p class="m-0">
              Số Lượng
            </p>
            <div>
              <select name="room" id="room">
                <?php
                  for ($i = 1; $i <= 6; $i++) {
                    echo "<option value='$i'>$i người</option>";
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col">
            <p class="m-0">
              Loại Phòng
            </p>
              <select name="category" id="category">
                <?php
                  $sql = "SELECT DISTINCT LoaiPhong FROM phong";
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value ='" . $row['LoaiPhong'] . "'>" . $row["LoaiPhong"] . "</option>";
                    }
                  }
                ?>
              </select>
          </div>
          <div class="col" style="align-items: center;">
            <input class="buttonCheck" type="submit" name="btn" value="Check Now">
          </div>
          <script>
                function kiemtrangay() {
                  thongbaoden = document.getElementById("thongbaongayden").innerHTML;
                  thongbaodi = document.getElementById("thongbaongaydi").innerHTML;

                  if (thongbaoden || thongbaodi) {
                    alert("Vui lòng kiểm tra lại thông tin!");
                    return false; 
                  } 
                  else {
                    return true;
                  }
                }
          </script>
        </div>
      </form>

    </div>
  </section>
</body>
</html>