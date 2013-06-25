<?php
namespace de\phpdesignpatterns\vehicles\proxies;

use de\phpdesignpatterns\vehicles\Vehicle;

require_once 'Vehicle.php';

class VehicleProxy implements Vehicle {

    protected $vehicle;

    public function __construct(Vehicle $vehicle) {
        $this->vehicle = $vehicle;
    }

    public function startEngine() {
        return $this->vehicle->startEngine();
    }

    public function moveForward($miles) {
        return $this->vehicle->moveForward($miles);
    }

    public function stopEngine() {
        return $this->vehicle->stopEngine();
    }

    public function getMilage() {
        return $this->vehicle->getMilage();
    }

    public function getDailyRate($days = 1) {
        return $this->vehicle->getDailyRate($days);
    }

    public function getManufacturer() {
        return $this->vehicle->getManufacturer();
    }

    public function getColor() {
        return $this->vehicle->getColor();
    }

    public function getMaxSpeed() {
        return $this->vehicle->getColor();
    }
}
?>