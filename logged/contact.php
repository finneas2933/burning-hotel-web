<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../public_html/favicon.ico" type="image/png">
    <script src="https://kit.fontawesome.com/a0ff9460a2.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>

<body>
    <!-- header -->
    <?php include('header.php'); ?>

    <!-- banner -->
    <section id="banner">
        <div class="container-fluid p-0 text-center">
            <div class="img h-100">
                <img src="../img/pay/banner.jpg" alt="" class="w-100">
                <div class="box">
                    <div class="trangtri"></div>
                    <p class="m-0" style="font-size: 14px;font-family: Montserrat-Regular">Home - <span style="color: #C89E4B;">Service</span></p>
                    <h3 style="font-size:36px;font-family: Montserrat-Bold;">Contact Us</h3>
                    <div class="trangtri"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- end banner -->
    <form method="POST" >
    <div class="contactus">
        <div class="main">
            <div class="main_lienhe">
                <p>Get In Touch</p>
                <p>Phasellus nisi sapien, rutrum placerat sapien eu, rhoncus templus felis.<br>
                    Nulla non pulvina enim, vel viverra nunc.</p>
                <div class="main_item">
                    <div class="chu "> <img class="phone" src="../img/icon_Phone.png">Emergency Help</div>
                    <span class="so ">+ 123 (458) 896 895</span>
                </div>
                <div class="main_item">
                    <div class="chu"><img class="mess" src="../img/icon_Mess.png">Quick Email</div>
                    <span class="so">support@gmail.com</span>
                </div>
                <div class="main_item">
                    <div class="chu"><img class="address" src="../img/icon_Address.png">support@gmai.com</div>
                    <div class="so">GXF4+8HQ Chippenham </div>
                    <div class="so">United KingDom</div>
                </div>
                <div class="main_link">
                    <span class="main_icon">
                        <a class="main_link_icon" href="#"><i class="fa-brands fa-facebook"></i></a>
                    </span>
                    <span class="main_icon">
                        <a class="main_link_icon" href="#"><i class="fa-brands fa-instagram"></i></a>
                    </span>
                    <span class="main_icon">
                        <a class="main_link_icon" href="#"><i class="fa-brands fa-youtube"></i></a>
                    </span>
                    <span class="main_icon">
                        <a class="main_link_icon" href="#"><i class="fa-brands fa-twitter"></i></a>
                    </span>
                </div>
            </div>
            <div class="main_form">
                <p>Send Message</p>
                <div class="infor1">
                    <div class="infor11">
                        <input type="text" id="ten" name="ten" placeholder="Full name">
                    </div>
                    <div class="infor12">
                        <input type="email" name="email" id="email" placeholder="Email Address">
                    </div>
                </div>
                <div class="infor2">
                    <div class="infor21"><input type="text" id="number" name="number" placeholder="Phone"></div>
                    <div class="infor22"><input type="text" id="subject" name="subject" placeholder="Subject"></div>
                </div>
                <div class="infor3">
                    <textarea name="cmt" id="cmt" cols="40" rows="12" placeholder="Type your comment..."></textarea>
                </div>
                <input type="submit" id="submit" name="submit" value="SUBMIT NOW">
            </div>
        </div>
    </div>
    </form>
    <?php


    require '../vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['submit'])) {
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $sdt = $_POST['number'];
        $subject = $_POST['subject'];
        $message = $_POST['cmt'];

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->CharSet  = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587;  
        
        $mail->Username = '7steam.work@gmail.com';
        $mail->Password = 'cnrw evpy rjbm adhe';

        $mail->setFrom($email,$ten);//địa chỉ email người gửi
        $mail->addAddress('7steam.work@gmail.com', ''); //địa chỉ email người nhận
        
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = 'From: ' . $email . '<br> To: 7steam.work@gmail.com <br> Họ và tên: '.$ten .'<br> SĐT: '.$sdt.'<br>Nội dung: '.$message;

        if (!$mail->send()) {
            $error = "Lỗi: " . $mail->ErrorInfo;
            echo '<p>' . $error . '</p>';
        } else {
            echo '<p>Đã gửi!</p>';
        }

    }

        ?>
    <!-- footer -->
    <?php include('footer.php'); ?>

    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
</body>

</html>