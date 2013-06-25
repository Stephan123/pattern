<?php
namespace de\phpdesignpatterns\facades;

use de\phpdesignpatterns\exceptions\UnknownManufacturerException;
use de\phpdesignpatterns\rental\Customer;
use de\phpdesignpatterns\rental\RentalCompany;
use de\phpdesignpatterns\util\IdCreator;
use de\phpdesignpatterns\manufacturers\AbstractManufacturer;

require_once 'AbstractManufacturer.php';
require_once 'CarManufacturer.php';
require_once 'ConvertibleManufacturer.php';
require_once 'RentalCompany.php';
require_once 'IdCreator.php';
require_once 'Debuggers.php';

class PurchasingFacade {
    protected $company = null;
    protected $manufacturers = array();

    public function __construct(RentalCompany $company) {
        $this->company = $company;
    }

    public function addManufacturer($id, AbstractManufacturer $manufacturer) {
        $this->manufacturers[$id] = $manufacturer;
    }

    public function purchase($manufacturer, $color) {
        if (!isset($this->manufacturers[$manufacturer])) {
            throw new UnknownManufacturerException('Der Hersteller ist nicht bekannt.');
        }
        $vehicle = $this->manufacturers[$manufacturer]->sellVehicle($color);
        $id = IdCreator::getInstance()->getNextId();
        $this->company->addToFleet($id, $vehicle);

        return $vehicle;
    }
}
?>