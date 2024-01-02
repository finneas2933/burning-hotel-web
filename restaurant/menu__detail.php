<?php
session_start();
include("../config.php");
$ID = $_GET['ID'];
$sql = "SELECT * From doan where  ID='$ID'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ID = $row["ID"];
        $TenMon = $row["TenMon"];
        $PhanLoai = $row["PhanLoai"];
        $ThoiGianNau = $row["ThoiGianNau"];
        $DoKho = $row["DoKho"];
        $ThanhPhan = $row["ThanhPhan"];
        $HamLuongcalo = $row["HamLuongcalo"];
        $ThanhTien = $row["ThanhTien"];
        $MoTa = $row["MoTa"];
        $SoLuongDaBan = $row["SoLuongDaBan"];
        $img = $row['img'];
    }
}
$result = mysqli_query($con, "SELECT COUNT(*) as total, SUM(giohang.soluong * doan.ThanhTien) AS tongtien FROM giohang,doan WHERE giohang.mamonan=doan.ID AND makhachhang = $_SESSION[makhachhang]");
$row = mysqli_fetch_assoc($result);
$tongtien = $row['tongtien'];
$so_luong_mon = $row['total'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết món</title>
    <link rel="stylesheet" href="../css/restaurant/menu/menu__detail.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../public_html/favicon.ico" type="image/png">
    <script src="https://kit.fontawesome.com/f6b816f05e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
</head>

<body>
    <!-- header -->
    <?php include('./header.php'); ?>
    <!-- end header -->
    <!-- banner -->
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

    <!-- food detail -->
    <section id="food-detail">
        <hcon>
            <div class="shopping">
                <img src="../img/restaurant/icon/shopping-car.svg" alt="cart">
                <span class="soluongmon" id="so-luong-mon">
                    <?php echo $so_luong_mon ?>
                </span>
            </div>
        </hcon>
        <div class="container py-5">
            <div class="row">

                <div class="col-6 ">
                    <div class="">
                        <img src="<?php echo $img ?>" alt="" class="" style="height:80%; width:90%">
                    </div>
                </div>
                <div class="col-5 detail-content p-3 ps-0">
                    <h3>
                        <?php echo $TenMon ?>
                    </h3>
                    <div class="vote">
                        <span>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>
                            <i class="fa fa-star"></i>
                        </span>
                        <span style="color:silver">(0 custom review)</span>
                    </div>
                    <h6>
                        <?php echo number_format($ThanhTien) ?> VNĐ
                    </h6>
                    <hr style="border-style:dashed">
                    <p>
                        <?php echo $MoTa ?>
                    </p>
                    <div class="adjbutton d-flex">
                        <div id="buy-amount">
                            <button class="plus-btn" onclick="minusHandleClick()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                </svg>
                            </button>
                            <input type="text" name="soluong" id="soluong" value="1">
                            <button class="minus-btn" onclick="plusHandleClick()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                        </div>
                        <button class="btnaddcart" data-masp="<?php echo $ID; ?>" data-product-quantity="document.getElementById('soluong').value">
                            Add to cart
                        </button>

                    </div>
                    <div class="food-information">
                        <h6>#ID: <span>
                                <?php echo $ID ?>
                            </span></h6>
                        <h6>CATEGORY: <span>
                                <?php echo $PhanLoai ?>
                            </span></h6>
                        <h6>TAGS: <span>Recipes, Sweet, Tasty</span></h6>
                        <h6>SHARE: <span class="icon fab fa-instagram"></span><span class="icon fab fa-facebook"></span><span class="icon fab fa-twitter"></span><span class="icon fab fa-pinterest"></span> </h6>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end food detail -->

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

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Số Điện Thoại:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Ngày Đặt:</label>
                            <input type="date" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Ngày Đến:</label>
                            <input type="date" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Giờ Đến:</label>
                            <input type="time" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Ghi Chú:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tổng tiền:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
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
                        xmlhttp.open("POST", "thanhtoan_monan.php", true);
                        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                var response = xmlhttp.responseText;
                                if (response == "") {
                                    $('#myModal').modal('show');
                                    // Swal.fire({
                                    //     title: 'Đặt món thành công!',
                                    //     icon: 'success',
                                    //     confirmButtonText: 'OK',
                                    // }).then(() => {
                                    //     window.location = "index.php";
                                    // });
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

                        var data = "maphieudatphong=" + encodeURIComponent(result.value) + "&tongtien=" + <?php echo $tongtien ?> + "&btn";
                        xmlhttp.send(data);
                    } else {
                        // Người dùng đã hủy bỏ
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
    </script>
    <!-- ingredients -->

    <section id="ingredients">
        <div class="container py-5">
            <h3>Chi tiết thành phần</h3>
            <div class="row border-top border-2">
                <div class="col-8 border-end border-2 p-5">
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <img src="../img/restaurant/menu/thanhphan.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-8">
                                    <div class="ingredients-content">
                                        <h5>Chicken</h5>
                                        <p>1kg</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <img src="../img/restaurant/menu/thanhphan.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-8">
                                    <div class="ingredients-content">
                                        <h5>Chicken</h5>
                                        <p>1kg</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-4 p-5">
                    <div class="card border-0" style="width: 18rem;">
                        <img src="../img/restaurant/menu/menu-detail.png" class="card-img-top  rounded-0" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8 p-0  d-flex align-items-center">
                                    <i class="icon far fa-clock"></i>
                                    <h6>Cooking time:</h6>
                                </div>
                                <div class="col-4 p-0 d-flex justify-content-end">
                                    <p class="mb-0">
                                        <?php echo $ThoiGianNau ?> phút
                                    </p>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-8 p-0  d-flex align-items-center">
                                    <i class="icon far fa-clock"></i>
                                    <h6>Difficulty:</h6>
                                </div>
                                <div class="col-4 p-0 d-flex justify-content-end">
                                    <p class="mb-0">
                                        <?php echo $DoKho ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 p-0  d-flex align-items-center">
                                    <i class="icon far fa-clock"></i>
                                    <h6>Servings:</h6>
                                </div>
                                <div class="col-4 p-0 d-flex justify-content-end">
                                    <p class="mb-0">
                                        <?php echo $HamLuongcalo ?> calories
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end ingredients -->

    <!-- similar dish -->
    <?php
    $mang_chuoi = explode(' ', $TenMon);
    $conditions = [];

    foreach ($mang_chuoi as $tu) {
        $conditions[] = "TenMon LIKE '%" . mysqli_real_escape_string($con, $tu) . "%'";
    }

    $sql = "SELECT * FROM doan WHERE (" . implode(' OR ', $conditions) . ") AND PhanLoai = '" . $PhanLoai . "'";


    $result = mysqli_query($con, $sql);
    $IDs = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $IDs[] = array(
                'TenMon' => $row['TenMon'],
                "PhanLoai" => $row['PhanLoai'],
                "ThoiGianNau" => $row['ThoiGianNau'],
                "DoKho" => $row['DoKho'],
                "ThanhPhan" => $row['ThanhPhan'],
                "HamLuongcalo" => $row['HamLuongcalo'],
                "ThanhTien" => $row['ThanhTien'],
                "MoTa" => $row['MoTa'],
                "SoLuongDaBan" => $row['SoLuongDaBan'],
                "img" => $row['img'],
                'ID' => $row['ID']
            );
        }
    }
    ?>
    <section id="similar-dish">
        <div class="container py-5">
            <div class="title">
                <h3>Món tương tự</h3>
                <a href="cart.php"><button>Order now</button></a>
            </div>
            <div class="row">
                <?php foreach ($IDs as $key => $value) {
                ?>
                    <div class="col-4  pt-3">

                        <div class="card" style="width: 18  rem;">
                            <a href="menu__detail.php?ID=<?php echo $value['ID']; ?>"><img src="<?php echo $value['img'] ?>" class="card-img-top w-100" alt="..." style="height: 236px;"></a>
                            <div class="card-body">
                                <h6>
                                    <a href="menu__detail.php?ID=<?php echo $value['ID']; ?>"><?php echo $value['TenMon'] ?></a>

                                </h6>
                                <hr style="border-style:dashed">
                                <div class="information">
                                    <h6>
                                        <?php echo number_format($value['ThanhTien']) ?> VNĐ
                                    </h6>
                                    <div class="vote">
                                        <span>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <span>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <span>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <span>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <span>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </section>
    <!-- end similar dish -->

    <!-- footer -->
    <?php include('../logged/footer.php'); ?>
    <!-- end footer -->
    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/tanggiamsoluong.js"></script>
    <script src="cart.js"></script>

</body>

</html>