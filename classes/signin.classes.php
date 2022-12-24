<?php

class Signin extends Db
{
    protected function getUser($email, $pwd)
    {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM
        users WHERE users_email=? or users_pwd=?;');


        if (!$stmt->execute(array($email,$pwd))) {
            $stmt = null;
            header("location: ../sign-in.php?error=stmtfail");
            exit();
        }
        $compPwd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd=strval($pwd) == strval($compPwd[0]["users_pwd"]);
        if (!$checkPwd) {
            $stmt = null;
            header("location: ../sign-in.php?error=wrongpwd");
            exit();
        }
         else if ($checkPwd){
            $stmt = $this->connect()->prepare('SELECT * FROM
        users WHERE users_email=? AND users_pwd=?;');
            if (!$stmt->execute(array($email, $pwd))) {
                $stmt = null;
                header("location: ../sign-in.php?error=stmtfail");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../sign-in.php?error=usernotfound");
                exit();
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["usersEmail"] = $user[0]["users_email"];
            $_SESSION["userName"] = $user[0]["users_name"];
            $_SESSION["userCart"] = $user[0]["users_cart"];


        }
        $stmt = null;


    }


}