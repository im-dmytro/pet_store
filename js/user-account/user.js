window.addEventListener("click", function (e) {
    if (e.target.dataset.action == "delete-user") {
     const pwdToCheck=   prompt("Ви справді хочете видалити ваш аккаунт? Введіть пароль для підтвердження!");
     if(pwdToCheck){
         $.post("../../../pet-store/inc/delete-user.php", {pwdToCheck: pwdToCheck.toString()}, function (data){
             location.href=data;
         });
     }

    }
})