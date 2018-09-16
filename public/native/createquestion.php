<?php 

$title=$_POST['title'];
$body=$_POST['body'];

require("vendor/autoload.php");
$m = new MongoDB\Client();

$collection = $m->examcloud->questions;


 $result = $collection->insertOne( [ "title" => $title, "body" => $body ] );

 header('Location: index.php')


?>