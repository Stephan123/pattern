<?php
namespace de\phpdesignpatterns\vehicles\decorators;

require_once 'VehicleDecorator.php';

class VehicleDecoratorLowrider extends VehicleDecorator {

    protected $height = 20;

    public function getDailyRate($days = 1) {
        $rate = $this->vehicle->getDailyRate($days);
        return $rate * 1.5;
    }

    public function moveUp($inch) {
        $this->height = $this->height + $inch;
    }

    public function moveDown($inch) {
        $this->height = $this->height - $inch;
    }

    public function getHeight() {
        return $this->height;
    }
}
?>