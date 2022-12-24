<?php

if (isset($_POST['submit'])) {

    $userEmail = $_POST['userEmail'];
    $pwd = $_POST['pwd'];

    //Instantiate SignupContr class
    include '../classes/db.classes.php';
    include '../classes/signin.classes.php';
    include '../classes/signin-contr.classes.php';


    $signIn = new SignInContr($pwd, $userEmail);
    $signIn->SignInUser();
    header('location: ../checkout.php?error=none');

}