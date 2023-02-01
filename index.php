<?php

require_once "./vendor/autoload.php";

use App\Finder;

$finder = new Finder();


$sql = Finder::select('user')->where("age > 10");

echo Finder::getSql();