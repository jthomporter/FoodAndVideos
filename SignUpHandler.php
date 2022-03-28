<?php
include_once("Dao.php");
$username = $_POST['fname'];
$password = $_POST['pname'];
$password_confirmation = $_POST['cname'];
$email = $_POST['ename'];

$dao = new Dao();
$dao->connectDB();

$dao->InsertIntoUsers($username, $password, $email);
   // insert into the database here.
header('Location: SignUp.php');
exit;
