<?php
session_start();
include '../classes/db.classes.php';
include '../classes/update.classes.php';
if(isset($_POST['data'])&&isset($_SESSION['userid'])){

    $userId=$_SESSION['userid'];
    $cartJson=($_POST['data']);
    $update=new UpdateCart($userId,$cartJson);
    $update->GetUsersCart($userId);
    $cartJson=json_decode($cartJson,true);

    json_encode($cartJson['currentCart']);

}

else if(isset($_SESSION['userCart'])){
    $userCart=($_SESSION['userCart']);


    echo ($userCart);
}



