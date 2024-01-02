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
                <div>  </div>
                <div>
                    <button onclick="changeQuantity(${value.id}, ${parseInt(value.soluong) - 1})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                        </svg>
                    </button>
                    <div class="count">${value.soluong}</div>
                    <button onclick="changeQuantity(${value.id}, ${parseInt(value.soluong)} + 1)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>`;
                listCard.appendChild(newLi);  
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

initApp();

document.querySelectorAll('.btnaddcart').forEach(function(btn) {
    btn.addEventListener('click', function () {
        let productId = this.getAttribute('data-masp');
        let quantity = document.getElementById('soluong').value;

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "cart__add.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
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
                <div>
                    <button onclick="changeQuantity(${value.id}, ${parseInt(value.soluong) - 1})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                        </svg>
                    </button>
                    <div class="count">${value.soluong}</div>
                    <button onclick="changeQuantity(${value.id}, ${parseInt(value.soluong)} + 1)">
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
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function changeQuantity(key, newQuantity) {
    if (typeof newQuantity === 'number') {
        if (newQuantity === 0) {
            if (confirm("Bạn muốn xoá món này khỏi giỏ hàng?")) {
                removeCartItem(key);
            }
        } else {
            updateCartItemQuantity(key, newQuantity);
        }
    }
}


function removeCartItem(key) {
    fetch('cart__remote.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            cartItemId: key,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            reloadCard();
            console.log('ID: ', key);

        } else {
            console.error('Error:', data.message, 'ID: ', key);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


function updateCartItemQuantity(key, newQuantity) {
    console.log('Updating quantity for item with ID:', key);
    fetch('cart__update.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            cartItemId: key,
            newQuantity: newQuantity,
        }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Update response:', data);
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


