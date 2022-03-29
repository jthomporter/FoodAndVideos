<?php
session_start();
include("Dao.php");
$username = $_POST['fname'];
$password = $_POST['pname'];
$password_confirmation = $_POST['cname'];
$email = $_POST['ename'];

$dao = new Dao();
$dao->connectDB();

$missingInfo = array();
$missingInfo['username'] = false;
$missingInfo['password'] = false;
$missingInfo['email'] = false;
$_SESSION['SignUpError'] = $missingInfo;
$_SESSION['InvalidEmail'] = false;
$errorBool = false;

if ($username == null) {
   // echo $username;
    $missingInfo['username'] = true;
    $errorBool = true;
} 
if ($password == null) {
    $missingInfo['password'] = true;
    $errorBool = true;
} 
if ($email == null) {
     $missingInfo['email'] = true;
     $errorBool = true;
}

if (preg_match("/^\\S+@\\S+\\.\\S+$/", $email) == 1) {
    $_SESSION['InvalidEmail'] = true;
}

 //echo sizeof($missingInfo);
// echo print_r($_SESSION);
//echo (array_key_exists('InvalidEmail', $_SESSION) && $_SESSION['InvalidEmail'] == true);
if ($errorBool) {
    $_SESSION['SignUpError'] = $missingInfo;
    //echo "error";
   header('refresh:1;url=SignUp.php');
   exit;
} else {
    //echo "method call";
    $dao->InsertIntoUsers($username, $password, $email);
}

//echo $_SESSION['SignedIn'];

if ($_SESSION['SignedIn'] == null) {
   // echo "something went wrong";
  header('refresh:1;url=SignUp.php');
exit;
} else {
    //echo "it worked again";
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
}
