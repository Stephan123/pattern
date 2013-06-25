<?php
require_once 'Automobile.php';
require_once 'AutomobileAdapter.php';

use net\schst\Automobile;;
use de\phpdesignpatterns\vehicles\ext\AutomobileAdapter;
use de\phpdesignpatterns\vehicles\Vehicle;

$bmw = new Automobile('blau', 'BMW');

$car = new AutomobileAdapter($bmw);
$car->startEngine();
$car->moveForward(500);
$car->stopEngine();

if ($car instanceof Vehicle) {
	print "Das Objekt \$car implementiert die Schnittstelle Vehicle.\n\n";
}

print "Werte der Automobile Instanz\n";
printf("Hersteller: %s\n", $bmw->getInfo(Automobile::INFO_MANUFACTURER));
printf("Farbe: %s\n", $bmw->getInfo(Automobile::INFO_COLOR));
printf("Kilometerstand: %d km\n", $bmw->getMilesDriven());

print "\nWerte der AutomobileAdapter Instanz\n";
printf("Hersteller: %s\n", $car->getManufacturer());
printf("Farbe: %s\n", $car->getColor());
printf("Kilometerstand: %d km\n", $car->getMilage());
?>