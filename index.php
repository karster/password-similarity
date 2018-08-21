<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';


$mozify = new \karster\image\Mozify();

$mozify->setImageSrc("https://cdn.pixabay.com/photo/2017/09/04/18/39/coffee-2714970_960_720.jpg");
//$mozify->setImageSrc("https://42796r1ctbz645bo223zkcdl-wpengine.netdna-ssl.com/wp-content/uploads/2015/02/CountryMusic1260.jpg");
$mozify->setSearchWindow(5);
$mozify->setColorDepth(8);
$mozify->setTest(false);
$result = $mozify->generate();

print_r($result);