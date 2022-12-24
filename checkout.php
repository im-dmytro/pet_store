<?php

include_once "header.php";
?>

<section class="order-cart" id="form-user">
    <?php
    if(isset($_GET['error'])){
        if($_GET['error']=='none'){
            echo '<h1 style="font-size: 18px; color: #00c013; margin: 20px 0 ; line-height: 18px">Успішний вхід!</h1>';
        }
        if($_GET['error']=='notdeleted'){
            echo '<h1 style="font-size: 18px; color: #c60001; margin: 20px 0 ; line-height: 18px">Пароль неправильний!</h1>';
        }
    }
    echo '
<h1 style="margin-top: 5px">
        Вітаю, ' . $_SESSION["userName"] . '! 
        <br>
        <span>Оформлення відправлення</span>
    </h1>
    ';
    ?>
    <div class="order-container">
        <form name="make-order" class="order-form">
            <?php
            echo '
            <ul>
                <li>
                    <h2>Ім\'я користувача</h2>
                    <input type="text" name="userName" placeholder="' . $_SESSION["userName"] . '"
                    value="' . $_SESSION["userName"] . '">
                </li>
                <li>
                    <h2>Адреса електронної пошти</h2>
                    <input type="text" name="userEmail" placeholder="' . $_SESSION["usersEmail"] . '"
                    value="' . $_SESSION["usersEmail"] . '">
                </li>
                <li>
                    <h2>Номер телефону</h2>
                    <input type="text" name="phoneNumber" placeholder="Номер телефону">
                </li>
                <li>
                    <h2>Спосіб доставки</h2>
                    <select name="SelectDelivery" id="">
                        <option style="color: #8a8a8a" value="0">Доставка</option>
                        <option value="Meest">Meest</option>
                        <option value="Нова пошта">Нова пошта</option>
                    </select>
                </li>
                  <li>
                  <h2>Вибрати місто</h2>
                         <select name="cities" id="form-list-city">
                        <option style="color: #8a8a8a" value="0">Міста</option>
                    </select>
                </li>
                    <li>
                  <h2>Вибрати вулицю</h2>
                            <select name="streets" id="form-list-street">
                        <option style="color: #8a8a8a" value="0">Вулиці</option>
                    </select>
                </li>
            </ul>
                ';
            ?>
            <div class="form__button-container">
                <input type="button" class="form__button-submit" value="Замовити" id="order-button">
            </div>
        </form>
        <div class="cart">
            <div class="cart-header">
                    <span>
                        Товар
                    </span>
                    <span>
                       Кількість
                    </span>
                    <span>
                        Ціна
                    </span>
            </div>
            <ul class="">
                <?php
                $totalCartSum=0;
                if (isset($_SESSION['userCart'])) {

                    function reduceTotalPrice($currentValue,$total){
                        $total+=$currentValue;
                        return $total;
                    }


                    $products = json_decode($_SESSION['userCart'], true);
                    foreach ($products['currentCart'] as &$value) {
                        $id = $value["productId"];
                        $quantity = $value["productQuantity"];
                        $imgSrc = $value["productSrc"];
                        $price = $value["productPrice"];
                        $text = $value['productText'];
                        $name = $value["productName"];
                        $totalCartSum= reduceTotalPrice($price,$totalCartSum);

                        echo '

  <li class="cart-item" data-id="' .$id. '">
  <span class="delete"  data-action="delete-product">x</span>
                  <figure>
                  <img src="' . $imgSrc . '" alt="">
                   <figcaption>
                            <h1>' . $name . '</h1>
                            <p>' . $text . '</p>
                        </figcaption>
        </figure>       
                        <div class="arrow-container">
                            <span class="quantity" id="">' . $quantity . '</span>
                    </div>
                    <div class="price">$' . $price . '</div>
 
                </li>
';
                    }
                }
                ?>
            </ul>
            <div class="cart-total">
                <?php
                echo '<p>Загальна вартість: <span>$'.$totalCartSum.' </span></p>';
                ?>

            </div>
        </div>
</section>
<a data-action="delete-user"  class="delete-user">Видалити аккаунт</a>
<script src="./js/order/select-cities.js"></script>
<script src="./js/order/check-order-inputs.js"></script>
<script src="./js/user-account/user.js"></script>

<?php
include_once "footer.html";
?>
