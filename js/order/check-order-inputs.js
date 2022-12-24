document.addEventListener("click", function (e) {
const userName=document.querySelector('[name="userName"]');
const email=document.querySelector('[name="userEmail"]');
const phoneNumber=document.querySelector('[name="phoneNumber"]');
const orderDelivery=document.querySelector('[name="SelectDelivery"]');
const orderCities=document.querySelector('[name="cities"]');
const orderStreets=document.querySelector('[name="streets"]');
const orderButton=document.getElementById("order-button");
if(e.target==orderButton){
    const phoneTemplate = /^((\+380))[0-9]{9}$/g;
    const emailTemplate = new RegExp("^[a-zA-Z_.0-9]+[a-zA-Z0-9]@[a-zA-Z0-9][a-zA-Z_.]+[.][a-zA-Z_]+$","g");

    if(userName.value ==""||email.value==""|| phoneNumber.value==""||
    orderDelivery.value=="0"|| orderCities.value=="0"||  orderStreets.value=="0"){
        alert("Для підтвердження замовлення не повинно бути пустих полей!");
    }
    else if(!phoneTemplate.test(phoneNumber.value)){
        alert("Номер схоже не український чи був введений не коректно! Має бути у форматі +380XXXXXXXXX");

    }
    else if(!emailTemplate.test(email.value)){
        alert("Щось не так з вашою електроною поштою!")
    }
    else{
        alert(`
        Дякуємо за замовлення ${userName.value}! Відправлення прибуде за адресою ${orderStreets.options[orderStreets.selectedIndex].text}-${orderCities.options[orderCities.selectedIndex].text}. 
        Вас буде обслуговувати поштова служба "${orderDelivery.value}". Повідомлення про прибуття товару прийде за цим номером  ${phoneNumber.value} та на електрону пошту ${email.value}`);

    }
}


})