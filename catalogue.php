<?php
include_once 'header.php'
?>
    <section class="catalogue">
        <?php
        $min_max = "";
        $max_min = "";
        $shuffle = "";
        $category = null;
        $header_category = null;
        if ($_GET['category'] == 'walkin') {
            $category = 'walkin';
            $header_category = "Прогулянка";
        } else if ($_GET['category'] == 'toys') {
            $category = 'toys';
            $header_category = "Іграшки";
        } else if ($_GET['category'] == 'treats') {
            $category = 'treats';
            $header_category = "Ласощі";
        } else if ($_GET['category'] == 'home') {
            $category = 'home';
            $header_category = "Додому";
        } else {
            echo "" . $_GET['category'];
        }

        if (isset($_GET['sort'])) {
            if ($_GET['sort'] == 'min-max') {
                $min_max = "selected";
                function sortFunc(&$array)
                {
                    uasort($array, function ($a, $b) {
                        return ($a['price'] < $b['price']) ? -1 : 1;
                    });
                }
            } else if ($_GET['sort'] == 'max-min') {
                $max_min = "selected";
                function sortFunc(&$array)
                {
                    uasort($array, function ($a, $b) {
                        return ($a['price'] > $b['price']) ? -1 : 1;
                    });
                }

            } else if ($_GET['sort'] == 'shuffle') {
                $shuffle = "selected";
                function sortFunc(&$array)
                {
                    return shuffle($array);
                }
            }
        }
        echo ' <div class="catalogue-header">
           <p>' . $header_category . '</p>
             <select data-action="filter-catalogue" name="catalogue-sort" class="catalogue-sort" id="">
        <option value="shuffle" ' . $shuffle . '>Товари відображенно хаотично</option>
        <option value="max-min" ' . $max_min . '>Сортувати за ціною max-min</option>
        <option value="min-max" ' . $min_max . '>Сортувати за ціною min-max</option>
        </select>
        </div>';

        ?>
        <div class="catalogue-container">
            <ul class="catalogue-items">
                <?php
                $productsJSON = file_get_contents("./js/catalogue/products.json", true);
                $products = json_decode($productsJSON, true);
                if (isset($_GET['sort'])) {
                    sortFunc($products[$category]);
                } else {
                    shuffle($products[$category]);
                }
                foreach ($products[$category] as &$value) {
                    $imgSrc = $value["imgSrc"];
                    $price = $value["price"];
                    $name = $value["name"];
                    $text = $value["text"];
                    $id = $value["id"];
                    echo '<li class="catalogue-item" data-id="' . $id . '">
                    <fiure>
                        <img src="' . $imgSrc . '" alt="" class="product-img">
                        <figcaption>
                            <h1>' . $name . '</h1>
                            <p> ' . $text . '</p>
                        </figcaption>
                    </fiure>
                    <div>
                    <div class="quantity-container">
                        <h2>Кількість:</h2>
                        <div class="arrow-container">
                            <img data-action="minus" src="img/catalogue/arrow-left.svg"
                                 class="arrow-left"/>
                            <span class="quantity" id="">1</span>
                            <img data-action="plus" src="img/catalogue/arrow-right.svg"
                                 class="arrow-right"/>
                        </div>
                    </div>
                    <button data-cart data-action="post">
                        Купуйте зараз - <span data-action="post" data-cart class="price">$' . $price . '</span>
                    </button>
                    </div>
                </li>';

                }
                ?>

            </ul>
        </div>
    </section>
    <script src="js/catalogue/cart-counter.js"></script>
    <script src="js/catalogue/filter-catalogue.js"></script>


<?php
include_once 'footer.html'
?>