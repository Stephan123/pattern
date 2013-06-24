<?php
namespace de\phpdesignpatterns\vehicles\addons;

class AirCondition {
    protected $degrees = 20;

    public function setDegrees($degrees) {
        $this->degrees = $degrees;
    }

    public function getDegrees() {
        return $this->degrees;
    }
}
?>