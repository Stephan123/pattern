<?php
require_once 'Car.php';

use de\phpdesignpatterns\vehicles\Car;

$bmw = new Car('BMW', 'blau');
$bmw->startEngine();
$bmw->moveForward(500);
$bmw->stopEngine();

printf("Hersteller: %s\n", $bmw->getManufacturer());
printf("Farbe: %s\n", $bmw->getColor());
printf("Kilometerstand: %d km\n", $bmw->getMilage());
?>