<?php

class Signup extends Db
{
    protected function setUser($userName, $pwd, $email, $userSex)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users 
                 (users_name,users_pwd,users_email,users_sex,users_cart)
                 VALUES (?,?,?,?,null);');

        if (!$stmt->execute(array($userName, $pwd, $email, $userSex))) {
            $stmt = null;
            header("location: ../sign-up.php?error=stmtfail");
            exit();
        }
    }

    protected function checkUser($email)
    {
        $stmt = $this->connect()->prepare('SELECT users_name FROM users WHERE users_email=?;');
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../sign-up.php?error=stmtfail");
            exit();
        }
        $resultCheck = true;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }

        return $resultCheck;
    }

}