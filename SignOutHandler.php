<?php
session_start();
$_SESSION['SignedIn'] = false;
header('Location: index.php');


