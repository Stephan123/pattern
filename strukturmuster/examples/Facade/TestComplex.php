<?php
require_once 'CarManufacturer.php';
require_once 'ConvertibleManufacturer.php';
require_once 'RentalCompany.php';
require_once 'Debuggers.php';
require_once 'IdCreator.php';

use de\phpdesignpatterns\util\debug\DebuggerEcho;
use de\phpdesignpatterns\util\IdCreator;

use de\phpdesignpatterns\rental\RentalCompany;

use de\phpdesignpatterns\manufacturers\CarManufacturer;
use de\phpdesignpatterns\manufacturers\ConvertibleManufacturer;

$company = new RentalCompany(new DebuggerEcho());

$bmwManufacturer = new CarManufacturer('BMW');
$car = $bmwManufacturer->sellVehicle('blau');
$id = IdCreator::getInstance()->getNextId();
$company->addToFleet($id, $car);

$peugeotManufacturer = new ConvertibleManufacturer('Peugeot');
$car = $peugeotManufacturer->sellVehicle('rot');
$id = IdCreator::getInstance()->getNextId();
$company->addToFleet($id, $car);

print_r($company);
?>