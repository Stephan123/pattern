<?php
namespace de\phpdesignpatterns\util\manufacturers;

use de\phpdesignpatterns\vehicles\Vehicle;

require_once 'Vehicle.php';
require_once 'UnknownSpecialEditionException.php';

class SpecialEditionManufacturer {

    protected $prototypes = array();

    public function addSpecialEdition($edition, Vehicle $prototype) {
        $this->prototypes[$edition] = $prototype;
    }

    public function manufactureVehicle($edition) {
        if (!isset($this->prototypes[$edition])) {
            throw new UnknownSpecialEditionException('No prototype for special edition ' . $edition . ' registered.');
        }
        return clone $this->prototypes[$edition];
    }
}
?>