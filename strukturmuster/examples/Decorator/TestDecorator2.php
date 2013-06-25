<?php
require_once 'Car.php';
require_once 'VehicleDecoratorSpoiler.php';
require_once 'VehicleDecoratorWideTyres.php';
require_once 'VehicleDecoratorLowrider.php';

use de\phpdesignpatterns\vehicles\Car;
use de\phpdesignpatterns\vehicles\decorators\VehicleDecoratorLowrider;
use de\phpdesignpatterns\vehicles\decorators\VehicleDecoratorSpoiler;

$bmw = new Car('BMW', 'blau', 0, 180);

$lowrider = new VehicleDecoratorLowrider($bmw);
$spoiler = new VehicleDecoratorSpoiler($lowrider);

printf("Kosten pro Tag: %d\n", $spoiler->getDailyRate());

$spoiler->moveDown(3);
printf("Inch �ber dem Boden: %d\n", $spoiler->getHeight());


var_dump($spoiler->providesMethod('moveUp'));
var_dump($spoiler->providesMethod('unknownMethod'));
var_dump($spoiler->providesMethod('getDailyRate'));
?>