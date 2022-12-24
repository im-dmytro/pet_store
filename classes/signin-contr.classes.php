<?php


class SignInContr extends Signin
{
    private $pwd;
    private $email;


    public function __construct($pwd, $email)
    {
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function SignInUser()
    {
        if (!$this->emptyInput()) {


            header('location: ../sign-in.php?error=emptinput');
            exit();
        }
        $this->getUser($this->email, $this->pwd);
    }


    private function emptyInput()
    {
        $result = true;
        if (empty($this->pwd) || empty($this->email)) {
            $result = false;
        }
        return $result;

    }
}