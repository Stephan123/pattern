<?php
require_once 'SpecialEditionManufacturer.php';
require_once 'CarDeepCopy.php';

use de\phpdesignpatterns\util\manufacturers\SpecialEditionManufacturer;
use de\phpdesignpatterns\vehicles\Car;
use de\phpdesignpatterns\vehicles\addons\AirCondition;

$manufacturer = new SpecialEditionManufacturer();

$GolfElvis = new Car('VW', 'silber');
$GolfElvis->setAirCondition(new AirCondition());
$GolfElvis->setGraphics('Gitarre');

$manufacturer->addSpecialEdition('Golf Elvis Presley Edition', $GolfElvis);

$golf1 = $manufacturer->manufactureVehicle('Golf Elvis Presley Edition');
$golf2 = $manufacturer->manufactureVehicle('Golf Elvis Presley Edition');

echo "Einstellung in \$golf1: ", $golf1->getAirCondition()->getDegrees(), "\n";
echo "Einstellung in \$golf2: ", $golf2->getAirCondition()->getDegrees(), "\n";

$golf1->getAirCondition()->setDegrees(16);

echo "Einstellung in \$golf1: ", $golf1->getAirCondition()->getDegrees(), "\n";
echo "Einstellung in \$golf2: ", $golf2->getAirCondition()->getDegrees(), "\n";

echo spl_object_hash($golf1->getAirCondition()) . "\n";
echo spl_object_hash($golf2->getAirCondition()) . "\n";
?>