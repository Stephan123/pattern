<?php
namespace de\phpdesignpatterns\vehicles\decorators;

require_once 'VehicleDecorator.php';

class VehicleDecoratorSpoiler extends VehicleDecorator {

    public function getMaxSpeed() {
        $speed = $this->vehicle->getMaxSpeed();
        return $speed + 15;
    }

    public function getDailyRate($days = 1) {
        $rate = $this->vehicle->getDailyRate($days);
        return $rate + 10;
    }
}
?>