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

if ($username == null) {
    echo $username;
    $missingInfo['username'] = true;
} 
if ($password == null) {
    $missingInfo['password'] = false;
} 
if ($email == null) {
     $missingInfo['email'] = true;
}


echo sizeof($missingInfo);
if (sizeof($missingInfo) != 0) {
    $_SESSION['SignUpError'] = $missingInfo;
    header('Location SignUp.php');

    exit;
} else {
   
    $dao->InsertIntoUsers($username, $password, $email);
}

echo $_SESSION['SignedIn'];

if ($_SESSION['SignedIn'] == null) {
    echo "something went wrong";
header('Location: SignUp.php');
exit;
} else {
    echo "it worked again";
    header('Location: index.php');
    exit;
}
