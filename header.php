<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&family=Philosopher:wght@400;700&family=Poppins:wght@700&family=Roboto:wght@200;300;400;500;600;900&display=swap"
          rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<header class="header">
    <div class="marquee-container">
        <div class="current-date" data-action="getDate"></div>
        <marquee behavior="" class="marquee" direction="">
            <div class="marquee__container">
                <div>haloween розпродаж <span>-50%</span></div>
                <div>безкоштовна доставка на першу покупку</div>
            </div>
        </marquee>
    </div>

    <nav>
        <div class="left-nav">
            <div id="nav-icon1" onclick="openNav()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="logo">
                <a href="index.php">
                      <span>
                Pet's </span>
                    <img src="././img/header/logo.svg"/>
                    <span> Ally</span>
                </a>
            </div>

        </div>

        <div class="right-nav">
            <?php
            if (isset($_SESSION["userid"])) {
                echo '<div class="account">
                      <a href="inc/logout.inc.php">Вийти</a></div>
               <a href="checkout.php"><img src="./img/header/account.svg"></a>';
            } else {
                echo '<div class="account">
                <a href="sign-in.php">Увiйти
                   </a></div>
               <a href="sign-in.php"><img src="./img/header/account.svg"></a>
                ';
            }
            ?>

            <a>
                <img id="cart-img" data-action="openCart" alt="" src="./img/header/cart.svg">
            </a>
            <div class="cart-preview">
                <ul class="cart-wrapper">
                    <?php

                    if (isset($_SESSION['userCart'])) {

                        $products = json_decode($_SESSION['userCart'], true);
                        foreach ($products['currentCart'] as &$value) {
                            $id = $value["productId"];
                            $quantity = $value["productQuantity"];
                            $imgSrc = $value["productSrc"];
                            $price = $value["productPrice"];
                            $name = $value["productName"];

                            echo '<li class="cart-item" data-id="' . $id . '">
                        <figure>
                            <img src="' . $imgSrc . '">
                        </figure>
                        <figcaption>
                            <h1>' . $name . '</h1>
                          </figcaption>
                        <div class="quantity">' . $quantity . '</div>
                        <div class="price">' . $price . '</div>
                    </li>';
                        }
                    }
                    ?>
                </ul>
                <?php
                if (isset($_SESSION["userid"])) {

                    echo '
<a href="checkout.php">
                    <input type="submit" name="goCheckout" value="Перейти до оплати">
</a>
';
                } else {
                    echo ' <a href="sign-in.php">
                    <input type="button" value="Увійти">
                </a>';
                }
                ?>

            </div>
        </div>
    </nav>
    <ul class="categories">
        <li><a href="catalogue.php?category=toys">
                Iграшки
            </a></li>
        <li><a href="catalogue.php?category=walkin">
                Прогулянка
            </a></li>
        <li>
            <a onclick="" href="catalogue.php?category=home">
                Додому
            </a>
        </li>
        <li>
            <a href="catalogue.php?category=treats">
                Ласощi
            </a>
        </li>
    </ul>
    <div id="mySidenav" class="sidenav">
        <a>
            <div id="nav-icon2" onclick="closeNav(this)">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <a href="catalogue.php?category=toys">
            Iграшки
        </a><a href="catalogue.php?category=walkin">
            Прогулянка
        </a>
        <a onclick="" href="catalogue.php?category=home">
            Додому
        </a>

        <a href="catalogue.php?category=treats">
            Ласощi
        </a>
    </div>
    <script src="./js/header/side-menu.js">
    </script>
    <script src="./js/header/open-cart.js">
    </script>
    <script src="./js/catalogue/cart.js">
    </script>
    <script src="./js/header/gettingCurrentDate.js">
    </script>
</header>
<div style="margin-bottom: 135px"></div>
