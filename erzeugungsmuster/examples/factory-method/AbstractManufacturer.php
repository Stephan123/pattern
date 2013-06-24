<?php
namespace de\phpdesignpatterns\util\manufacturers;

abstract class AbstractManufacturer {

    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function sellVehicle($color) {
        $vehicle = $this->manufactureVehicle($color);
        $vehicle->startEngine();
        $vehicle->moveForward(1);
        $vehicle->stopEngine();

        return $vehicle;
    }

    abstract protected function manufactureVehicle($color);
}
?>