<?php
require_once 'CarWithExtras.php';
require_once 'CarExtras.php';

use de\phpdesignpatterns\vehicles\Car;
use de\phpdesignpatterns\vehicles\addons\Spoiler;


$bmw = new Car('BMW', 'blau', 0, 180);
printf("H�chstgeschwindigkeit ohne Spoiler: %d\n", $bmw->getMaxSpeed());
printf("Kosten pro Tag: %d\n", $bmw->getDailyRate());

$spoiler = new Spoiler();
$bmw->addExtra($spoiler);
printf("H�chstgeschwindigkeit mit Spoiler: %d\n", $bmw->getMaxSpeed());
printf("Kosten pro Tag: %d\n", $bmw->getDailyRate());
?>