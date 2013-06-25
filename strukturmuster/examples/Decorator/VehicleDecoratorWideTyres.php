<?php
namespace de\phpdesignpatterns\vehicles\decorators;

require_once 'VehicleDecorator.php';

class VehicleDecoratorWideTyres extends VehicleDecorator {

    public function getMaxSpeed() {
        $speed = $this->vehicle->getMaxSpeed();
        return round($speed * 0.95);
    }

    public function getDailyRate($days = 1) {
        $rate = $this->vehicle->getDailyRate($days);
        return $rate + 5;
    }
}
?>