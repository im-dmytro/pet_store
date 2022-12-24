<?php
require_once "header.php";
?>

<section class="authorization">
    <h1>
        Увійти
    </h1>
    <?php

    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
            echo "<h3>У вас є пусті поля!</h3>";
        }
        elseif($_GET["error"]=="usernotfound"){
            echo "<h3>Не знайдено користувача з таким паролем та поштою!</h3>";
        }
        elseif($_GET["error"]=="wrongpwd"){
            echo "<h3>Неправильний пароль!</h3>";
        }
        elseif($_GET["error"]=="stmtfail"){
            echo "<h3>Помилка у SQL коді!</h3>";
        }
        elseif($_GET["error"]=="deleted"){
            echo "<h3 style='color: #00c013;'>Успішне видалення акаунту!</h3>";
        }
    }
    ?>
    <form action="inc/sign-in.php" method="post" name="sign-in" class="sign-up-form">
        <ul>
            <li>
                <h2>Адреса електронної пошти</h2>
                <input type="text" name="userEmail" placeholder="Адреса електронної пошти">
            </li>

            <li>
                <h2>Пароль</h2>
                <input type="password" name="pwd" placeholder="Пароль">
            </li>

        </ul>
        <div class="form__button-container">
            <input class="form__button-submit" type="submit" name="submit" value="Увійти">
            <p>
                Немає облікового запису?<br/>
                <a href="sign-up.php">Зареєструватися</a>
            </p>
        </div>
    </form>
</section>

<?php

require_once "footer.html";
?>
