<?php
require_once 'ConvertibleManufacturer.php';

use de\phpdesignpatterns\util\manufacturers\ConvertibleManufacturer;

$peugeotManufacturer = new ConvertibleManufacturer('Peugeot');
$peugeot = $peugeotManufacturer->sellVehicle('schwarz');

print "Neues Fahrzeug gekauft:\n";
print "Fahrzeugtyp: " . get_class($peugeot) . "\n";
print "Hersteller : " . $peugeot->getManufacturer() . "\n";
print "Farbe      : " . $peugeot->getColor() . "\n";
?>