<?php
include_once('Dao.php');
$username = $_POST['fname'];
$password = $_POST['pname'];
session_start();
$_SESSION['LastUsernameEntered'] = $username;
$dao = new Dao();
$loggedIn = $dao->logIn($username, $password);
if ($loggedIn) {
    header('Location: index.php');
    $_SESSION['LastUsernameEntered'] = null;
    exit;
} else {
    header('Location: LogIn.php');
}
exit;
?>
