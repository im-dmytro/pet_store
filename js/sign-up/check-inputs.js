const pwd = document.getElementById("sign-up-pwd");
const pwdConf = document.getElementById("sign-up-pwdConf");
let isNotEqual=false;
let isItLikeTemplate=false;
addCheckingPassword(pwd);
addCheckingPassword(pwdConf);
function addCheckingPassword(button) {
    button.addEventListener('keyup', function () {
        const pwdTemplate = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
        if (pwdTemplate.test(pwd.value) == false||pwdTemplate.test(pwdConf.value)==false) {
            isItLikeTemplate=false;
        }else{
            isItLikeTemplate=true;
        }
        isNotEqual=pwdConf.value!=pwd.value?false:true;
    });
}
document.body.addEventListener("click", function (e) {
    const checkboxSubmit = document.querySelector(".submitFlag");
    const submitButton = document.querySelector(".form__button-submit");
    //disableButton(submitButton);

    if (e.target == submitButton) {
        if (checkboxSubmit.checked == false) {
            alert("Для реєстрації ви маєте погодитись з правилами сайту!");
            e.preventDefault();
           // disableButton(submitButton);
        }
        else if(!isItLikeTemplate){
            alert("Пароль має містити від 7 до 15 символів, які містять принаймні одну цифру та спеціальний символ");
            e.preventDefault();
        } else if(!isNotEqual){
            alert("Паролі не співпадають!");
            e.preventDefault();
        }
    }


});
