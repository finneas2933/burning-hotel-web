<?php session_start(); ?>
<?php
include('../config.php');
$result = mysqli_query($con, "SELECT COUNT(*) as total, SUM(giohang.soluong * doan.ThanhTien) AS tongtien FROM giohang,doan WHERE giohang.mamonan=doan.ID AND makhachhang = $_SESSION[makhachhang]");
$row = mysqli_fetch_assoc($result);
$tongtien = $row['tongtien'];
$so_luong_mon = $row['total'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page</title>
    <link rel="stylesheet/less" type="text/css" href="../css/restaurant/menu/menulist.module.scss?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link css bootstrap -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- link slick -->
    <link rel="stylesheet" type="text/css" href="../common/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../common/slick/slick-theme.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="icon" href="../public_html/favicon.ico" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <?php include('./header.php'); ?>
    <!-- TODO: banner -->
    <section id="banner">
        <div class="container-fluid p-0 text-center">
            <div class="img h-100">
                <img src="../img/restaurant/menu/banner.png" alt="" class="w-100">
                <div class="box">
                    <h3 style="font-size:20px;font-family: Montserrat-Bold;border-top: 2px solid #937438;border-bottom: 2px solid #937438;width:150px">
                        Chi Tiết Món</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->



    <section id="content" class="pt-5">
        <hcon>
            <div class="shopping">
                <img src="../img/restaurant/icon/shopping-car.svg" alt="cart">
                <span class="soluongmon" id="so-luong-mon">
                    <?php echo $so_luong_mon ?>
                </span>
            </div>
        </hcon>
        <?php
        if (isset($_GET['category'])) {
            $category = $_GET['category'];

            $count_sql = "SELECT COUNT(*) as count FROM doan WHERE PhanLoai = '$category'";
            $count_result = $con->query($count_sql);
            $total_rows = $count_result->fetch_assoc()['count'];

            $items_per_page = 7;

            if ($total_rows > 0) {
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($current_page - 1) * $items_per_page;

                $sql = "SELECT * FROM doan WHERE PhanLoai = '$category' LIMIT $start, $items_per_page";
                $result = $con->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $ID = $row["ID"];
                    echo '
                    <div class="sub__content ">
                    <div class="image">
                    <img src="' . $row["img"] . '" alt="hinhanhdoan" class=""/>
                    </div>
                    <div class="detail">
                    <h4>' . $row["TenMon"] . '</h4>
                    <p class="describe">' . $row["MoTa"] . '</p>
                    <div class="sup__detail">
                    <p class="topic">Danh Mục: </p>
                    <p class="infor">' . $row["PhanLoai"] . '</p>
                    </div>
                    <div class="sup__detail">
                    <p class="topic">Thành Phần: </p>
                    <p class="infor">' . $row["ThanhPhan"] . '</p>
                    </div>
                    <div class="sup__detail">
                    <p class="topic">Hàm Lượng: </p>
                    <p class="infor">' . $row["HamLuongcalo"] . ' Calories</p>
                    </div>
                    <div class="sup__detail">
                    <p class="topic">Giá: </p>
                    <p class="infor">' . number_format($row["ThanhTien"]) . ' VNĐ</p>
                    </div>
                    <div class="sup__detail">
                    <p class="topic"></p>
                    <p class="infor"></p>
                    </div>';
        ?>

                    <a style="text-decoration:none;color:black;" href="menu__detail.php?ID=<?php echo $ID; ?>"><button>Xem Chi
                            Tiết</button></a>
                    <button class="btnaddcartlist" data-masp="<?php echo $ID; ?>" data-product-quantity="1">Thêm giỏ hàng</button>
        <?php
                    echo '</div>';
                    echo '</div>';
                }
                echo '<nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">';
                if ($current_page > 1) {
                    $prev_page = $current_page - 1;
                    echo '<a href="?category=' . $category . '&page=' . $prev_page . '" class="page-link">Previous</a>';
                }
                echo '</li>
                        <li class="page-item d-flex">';
                $total_pages = ceil($total_rows / $items_per_page);
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<a href="?category=' . $category . '&page=' . $i . '" class="page-link">' . $i . '</a>';
                }
                echo '</li>
                        
                <li class="page-item">';
                if ($current_page < $total_pages) {
                    $next_page = $current_page + 1;
                    echo '<a href="?category=' . $category . '&page=' . $next_page . '" class="page-link">Next</a>';
                }
                echo '</li>

                    </ul>
                </nav>';
            } else {
                echo "0 kết quả";
            }
        }
        ?>

    </section>

    <!-- cart -->
    <div class="supercard">
        <h1><a href="cart.php">Card</a></h1>
        <ul class="listCard ps-0">
        </ul>

        <div class="checkOut">
            <div>
                <button onclick="ThanhTon()" name="btn">Thanh Toán</button>
            </div>
            <div class="closeShopping">Close</div>
        </div>
    </div>
    <!-- end cart -->
   

    <!-- chi tiết đặt món-->
    <div class="modal fade" id="myModaldatphong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi Tiết</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Họ Tên:</label>
                            <input type="hidden" class="form-control" id="mahoadon" name="mahoadon" value="" readonly>
                            <input type="text" class="form-control" id="recipient-name" value="<?php echo $_SESSION['ten'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Số Điện Thoại:</label>
                            <input type="text" class="form-control" id="recipient-name" value="<?php echo $_SESSION['sdt'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Ngày Đặt:</label>
                            <input type="date" class="form-control" id="recipient-name" value="<?php echo  date("Y-m-d"); ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Ghi Chú:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tổng tiền: </label>
                            <input type="text" name="tongtien" class="form-control" id="recipient-name" value="  <?php echo number_format($tongtien)  ?> VNĐ" readonly>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy </button>
                    <button type="button" onclick="thanhtoan_datphong()" name="btn-datphong" class="btn btn-primary">Thanh Toán</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php include('../logged/footer.php'); ?>

    <script>
        function ThanhTon() {
            Swal.fire({
                    title: 'Vui lòng nhập mã đặt phòng:',
                    input: 'text',
                    showCancelButton: true,
                    confirmButtonText: 'Xác nhận',
                    cancelButtonText: 'Hủy bỏ',
                    showLoaderOnConfirm: true,
                    preConfirm: (maphieudatphong) => {
                        return new Promise((resolve, reject) => {
                            resolve(maphieudatphong);
                        });
                    },
                })
                .then((result) => {
                    if (result.isConfirmed) {

                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.open("POST", "kiemtramaphong.php", true);
                        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                var response = JSON.parse(xmlhttp.responseText);
                                 if (response.message == "Đúng mã đặt phòng!") {
                                    document.getElementById("mahoadon").value = response.mahoadon;
                                    $('#myModaldatphong').modal('show');
                                } else {
                                    Swal.fire({
                                        title: 'Lỗi',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'OK',
                                    });
                                }
                            }
                        };
                        var data = "maphieudatphong=" + encodeURIComponent(result.value) + "&btn";
                        xmlhttp.send(data);
                    } else {
                        Swal.fire({
                            title: 'Hủy bỏ đặt món.',
                            icon: 'info',
                            confirmButtonText: 'OK',
                        });
                    }
                })
                .catch(error => {
                    Swal.showValidationMessage(`Lỗi: ${error}`);
                });
        }

        function thanhtoan_datphong() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "thanhtoanmon_datphong.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    if (response == "") {
                        Swal.fire({
                            title: "Đặt món thành công!",
                            icon: "success",
                            confirmButtonText: "OK",
                            allowOutsideClick: false
                        }).then((result) => {
                            window.location = "../logged/home.php";
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
            mahoadon = document.getElementById("mahoadon").value;
            var data = "mahoadon=" + mahoadon + "&tongtien=" + <?php echo $tongtien ?> + "&btn_datphong";
            xhr.send(data);
            
        }

       
    </script>

    <script>
        document.querySelectorAll('.btnaddcartlist').forEach(function(btn) {
            btn.addEventListener('click', function() {
                let productId = this.getAttribute('data-masp');
                let quantity = this.getAttribute('data-product-quantity');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "cart__add.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            document.querySelector('.soluongmon').innerText = response.so_luong_mon;

                            reloadCard();
                        } else {
                            console.error('Error:', xhr.statusText);
                        }
                    }
                };

                xhr.send("customerId=" + localStorage.getItem('makhachhang') +
                    "&productId=" + productId +
                    "&quantity=" + quantity);
            });
        });
    </script>


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!-- bootstrap -->
    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <!-- slick -->
    <script src="../common/slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/scrip.js"></script>
    <script src="cart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>