<?php
include("Dao.php");
echo print_r($_POST);
$db = new Dao();

$foodname = $_POST['foodname'];
$videoname = $_POST['videoname'];
$videourl = $_POST['videourl'];
$missingContents = array();
if ($foodname == null) {
    $missingContents['name'] = true;
}
if ($videoname == null) {
    $missingContents['videoname'] = true;
}
if ($videourl == null) {
    $missingContents['url'] = true;
}
echo print_r($missingContents);

echo "inserting into the table";
$db->InsertIntoFoodVideoPair($foodname, $videoname, $videourl);



  
