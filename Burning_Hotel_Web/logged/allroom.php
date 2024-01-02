<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/allroom.css?v=<?php echo time(); ?>" type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a0ff9460a2.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="KiemTraNgay.js"></script>
    <title>Document</title>
</head>

<body>

    <!-- header -->
    <?php
        include('header.php');
        include('../config.php')
    ?>

    <!-- banner -->
    <div class="header">
            <img  src="../img/pay/banner.jpg" alt="">
             <div class="header_mota">   
                     <span class="mota1">Home</span>
                     <span class="mota2">-Room</span>
                     <p class="mota3">ALL ROOM</p>
             </div>
        </div>
    <!-- end banner -->

    <div class="main">
        <div class="main_menu">
            <p>Booking now</p>
            <?php
            if (isset($_POST['submit'])) {
                $ngayden = $_POST['ngayden'];
                $ngaydi =  $_POST['ngaydi'];
                $nguoi =   $_POST['room'];
                $phong =   $_POST['category'];
                $_SESSION['ngayden']= $ngayden;
                $_SESSION['ngaydi']=  $ngaydi;
            }
            ?>
          
            <div class="form">
                <form action="" method="POST">
                    <div class="form_item">
                        <input type="datetime-local" name="ngayden" id="ngayden" placeholder="Check In" onchange="chonngayden()" value="<?php echo $ngayden ?>" required></div>
                    <div id="thongbaongayden" style="color: red"></div>
                    <div class="form_item">
                        <input type="datetime-local" name="ngaydi"  id="ngaydi"  placeholder="Check Out"onchange="chonngaydi()" value="<?php echo $ngaydi ?>" required></div>
                    <div id="thongbaongaydi" style="color: red"></div>
                    <div class="form_item">
                        <select name="room" id="room">
                        <?php
                            if (isset($_POST['submit'])) {
                              
                                for ($i = 1; $i < 7; $i++) {
                                    $selected = ($nguoi == $i) ? 'selected' : '';
                                    echo "<option value='$i' $selected> $i người </option>";
                                }
                            }
                           
                            else {
                                for ($i = 1; $i < 7; $i++) {
                                  echo "<option value='$i'>$i người</option>";
                                }
                            }
                            
                        ?>

                        </select>
                    </div>
                    <div class="form_item">
                        <select name="category" id="category">
                        <?php
                            $sql = "SELECT DISTINCT LoaiPhong FROM phong";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                if (isset($_POST['submit'])) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $loaiphongs[] =  $row['LoaiPhong'];
                                    }
                                    foreach ($loaiphongs as $loaiphong) {
                                        $selected = ($phong == $loaiphong) ? 'selected' : '';
                                        echo "<option value='$loaiphong' $selected> $loaiphong </option>";
                                    }
                                }
                                else 
                                {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value ='".$row['LoaiPhong']."'>".$row["LoaiPhong"]."</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div >
                    <button  type="submit" onclick="return kiemtrangay()" name="submit"><img src="../img/icon_muiten.png">Check </button>
                    </div>
            </div>
            </form>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $sql = "SELECT * FROM phong WHERE SLMax >='" . $nguoi . "' AND  LoaiPhong='". $phong."' AND TrangThai='Trống' " ;
        }
        else {
            $sql = "SELECT * From phong where  TrangThai = 'Trống' ";
        }
            $result = mysqli_query($con, $sql);
            $phongs = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $phongs[] = array(
                        'KieuPhong' => $row['KieuPhong'], 'SLMax' => $row['SLMax'], "IMG" => $row['IMG'],
                        'GiaPhong' => $row['GiaPhong'],'MaPhong'=>$row['MaPhong']
                    );
                    
                }
            }
        ?>
           <div class="main_room">
           <div class="main_room1">
                    <?php foreach ($phongs as $key => $value) { ?>
                        <div class="main_room1_1">
                        <div class="main_anh"><img src="<?php echo $value['IMG'] ?>" alt="" ></div>
                        <div class="main_nd">
                            <p><?php echo $value['GiaPhong']?>/Night</p>
                            <p><?php echo $value['KieuPhong'] ?></p>
                            <p>facilisis tempor erat facilisis. Proin<br>imperdiet rutrum cursus</p>
                            <div class="icon">
                                <span class="icon_giuong"><img  src="../img/icon_Room.png" width="30px" height="20px" >(2)bed's </span>
                                <span class="icon_nguoi" ><img  src="../img/icon_3p.png" alt="" width="30px" height="20px">(<?php echo $value['SLMax'] ?>)Guest's</span>
                            </div>
                        </div>
                        <div class=chitiet> <a onclick="return kiemtrangay()" href="roomdetail.php?MaPhong=<?php echo $value['MaPhong']; ?>">Chi Tiết</a></div>
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
                    <?php
                    }
                    ?>
                </div>
            </div>
    </div>


    <!-- footer -->
    <?php
     include('footer.php');
    ?>

    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
</body>

</html>