<!DOCTYPE html>
<html lang="en">
<?php
include('../config.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../public_html/favicon.ico" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/a0ff9460a2.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
</head>

<body>
    <section id="booktable">
        <div class="content">
            <div class="box d-flex align-items-center justify-content-center">
                <div class="form" style="text-align: center;">
                    <p
                        style="border-top: 2px solid #937438;border-bottom: 2px solid #937438;margin: 0 auto;width: 80px; font-size:12px">
                        RESERVATION</p>
                    <p>Đặt bàn ngay</p>
                    <div class="d-flex mb-3 justify-content-center">
                        <div class="col-4">
                            <input type="number" name="persons" id="persons" style="width:155px" placeholder="Số Lượng"
                                required onfocus="resetBorderColor('persons')">
                        </div>
                        <div class="col-4 mx-1">
                            <input type="time" name="timing" id="timing" style="width:155px;" placeholder="Timing"
                                required onfocus="resetBorderColor('timing')">
                        </div>
                        <div class="col-4">
                            <input type="date" name="date" id="date" style="width:155px" placeholder="Date" required
                                onfocus="resetBorderColor('date')">
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <textarea cols="40" rows="5" class="w-100" name="note" id="note" placeholder="Ghi Chú"
                            style="background-color: transparent; border:1px solid white; padding: 3px; color:white"></textarea>
                    </div>

                    <div class="d-flex justify-content-center ms-2">
                        <button onclick="bookTable()">Xác Nhận</button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <script>
        function resetBorderColor(elementId) {
            document.getElementById(elementId).style.border = "1px solid white";
        }

        function bookTable() {
            var persons = document.getElementById("persons").value;
            var timing = document.getElementById("timing").value;
            var date = document.getElementById("date").value;
            var note = document.getElementById("note").value;

            // Lấy ngày và giờ hiện tại
            var currentDate = new Date();
            var currentDateString = currentDate.toISOString().split('T')[0];
            var currentTimeString = currentDate.toTimeString().split(' ')[0];

            // Kiểm tra ngày đến và giờ đến
            if (date < currentDateString || (date == currentDateString && timing < currentTimeString)) {
                alert("Ngày hoặc giờ đến không hợp lệ. Vui lòng nhập lại.");
                return;
            }

            // Kiểm tra và xác thực dữ liệu
            if (!persons || !timing || !date) {
                alert("Vui lòng điền đầy đủ thông tin!");
                if (!persons) {
                    document.getElementById("persons").style.border = "2px solid red";
                    document.getElementById("persons").focus();
                }
                if (!timing) {
                    document.getElementById("timing").style.border = "2px solid red";
                    document.getElementById("timing").focus();
                }
                if (!date) {
                    document.getElementById("date").style.border = "2px solid red";
                    document.getElementById("date").focus();
                }
                return;
            }

            saveBookingInfo(persons, timing, date, note);

            showConfirmationMessage();
        }


        function saveBookingInfo(persons, timing, date, note) {
            fetch("save_booking.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: "persons=" + persons + "&timing=" + timing + "&date=" + date + "&note=" + note,
            })
                .then(response => response.text())
                .then(data => {
                    var responseData = data.split("|");
                    var status = responseData[0];
                    var lastInsertedID = responseData[1];

                    if (status === "success") {
                        console.log("Booking details saved - Persons: " + persons + ", Timing: " + timing + ", Date: " + date + ", Note: " + note);

                        var confirmation = confirm("Thông tin đã được lưu. Mã bàn của bạn là: " + lastInsertedID +
                            "\nVui lòng chờ xác nhận từ bộ phận lễ tân." +
                            "\nChọn 'OK' để xem Menu hoặc 'Cancel' để ở lại.");

                        if (confirmation) {
                            goToMenu();
                        } else {
                            stayOnPage();
                        }
                    } else {
                        alert("Có lỗi xảy ra khi lưu thông tin. Vui lòng thử lại.");
                    }
                })
                .catch(error => {
                    alert("Có lỗi xảy ra khi gửi dữ liệu. Vui lòng thử lại.");
                    console.error("Fetch Error: ", error);
                });
        }

        function goToMenu() {
            window.location.href = "menu.php";
            console.log("Go to Menu");
        }

        function stayOnPage() {
            // Ở lại trang hiện tại
            console.log("Stay on Page");
        }

    </script>
</body>

</html>