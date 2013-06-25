<?php
namespace de\phpdesignpatterns\exceptions;

class RentalException extends Exception {
};

class UnknownVehicleException extends RentalException {

};

class VehicleNotAvailableException extends RentalException {
};

class UnknownManufacturerException extends Exception {
}
?>