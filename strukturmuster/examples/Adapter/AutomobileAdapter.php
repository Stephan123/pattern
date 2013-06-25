<?php
namespace de\phpdesignpatterns\vehicles\ext;

require_once 'Vehicle.php';

use de\phpdesignpatterns\vehicles\Vehicle;
use net\schst\Automobile;

class AutomobileAdapter implements Vehicle {

    /**
     * Objekt, das an die Vehicle Schnittstelle adaptiert wird
     *
     * @var Automobile
     */
    protected $automobile;

    public function __construct(Automobile $automobile) {
        $this->automobile = $automobile;
    }

    public function startEngine() {
        try {
            $this->automobile->pluginKey();
            $this->automobile->ignite();
        } catch (AutomobileException $e) {
            return false;
        }
        return true;
    }

    public function moveForward($miles) {
        try {
            $this->automobile->drive(Automobile::DIRECTION_FORWARD, $miles);
        } catch (AutomobileException $e) {
            return false;
        }
        return true;
    }

    public function stopEngine() {
        $this->automobile->stopIgnition();
        $this->automobile->removeKey();
    }

    public function getMilage() {
        return $this->automobile->getMilesDriven();
    }

    public function getDailyRate($days = 1) {
        return 75;
    }

    public function getManufacturer() {
        return $this->automobile->getInfo(Automobile::INFO_MANUFACTURER);
    }
    public function getColor() {
        return $this->automobile->getInfo(Automobile::INFO_COLOR);
    }
}
?>