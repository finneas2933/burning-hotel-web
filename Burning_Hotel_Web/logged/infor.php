<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/infor.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Thông tin cá nhân </title>
</head>

<body>

    <?php
    include('header.php');
    include('../config.php');

    $sql = "SELECT * From khachhang where ID ='" . $_SESSION['makhachhang'] . "'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $ten = $row['HoTen'];
            $sdt = $row['SDT'];
            $email = $row['Email'];
            $cmnd = $row['CMND'];
            $diachi = $row['DiaChi'];
            $gioitinh = $row['GioiTinh'];
        }
    }
    ?>
    <section id="infor">
        <div class="container">
            <h1 class="text-center">Thông Tin Cá Nhân</h1>
            <p class="text-center">Thông tin được cung cấp bên dưới sẽ được sử dụng để đăng nhập vào tài khoản của khách sạn cho nhu cầu đặt phòng của bạn.</p>
            <div class="row">
                <div class="col-5">
                    <label for="">Họ và tên: </label>
                </div>
                <div class="col-7">
                    <input type="text" name="ten" id="ten" value="<?php echo $ten ?>" readonly>
                    <button type="button" onclick="editten()" style="border: none;background-color:#181a1b"><i class="fa fa-wrench" style="color: #EBB853; font-size: 25px"></i></button>
                </div>
                <div class="col-5">
                    <label for="">Giới tính: </label>
                </div>
                <div class="col-7 d-flex align-items-end">
                    <div class="d-flex justify-content-center" style="width: 400px;">

                        <label for="nam" style="padding: 0px;">Nam</label>
                        <input type="radio" id="nam" name="gender" <?php echo ($gioitinh == 1) ? 'checked' : '' ?> value="1" style="height: 15px;">

                        <label for="nu" style="padding: 0px;">Nữ</label>
                        <input type="radio" id="nu" name="gender" <?php echo ($gioitinh == 0) ? 'checked' : '' ?> value="0" style="height: 15px;">
                    </div>

                    <button type="button" style="border: none;background-color:#181a1b; margin-bottom:3px; margin-left:4px"><i class="fa fa-wrench" style="color: #EBB853; font-size: 25px;"></i></button>
                </div>
                <div class="col-5">
                    <label for="">Số Điện Thoại: </label>
                </div>
                <div class="col-7">
                    <input type="text" name="sdt" id="sdt" value="<?php echo $sdt ?>" readonly>
                    <button type="button" onclick="editsdt()" style="border: none;background-color:#181a1b"><i class="fa fa-wrench" style="color: #EBB853; font-size: 25px"></i></button>
                </div>
                <div class="col-5">
                    <label for="">Địa Chỉ: </label>
                </div>
                <div class="col-7">
                    <input type="text" name="diachi" id="diachi" value="<?php echo $diachi ?>" readonly>
                    <button type="button" onclick="editdiachi()" style="border: none;background-color:#181a1b"><i class="fa fa-wrench" style="color: #EBB853; font-size: 25px"></i></button>
                </div>
                <div class="col-5">
                    <label for="">Email: </label>
                </div>
                <div class="col-7">
                    <input type="text" name="email" id="email" value="<?php echo $email ?>" readonly>
                    <button type="button" onclick="editemail()" style="border: none;background-color:#181a1b"><i class="fa fa-wrench" style="color: #EBB853; font-size: 25px"></i></button>
                </div>
                <div class="col-5">
                    <label for="">Số CMND: </label>
                </div>
                <div class="col-7">
                    <input type="text" name="cmnd" id="cmnd" value="<?php echo $cmnd ?>" readonly>
                    <button type="button" onclick="editcmnd()" style="border: none;background-color:#181a1b"><i class="fa fa-wrench" style="color: #EBB853; font-size: 25px"></i></button>
                </div>

            </div>
            <div class="confirm d-flex">

                <button type="button" onclick="suathongtin()" id="btn" name="btn"> Sửa đổi thông tin </button>
            </div>

            <script>
                function editsdt() {
                    document.getElementById("sdt").removeAttribute("readonly");
                }

                function editten() {
                    document.getElementById("ten").removeAttribute("readonly");
                }

                function editdiachi() {
                    document.getElementById("diachi").removeAttribute("readonly");
                }

                function editemail() {
                    document.getElementById("email").removeAttribute("readonly");
                }

                function editcmnd() {
                    document.getElementById("cmnd").removeAttribute("readonly");
                }


                function suathongtin() {
                    ten = document.getElementById("ten").value;
                    email = document.getElementById("email").value;
                    sdt = document.getElementById("sdt").value;
                    cmnd = document.getElementById("cmnd").value;
                    diachi = document.getElementById("diachi").value;
                    var genders = document.getElementsByName("gender");
                    var genderChecked = false;
                    for (var i = 0; i < genders.length; i++) {
                        if (genders[i].checked) {
                            genderChecked = true;
                            var gender = genders[i].value;
                            break;
                        }
                    }
                    Swal.fire({
                            title: 'Vui lòng nhập mật khẩu:',
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Xác nhận',
                            cancelButtonText: 'Hủy bỏ',
                            showLoaderOnConfirm: true,
                            preConfirm: (password) => {
                                return new Promise((resolve, reject) => {
                                    resolve(password);
                                });
                            },
                        })
                        .then((result) => {
                            if (result.isConfirmed) {

                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.open("POST", "infor2.php", true);
                                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xmlhttp.onreadystatechange = function() {
                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                        var response = xmlhttp.responseText;
                                        if (response == "Cập Nhập Thành Công!") {
                                            Swal.fire({
                                                title: response,
                                                icon: 'success',
                                                confirmButtonText: 'OK',
                                            }).then(() => {
                                                window.location = "home.php";
                                            });
                                        } else {
                                            Swal.fire({
                                                title: 'Lỗi',
                                                text: response,
                                                icon: 'error',
                                                confirmButtonText: 'OK',
                                            });
                                        }
                                    }
                                };

                                var data = "password=" + encodeURIComponent(result.value) + "&ten=" + ten + "&sdt=" + sdt + "&email=" + email + "&cmnd=" + cmnd + "&diachi=" + diachi + "&gender=" + gender + "&btn";

                                xmlhttp.send(data);
                                console.log(data);
                            } else {
                                Swal.fire({
                                    title: 'Hủy bỏ cập nhập!',
                                    icon: 'info',
                                    confirmButtonText: 'OK',
                                });
                            }
                        })
                        .catch(error => {
                            Swal.showValidationMessage(`Lỗi: ${error}`);
                        });
                }
            </script>
        </div>
    </section>


    <?php
        include('footer.php');
    ?>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!-- bootstrap -->
    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <!-- slick -->
    <script src="../common/slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/scrip.js"></script>
</body>

</html>