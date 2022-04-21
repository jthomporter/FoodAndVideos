<?php

//echo print_r($_POST);

session_start();

$foodname = $_POST['foodname'];
$videoname = $_POST['videoname'];
$videourl = $_POST['videourl'];
$oldContent = array();
$_SESSION['oldContent'] = array();
$oldContent['foodname'] = $foodname;
$oldContent['oldContent']['videoname'] = $videoname;
$oldContent['oldContent']['videourl'] = $videourl;


$errorbool = false;
$missingContents = array();
if ($foodname == null) {
    $missingContents['name'] = true;
    $errorbool = true;
}
if ($videoname == null) {
    $missingContents['videoname'] = true;
    $errorbool = true;
}
if ($videourl == null) {
    $missingContents['url'] = true;
    $errorbool = true;
}
//echo print_r($missingContents);
if ($errorbool) {
    $_SESSION['oldContent'] = $oldContent;
    $_SESSION['MissingVideoForm'] = $missingContents;
    //print_r($missingContents);
    header('Location: Contribute.php');
    die();
}



if (!$errorbool) {
    //echo "inserrt";
    include_once("Dao.php");
    $db = new Dao();
    //   echo "inserting into the table";
    $db->InsertIntoFoodVideoPair($foodname, $videoname, $videourl);
    header('Location: index.php');
    exit;
}
