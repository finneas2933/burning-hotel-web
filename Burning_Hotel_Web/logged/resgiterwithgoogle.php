<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/registergg.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
    <link rel="icon" href="../public_html/favicon.ico" type="image/png">
</head>

<body>

    <?php include('header.php'); ?>
    <?php
    include('../config.php');

    $sql = "SELECT * From quanlytaikhoan where Email='" . $_SESSION['email'] . "'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $ten = $row['HoTen'];
            $sdt = $row['SDT'];
            $email = $row['Email'];
            $cmnd = $row['CMND'];
            $pass = $row['PassWord'];
        }
    }
    if (isset($_POST['submit_confirm'])) { // Tại button xác nhận thông tin
        $hoten = $_POST["ten"];
        $email = $_POST["email"];
        $sdt = $_POST["sdt"];
        $cmnd = $_POST["cmnd"];
        $pass = $_POST["pass"];
       
        $sql = "UPDATE quanlytaikhoan SET HoTen='" . $hoten . "', SDT='" . $sdt . "', Email='" . $email . "', CMND='" . $cmnd . "',PassWord='" . $pass . "' WHERE SDT='" . $_SESSION['sdt'] . "'";
        $result = mysqli_query($con, $sql);
        if ($result == true) {
            echo "<script>";
            echo "alert('❤️ Đăng kí thành công ❤️');";
            echo "window.location.href=' home.php'";
            echo "</script>";
            header("Location: home.php");
            $_SESSION['makhachhang'] = $_POST["ID"];
        } else {
            echo "<script>";
            echo "alert('Thất bại !!!');";
            echo "window.location=javascript: history.go(-1)";
            echo "</script>";
        }
    } else if (isset($_POST['submit_huy'])) { // Tại button xác nhận thông tin
       
        $email = $_POST["email"];
        $sql = "DELETE FROM quanlytaikhoan WHERE Email = '$email'";
        $result = mysqli_query($con, $sql);
        if ($result == true) {
            echo "<script>";
            echo "alert('Bạn đã huỷ đăng ký, chúng tôi sẽ điều hướng bạn về trang đăng nhập 😭');";
            echo "window.location.href='../index.php'";
            echo "</script>";
            header("Location: ../index.php");
        }
    } else {
        
        $sql = "SELECT * From quanlytaikhoan where Email='" . $_SESSION['email'] . "'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $ten = $row['HoTen'];
                $sdt = $row['SDT'];
                $email = $row['Email'];
                $cmnd = $row['CMND'];
                $pass = $row['PassWord'];
            }
        }
    }
    ?>
    <section id="infor">
        <div class="container">
            <h1 class="text-center" style="margin-top: 25px;">Tạo Tài Khoản</h1>
            <p class="text-center">Thông tin được cung cấp bên dưới sẽ được sử dụng để đăng nhập vào tài khoản của khách
                sạn cho nhu cầu đặt phòng của bạn.</p>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-5">
                        <label for="">Họ và tên: </label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="ten" id="" value="<?php echo $ten; ?>">
                    </div>
                    <div class="col-5">
                        <label for="">Số Điện Thoại: </label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="sdt" id="" value="<?php echo $sdt; ?>">
                    </div>
                    <div class="col-5">
                        <label for="">Email: </label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="email" id="" value="<?php echo $email ?>">
                    </div>
                    <div class="col-5">
                        <label for="">Số CMND: </label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="cmnd" id="" value="<?php echo $cmnd ?>">
                    </div>
                    <div class="col-5">
                        <label for="">Mật Khẩu: </label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="pass" id="" value="<?php echo $pass ?>">
                    </div>
                </div>
                <div class="confirm d-flex">
                    <button type="submit" name="submit_confirm"> Xác Nhận Thông Tin </button>
                    <button type="submit" name="submit_huy"> Thoát </button>
                </div>
            </form>
        </div>
    </section>

    <?php include('footer.php'); ?>
    

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form");
        const submitButtonConfirm = form.querySelector("[name='submit_confirm']");
        const submitButtonHuy = form.querySelector("[name='submit_huy']");
        const inputs = form.querySelectorAll("input");
        let errorDisplayed = false;

        inputs.forEach(function(input) {
            input.addEventListener("input", function(event) {
                validateInput(input);
            });
        });

        function validateInput(input) {
            const value = input.value.trim();
            const errorElement = input.parentNode.querySelector(".error-message");
            input.classList.remove("error");
            if (errorElement) {
                errorElement.remove();
            }

            if (value === "") {
                showErrorMessage(input, "Không được bỏ trống!");
            } else {
                if (input.name === "sdt" && !isValidPhoneNumber(value)) {
                    showErrorMessage(input, "Số điện thoại không hợp lệ.");
                } else if (input.name === "cmnd" && !isValidCMND(value)) {
                    showErrorMessage(input, "Số CMND không hợp lệ. (bao gồm 9 số)");
                } else if (input.name === "email" && !isValidEmail(value)) {
                    showErrorMessage(input, "Email không hợp lệ.");
                } else if (input.name === "pass" && !isValidPassword(value)) {
                    showErrorMessage(input, "Mật khẩu phải có ít nhất 8 ký tự.");
                }
            }
        }

        submitButtonConfirm.addEventListener("click", function(event) {
            errorDisplayed = false;
            let valid = true;

            inputs.forEach(function(input) {
                validateInput(input);

                if (input.classList.contains("error") && !errorDisplayed) {
                    errorDisplayed = true;
                    valid = false;
                }
            });

            if (!valid) {
                event.preventDefault();
            }
        });


        function isValidPhoneNumber(phoneNumber) {
            // Kiểm tra định dạng số điện thoại (ví dụ: 1234567890)
            const phoneRegex = /^[0-9]{10}$/;
            return phoneRegex.test(phoneNumber);
        }

        function isValidCMND(cmnd) {
            // Kiểm tra định dạng số CMND (ví dụ: 123456789)
            const cmndRegex = /^[0-9]{9}$/;
            return cmndRegex.test(cmnd);
        }

        function isValidEmail(email) {
            // Kiểm tra định dạng email
            const emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            return emailRegex.test(email);
        }

        function isValidPassword(password) {
            // Kiểm tra mật khẩu có ít nhất 8 ký tự
            return password.length >= 8;
        }

        function showErrorMessage(input, message) {
            // Kiểm tra xem thông báo lỗi đã tồn tại chưa
            const errorElement = input.parentNode.querySelector(".error-message");
            if (errorElement) {
                errorElement.textContent = message;
            } else {
                // Nếu chưa tồn tại, tạo mới và thêm vào trang
                const newErrorElement = document.createElement("div");
                newErrorElement.className = "error-message";
                newErrorElement.textContent = message;
                input.parentNode.appendChild(newErrorElement);
            }
        }
        function hideErrorMessage(input) {
            const errorElement = input.parentNode.querySelector(".error-message");
            if (errorElement) {
                errorElement.remove();
            }
        }
        // tạo và hiển thị thông báo lỗi cho trường nhập liệu cụ thể khi có lỗi xảy ra
        function showErrorMessage(input, message) {
            input.classList.add("error");
            const errorElement = document.createElement("div");
            errorElement.className = "error-message";
            errorElement.textContent = message;
            input.parentNode.appendChild(errorElement);
        }
    });
</script>




    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!-- bootstrap -->
    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <!-- slick -->
    <script src="../common/slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/scrip.js"></script>
</body>

</html>