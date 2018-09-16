<?php 
require("vendor/autoload.php");
$m = new MongoDB\Client();
// var_dump($m);

$collection = $m->examcloud->questions;


$name = $_POST['delkey'];

//$res= $collection->remove("title": "four");
$collection->deleteOne(['title' => $name]);

header("Location: index.php");