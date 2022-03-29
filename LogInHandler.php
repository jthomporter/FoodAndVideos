<?php
include_once('Dao.php');
include_once('ErrorLogger.php');
$username = $_POST['fname'];
$password = $_POST['pname'];
session_start();
$_SESSION['LastUsernameEntered'] = $username;
$dao = new Dao();
$loggedIn = $dao->logIn($username, $password);
if ($loggedIn) {

    $_SESSION['LastUsernameEntered'] = null;
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
} else {
    header('Location: LogIn.php');
}
exit;
