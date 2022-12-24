<?php
require_once "header.php";
?>

    <section class="authorization">
        <h1>
            Зареєструватися
        </h1>
        <?php

        if(isset($_GET["error"])){
            if($_GET["error"]=="emptyinput"){
                echo "<h3>У вас є пусті поля!</h3>";
            }
            elseif($_GET["error"]=="userName"){
                echo "<h3>Дивне ім'я користувача!</h3>";
            }
            elseif($_GET["error"]=="email"){
                echo "<h3>Дивна електронна пошта!</h3>";
            }
            elseif($_GET["error"]=="passwordmatch"){
                echo "<h3>Паролі різні!</h3>";
            }
            elseif($_GET["error"]=="emailtaken"){
                echo "<h3>Ця пошта вже зайнята!</h3>";
            }
            elseif($_GET["error"]=="stmtfail"){
                echo "<h3>Помилка у SQL коді!</h3>";
            }
            elseif($_GET["error"]=="none"){
                echo "<h3 style='color: #003D06'>Успішна регестрація!</h3>";
            }

        }
        ?>
        <form action="inc/sign-up.php" method="post" name="sign-up" class="sign-up-form">
            <ul>
                <li>
                    <h2>Ім'я користувача</h2>
                    <input type="text" name="userName" placeholder="Ім'я користувача">
                </li>
                <li>
                    <h2>Адреса електронної пошти</h2>
                    <input type="text" name="userEmail" placeholder="Адреса електронної пошти">
                </li>
                <li>
                    <h2>Стать</h2>
                    <select name="userSex" id="">
                        <option style="color: #8a8a8a" value="0">Стать</option>
                        <option value="Чоловік">Чоловік</option>
                        <option value="Жінка">Жінка</option>
                    </select>
                </li>
                <li>
                    <h2>Пароль</h2>
                    <input type="text" name="pwd" id="sign-up-pwd" placeholder="Пароль">
                </li>
                <li>
                    <h2>Пітвердження паролю</h2>
                    <input type="text" name="pwdConfirm" id="sign-up-pwdConf" placeholder="Пітвердження паролю">
                </li>
            </ul>
            <div class="form__button-container">
                <div class="form__flag-submit">
                    <label class="form__flag-submit-container">Погоджуюсь з правилами сайту
                        <input class="submitFlag" type="checkbox" name="submitFlag" id="">
                        <span class="checkmark"></span>
                    </label>
                </div>

                <input class="form__button-submit" type="submit" name="submit" value="Зареєструватись">
                <p>
                    Вже є обліковий запис?<br/>
                    <a href="sign-in.php">Увійти</a>
                </p>
            </div>
        </form>
        <script src="./js/sign-up/check-inputs.js"> </script>
    </section>

<?php

require_once "footer.html";
?>
<?php
