<?php
namespace de\phpdesignpatterns\vehicles\proxies;

use de\phpdesignpatterns\vehicles\Vehicle;
use de\phpdesignpatterns\exceptions\MilageLimitExceededException;

require_once 'VehicleProxy.php';
require_once 'MilageLimitExceededException.php';

class PrepaidVehicleProxy extends VehicleProxy {

    protected $maxMileage;
    protected $milesDriven = 0;

    public function __construct(Vehicle $vehicle, $maxMileage) {
        parent::__construct($vehicle);
        $this->maxMileage = $maxMileage;
    }

    public function moveForward($miles) {
        if (($this->milesDriven + $miles) > $this->maxMileage) {
            $exceeded = $miles - ($this->maxMileage - $this->milesDriven);
            throw new MilageLimitExceededException($this->maxMileage, $exceeded);
        }
        $this->milesDriven = $this->milesDriven + $miles;
        return $this->vehicle->moveForward($miles);
    }
}
?>