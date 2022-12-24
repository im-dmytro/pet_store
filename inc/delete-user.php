<?php
session_start();
include '../classes/db.classes.php';
include '../classes/delete-user.classes.php';
if(isset($_SESSION['userid'])) {
    $pwdToCheck=$_POST['pwdToCheck'];
    $deleteUser=new DeleteUser($_SESSION['userid'],$pwdToCheck);

}
