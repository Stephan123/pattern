<?php
require_once 'Car.php';
require_once 'PrepaidVehicleProxy.php';

use de\phpdesignpatterns\vehicles\Car;
use de\phpdesignpatterns\vehicles\proxies\PrePaidVehicleProxy;
use de\phpdesignpatterns\exceptions\MilageLimitExceededException;

$bmw = new Car('BMW', 'blau');
$proxy = new PrepaidVehicleProxy($bmw, 500);

$proxy->startEngine();
try {
    $proxy->moveForward(400);
    print "Erfolgreich 400km gefahren.\n";
    $proxy->moveForward(300);
    print "Erfolgreich 300km gefahren.\n";
} catch (MilageLimitExceededException $e) {
    print $e->getMessage() . "\n";
}

print "Kilometerstand : {$proxy->getMilage()}km.\n";
$proxy->stopEngine();
?>