<?php
include_once('Dao.php');
include_once('ErrorLogger.php');
$username = $_POST['fname'];
$password = $_POST['pname'];

$e = new ErrorLogger();
$e->logMessage($username);
$e->logMessage($password);

session_start();
$_SESSION['LastUsernameEntered'] = $username;
$dao = new Dao();
$loggedIn = $dao->logIn($username, $password);
if ($loggedIn) {

    $_SESSION['LastUsernameEntered'] = null;
    $_SESSION['username'] = $username;
    $_SESSION['SignedIn'] = true;
    header('Location: index.php');
    exit;
} else {
    $_SESSION['SignedIn'] = false;
    header('Location: LogIn.php');
}
exit;
