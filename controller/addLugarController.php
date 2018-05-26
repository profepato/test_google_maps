<?php
require_once '../model/Data.php';

$lat = $_REQUEST["lat"];
$lon = $_REQUEST["lon"];
$tit = $_REQUEST["tit"];
$inf = $_REQUEST["inf"];

$d = new Data();

$d->addLugar($lat, $lon, $tit, $inf);