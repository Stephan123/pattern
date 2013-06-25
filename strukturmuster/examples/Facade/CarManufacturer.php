<?php
namespace de\phpdesignpatterns\manufacturers;

use de\phpdesignpatterns\vehicles\Car;

require_once 'AbstractManufacturer.php';
require_once 'Car.php';

class CarManufacturer extends AbstractManufacturer {

    protected function manufactureVehicle($color) {
        $vehicle = new Car($this->name, $color);
        return $vehicle;
    }
}
?>