<?php
require_once 'Car.php';
require_once 'VehicleDecoratorSpoiler.php';
require_once 'VehicleDecoratorWideTyres.php';
require_once 'VehicleDecoratorLowrider.php';

use de\phpdesignpatterns\vehicles\Car;
use de\phpdesignpatterns\vehicles\decorators\VehicleDecoratorSpoiler;
use de\phpdesignpatterns\vehicles\decorators\VehicleDecoratorWideTyres;

$bmw = new Car('BMW', 'blau', 0, 180);
printf("H�chstgeschwindigkeit des BMW: %d\n", $bmw->getMaxSpeed());
printf("Kosten pro Tag: %d\n", $bmw->getDailyRate());

$mitSpoiler = new VehicleDecoratorSpoiler($bmw);
printf("H�chstgeschwindigkeit mit Spoiler: %d\n", $mitSpoiler->getMaxSpeed());
printf("Kosten pro Tag: %d\n", $mitSpoiler->getDailyRate());

$mitSpoilerUndReifen = new VehicleDecoratorWideTyres($mitSpoiler);
printf("H�chstgeschwindigkeit mit Spoiler und Breitreifen: %d\n", $mitSpoilerUndReifen->getMaxSpeed());
printf("Kosten pro Tag: %d\n", $mitSpoilerUndReifen->getDailyRate());

$lowrider = new VehicleDecoratorWideTyres($bmw);
printf("H�chstgeschwindigkeit mit Lowrider: %d\n", $lowrider->getMaxSpeed());
printf("Kosten pro Tag: %d\n", $lowrider->getDailyRate());
?>