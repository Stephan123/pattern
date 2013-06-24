<?php
require_once 'SpecialEditionManufacturer.php';
require_once 'Car.php';
require_once 'Convertible.php';

use de\phpdesignpatterns\util\manufacturers\SpecialEditionManufacturer;
use de\phpdesignpatterns\vehicles\Car;
use de\phpdesignpatterns\vehicles\Convertible;

$manufacturer = new SpecialEditionManufacturer();

$GolfElvis = new Car('VW', 'silber');
$GolfElvis->setAirConditioned(true);
$GolfElvis->setGraphics('Gitarre');
$manufacturer->addSpecialEdition('Golf Elvis Presley Edition', $GolfElvis);

$GolfStones = new Convertible('VW', 'rot');
$GolfStones->setAirConditioned(false);
$GolfStones->setGraphics('Zunge');
$manufacturer->addSpecialEdition('Golf Rolling Stones Edition', $GolfStones);

$golf1 = $manufacturer->manufactureVehicle('Golf Elvis Presley Edition');
echo "Typ        : ", get_class($golf1), "\n";
echo "Hersteller : {$golf1->getManufacturer()}\n";
echo "Farbe      : {$golf1->getColor()}\n";
echo "Grafiken   : {$golf1->getGraphics()}\n";
echo "Klima      : ", $golf1->hasAirCondition() ? "ja" : "nein", "\n";

echo "\n";
$golf2 = $manufacturer->manufactureVehicle('Golf Rolling Stones Edition');
echo "Typ        : ", get_class($golf2), "\n";
echo "Hersteller : {$golf2->getManufacturer()}\n";
echo "Farbe      : {$golf2->getColor()}\n";
echo "Grafiken   : {$golf2->getGraphics()}\n";
echo "Klima      : ", $golf2->hasAirCondition() ? "ja" : "nein", "\n";

echo "\n";
$golf3 = $manufacturer->manufactureVehicle('Golf Elvis Presley Edition');
if ($golf1 !== $golf3) {
    echo "\$golf1 ist nicht identisch mit \$golf3\n";
}

$golf4 = $manufacturer->manufactureVehicle('Golf Ray Charles Edition');
?>