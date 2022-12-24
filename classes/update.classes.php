<?php
class UpdateCart extends Db
{

    public function __construct($userId,$cartJson)
    {
        $userId=$userId;
        $cartJson=$cartJson;

        $stmt = $this->connect()->prepare('UPDATE `users` SET `users_cart` = ? WHERE `users`.`users_id` = ?;');

        if (!$stmt->execute(array($cartJson,$userId))) {
            $stmt = null;
            exit();
        }

    }
    public function GetUsersCart($userId){
        $stmt = $this->connect()->prepare('SELECT `users_cart` from `users` WHERE `users`.`users_id` = ?;');

        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            exit();
        }

        $userCart = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['userCart']=$userCart[0]['users_cart'];
    }

}