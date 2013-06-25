<?php
namespace de\phpdesignpatterns\manufacturers;

use de\phpdesignpatterns\vehicles\Convertible;

require_once 'AbstractManufacturer.php';
require_once 'Convertible.php';

class ConvertibleManufacturer extends AbstractManufacturer {

    protected function manufactureVehicle($color) {
        $vehicle = new Convertible($this->name, $color);
        return $vehicle;
    }
}
?>