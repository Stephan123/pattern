<?php
namespace de\phpdesignpatterns\vehicles\decorators;

require_once 'Vehicle.php';

use de\phpdesignpatterns\vehicles\Vehicle;

abstract class VehicleDecorator implements Vehicle {

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
        return $this->vehicle->getMileage();
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
        return $this->vehicle->getMaxSpeed();
    }

    public function __call($method, $args) {
        return call_user_func_array(
                 array($this->vehicle, $method),
                 $args
               );
    }

    public function providesMethod($name) {
        if (method_exists($this, $name)) {
            return true;
        }
        if ($this->vehicle instanceof VehicleDecorator) {
            return $this->vehicle->providesMethod($name);
        }
        return method_exists($this->vehicle, $name);
    }
}
?>