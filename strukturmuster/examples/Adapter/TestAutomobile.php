<?php
require_once 'Automobile.php';

use net\schst\Automobile;

$bmw = new Automobile('blau', 'BMW');
$bmw->pluginKey();
$bmw->ignite();
$bmw->drive(Automobile::DIRECTION_FORWARD, 500);
$bmw->removeKey();
$bmw->stopIgnition();

printf("Hersteller: %s\n", $bmw->getInfo(Automobile::INFO_MANUFACTURER));
printf("Farbe: %s\n", $bmw->getInfo(Automobile::INFO_COLOR));
printf("Kilometerstand: %d km\n", $bmw->getMilesDriven());
?>