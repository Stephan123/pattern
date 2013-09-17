<?php
require_once('director.php');
$director = new Director();
$car = $director->getCar('family');

echo($car);
