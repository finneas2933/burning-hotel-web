let amountElement = document.getElementById('soluong');
let amount = amountElement.value;

let render = (amount) =>{
    amountElement.value = amount
}
//Handle Plus
let plusHandleClick = () =>{
    amount++
    render(amount)
}

let minusHandleClick = () =>{
    if(amount>1)
    amount--
    render(amount)
}

amountElement.addEventListener('input', ()=>{
    amount = amountElement.value;
    amount = parseInt(amount);
    amount = (isNaN(amount)||amount == 0)?1:amount;
    render(amount);
    console.log(amount);
})