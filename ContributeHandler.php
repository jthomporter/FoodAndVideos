<?php
include("Dao.php");
echo print_r($_POST);
$db = new Dao();

$foodname = $_POST['foodname'];
$videoname = $_POST['videoname'];
$videourl = $_POST['videourl'];
$_SESSION['oldContent'] = array();
$_SESSION['oldContent']['foodname'] = $foodname;
$_SESSION['oldContent']['videoname'] = $foodname;
$_SESSION['oldContent']['videourl'] = $videourl;


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
    $_SESSION['MissingVideoForm'] = $missingContents;
    header('Location: Contribute.php');
    exit;
}


echo "inserting into the table";
$db->InsertIntoFoodVideoPair($foodname, $videoname, $videourl);
if (sizeof($missingContents)==0) {
    header('Location: index.php');
    exit;
}



  
