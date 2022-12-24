<?php

class SignupContr extends Signup
{
    private $userName;
    private $pwd;
    private $pwdRepeat;
    private $email;
    private $userSex;

    public function __construct($userName, $pwd, $pwdRepeat, $email, $userSex)
    {
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->userName = $userName;
        $this->userSex = $userSex;
    }

    public function SignUpUser()
    {
        if (!$this->emptyInput()) {
            header('location: ../sign-up.php?error=emptyinput');
            exit();
        }
        if (!$this->invalidUid()) {
            header('location: ../sign-up.php?error=userName');
            exit();
        }
        if (!$this->invalidEmail()) {
            header('location: ../sign-up.php?error=email');
            exit();
        }
        if (!$this->pwdMatch()) {
            header('location: ../sign-up.php?error=passwordmatch');
            exit();
        }
        if (!$this->emailTakenCheck()) {
            header('location: ../sign-up.php?error=emailtaken');
            exit();
        }
        $this->setUser($this->userName, $this->pwd, $this->email, $this->userSex);
    }


    private function emptyInput()
    {
        $result = true;
        if (empty($this->userName) || empty($this->pwd) ||
            empty($this->pwdRepeat) || empty($this->userSex) ||
            empty($this->email)) {
            $result = false;
        }

        return $result;
    }

    private function invalidUid()
    {
        $result = true;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->userName)) {
            $result = false;
        }
        return $result;
    }

    private function invalidEmail()
    {
        $result = true;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        return $result;
    }

    private function pwdMatch()
    {
        $result = true;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        }
        return $result;
    }

    private function emailTakenCheck()
    {
        $result = true;
        if (!$this->checkUser($this->email)) {
            $result = false;
        }
        return $result;
    }
}