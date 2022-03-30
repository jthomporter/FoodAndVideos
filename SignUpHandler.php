<?php
session_start();
include("Dao.php");
$username = $_POST['fname'];
$password = $_POST['pname'];
$password_confirmation = $_POST['cname'];
$email = $_POST['ename'];
$_SESSION['nummissingelements'] = 0;
$_SESSION['matchingpasswords'] = true;
$_SESSION['uniqueEmailAndUsername'] = true;
if ($password != $password_confirmation) {
    $_SESSION['matchingpasswords'] = false;
    $errorBool = true;
}

$OldData = array();
$OldData['username'] = $username;
$OldData['password'] = $password;
$OldData['email'] = $email;

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
    $_SESSION['nummissingelements']+=1;
   // echo $username;
    $missingInfo['username'] = true;
    $OldData['username'] = null;
    $errorBool = true;
} 
if ($password == null) {
    $_SESSION['nummissingelements']+=1;
    $missingInfo['password'] = true;
    $OldData['password'] = null;
    $errorBool = true;
} 
if ($password_confirmation == null) {
    $_SESSION['nummissingelements']+=1;
    $missingInfo['passwordconfirmation'] = true;
    $OldData['passwordconfirmation'] = null;
    $errorBool = true;
} 
if($email == null) {
    $_SESSION['nummissingelements']+=1;
     $missingInfo['email'] = true;
     $OldData['email'] = null;
     $errorBool = true;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) == 1) {
    $_SESSION['InvalidEmail'] = true;
    $errorBool = true;
}

 //echo sizeof($missingInfo);
// echo print_r($_SESSION);
//echo (array_key_exists('InvalidEmail', $_SESSION) && $_SESSION['InvalidEmail'] == true);
if ($errorBool) {
    $_SESSION['SignUpError'] = $missingInfo;
    //echo "error";
    $_SESSION['olddata'] = $OldData;
   header('refresh:1;url=SignUp.php');
   exit;
} else {
    //echo "method call";
    $dao->InsertIntoUsers($username, $password, $email);
}

//echo $_SESSION['SignedIn'];

if ($_SESSION['SignedIn'] == null) {
   // echo "something went wrong";
   $_SESSION['olddata'] = $OldData;
  header('refresh:1;url=SignUp.php');
exit;
} else {
    $_SESSION['uniqueEmailAndUsername'] = false;
    //echo "it worked again";
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
}
