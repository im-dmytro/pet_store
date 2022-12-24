<?php

if (isset($_POST['submit'])) {
    //Grabbing the data
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $pwd = $_POST['pwd'];
    $pwdConfirm = $_POST['pwdConfirm'];
    $userSex =($_POST['userSex']) ;

    //Instantiate SignupContr class
    include '../classes/db.classes.php';
    include '../classes/signup.classes.php';
    include '../classes/signup-contr.classes.php';


    $signUp = new SignupContr($userName, $pwd, $pwdConfirm, $userEmail, $userSex);
    $signUp->SignUpUser();
    header('location: ../sign-in.php?error=none');

}