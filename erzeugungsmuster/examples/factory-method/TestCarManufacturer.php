<?php
use de\phpdesignpatterns\util\manufacturers\CarManufacturer;

require_once 'CarManufacturer.php';

$bmwManufacturer = new CarManufacturer('BMW');


$bmw = $bmwManufacturer->sellVehicle('blau');

print "Neues Fahrzeug gekauft:\n";
print "Fahrzeugtyp: " . get_class($bmw) . "\n";
print "Hersteller : " . $bmw->getManufacturer() . "\n";
print "Farbe      : " . $bmw->getColor() . "\n";
?>