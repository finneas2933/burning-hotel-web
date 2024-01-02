<?php
session_start();
include("../config.php");

$result = mysqli_query($con, "SELECT COUNT(*) as total  FROM giohang WHERE  makhachhang = $_SESSION[makhachhang]");
$row = mysqli_fetch_assoc($result);
$so_luong_mon = $row['total'];
$so_luong_mon = $row['quantity'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link css bootstrap -->
    <link rel="stylesheet" href="../common/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- link slick -->
    <link rel="stylesheet" type="text/css" href="../common/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../common/slick/slick-theme.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet/less" type="text/css" href="../css/restaurant/cart.module.scss?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../css/restaurant/cart.css"> -->
    <link rel="icon" href="../public_html/favicon.ico" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1"></script>
</head>

<body class="" style="z-index: 3;">

     <div class="container">
        <header>
            <h1>Your Shopping Cart</h1>
            <div class="shopping">
                <img src="../img/restaurant/icon/shopping-car.svg" alt="cart">
                <span class="quantity">
                    <?php echo $so_luong_mon ?>
                </span>
            </div>
        </header>

        <div class="list">

        </div>
    </div>
    <div class="card">
        <h1>Card</h1>
        <ul class="listCard">
        </ul>
        <div class="checkOut">
            <div class="total">
                <?php echo $so_luong_mon ?>
            </div>
            <div class="closeShopping">Thanh Toán</div>
        </div>
    </div> 
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!-- bootstrap -->
    <script src="../common/bootstrap-5.2.2-dist/js/popper.min.js"></script>
    <script src="../common/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <!-- slick -->
    <script src="../common/slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/scrip.js"></script>
    <script>
        let openShopping = document.querySelector('.shopping');
        let closeShopping = document.querySelector('.closeShopping');
        let list = document.querySelector('.list');
        let listCard = document.querySelector('.listCard');
        let body = document.querySelector('body');
        let total = document.querySelector('.total');
        let quantity = document.querySelector('.quantity');

        let customerId = localStorage.getItem("makhachhang");

        openShopping.addEventListener('click', () => {
            body.classList.add('active');
        });

        closeShopping.addEventListener('click', () => {
            body.classList.remove('active');
        });


        function initApp() {
            fetch('cart__get.php?customer_id=' + customerId)
                .then(response => response.json())
                .then(data => {
                    listCard.innerHTML = '';

                    data.forEach((value, key) => {
                        let newLi = document.createElement('li');
                        newLi.innerHTML = `
                    <div><img src="${value.img}"/></div>
                    <div>${value.tenmon}</div>
                    <div>${value.gia.toLocaleString()}</div>
                    <div>
                            <button onclick="changeQuantity(${value.id}, ${value.soluong - 1})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                    </button>
                        <div class="count">${value.soluong}</div>
                        <button onclick="changeQuantity(${value.id}, ${value.soluong + 1})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                    </button>
                    </div>`;
                        listCard.appendChild(newLi);
                        let newDiv = document.createElement('div');
                newDiv.classList.add('item');
                newDiv.innerHTML = `
                    <img src="${value.img}">
                    <div class="title">${value.tenmon}</div>
                    <div class="price">${value.gia.toLocaleString()}</div>
                    <button onclick="delete(${key})">Bỏ</button>`;
                list.appendChild(newDiv);

                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        initApp()
        function reloadCard() {
            fetch(`cart__get.php?customer_id=${localStorage.getItem('makhachhang')}`)
                .then(response => response.json())
                .then(data => {
                    let listCard = document.querySelector('.listCard');
                    listCard.innerHTML = '';

                    let total = 0;
                    let count = 0;

                    data.forEach((value, key) => {
                        let newLi = document.createElement('li');
                        newLi.innerHTML = `
                <div><img src="${value.img}"/></div>
                <div>${value.tenmon}</div>
                <div>${value.gia.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${value.id}, ${value.soluong - 1})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                        </svg>
                    </button>
                    <div class="count">${value.soluong}</div>
                    <button onclick="changeQuantity(${value.id}, ${value.soluong + 1})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>`;
                        listCard.appendChild(newLi);

                        total += value.gia * value.soluong;
                        count += value.soluong;
                    });

                    document.querySelector('.total').innerText = total.toLocaleString();
                    document.querySelector('.quantity').innerText = count;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function changeQuantity(key, quantity) {
            fetch('cart_update_quantity.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    cartItemId: key + 1,
                    newQuantity: quantity,
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        reloadCard();
                    } else {
                        console.error('Error:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

    </script>
</body>

</html>