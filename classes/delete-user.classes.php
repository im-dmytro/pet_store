<?php

class DeleteUser extends Db
{
    public function __construct($userId, $pwdToConfirm)
    {
        $userId=$userId;
        $pwdToConfirm=$pwdToConfirm;

        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_id=? and users_pwd=?;');

        if (!$stmt->execute(array($userId,$pwdToConfirm))) {
            $stmt = null;
            exit();
        }
        $compPwd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            $checkPwd=strval($pwdToConfirm) == strval($compPwd[0]["users_pwd"]);
            if ($checkPwd) {

                session_unset();
                session_destroy();
                echo 'sign-in.php?error=deleted';
                $stmt = $this->connect()->prepare('DELETE FROM users WHERE users_id=? and users_pwd=?;');
                if (!$stmt->execute(array($userId,$pwdToConfirm))) {
                    echo '../checkout.php?error=failed';
                    $stmt = null;
                    exit();
                }

                exit();
            }

        } else {
            $stmt = null;
            echo './checkout.php?error=notdeleted';
            exit();
        }



    }

}