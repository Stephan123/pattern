<?php
namespace de\phpdesignpatterns\rental;

use de\phpdesignpatterns\util\debug\Debugger;
use de\phpdesignpatterns\vehicles\Vehicle;

require_once 'RentalAction.php';

class RentalCompany {

    /**
     * Fahrzeuge, die vermietet werden k�nnen
     *
     * @var array
     */
    protected $fleet = array();

    /**
     * Leihvorg�nge
     *
     * @var array
     */
    protected $rentalActions = array();

    /**
     * Debugger Objekt
     *
     * @var Debugger
     */
    protected $debugger;

    /**
     * Konstrukor muss jetzt debugger erzeugen
     *
     */
    public function __construct(Debugger $debugger) {
        $this->debugger = $debugger;
    }

    /**
     * F�gt ein neues Fahrzeug der Flotte hinzu
     *
     * @param string  $id
     * @param Vehicle $vehicle
     */
    public function addToFleet($id, Vehicle $vehicle) {
        $this->fleet[$id]  = $vehicle;
        $this->debug("Neues Auto im Fuhrpark: " . $vehicle->getManufacturer());
    }

    /**
     * Leiht ein Fahrzeug aus
     *
     * @param Vehicle $vehicle
     * @param Customer $customer
     * @return RentalAction
     */
    public function rentVehicle(Vehicle $vehicle, Customer $customer) {
        $vehicleId = array_search($vehicle, $this->fleet);
        if ($vehicleId === false) {
        	throw new UnknownVehicleException();
        }
        if (!$this->isVehicleAvailable($vehicle)) {
        	throw new VehicleNotAvailableException();
        }
        $rentalAction = new RentalAction($vehicle, $customer);
        $this->rentalActions[] = $rentalAction;
        $this->debug("Neuer Mietvorgang: " . $customer->getName() . " leiht " . $vehicle->getManufacturer());

        return $rentalAction;
    }

    /**
     * Gibt ein Fahrzeug zur�ck
     *
     * @param Vehicle $vehicle
     * @return boolean
     */
    public function returnVehicle(Vehicle $vehicle) {
        foreach ($this->rentalActions as $rentalAction) {
        	if ($rentalAction->getVehicle() !== $vehicle) {
        		continue;
        	}
        	if ($rentalAction->isReturned()) {
        		continue;
        	}
        	$rentalAction->markVehicleReturned();
            $this->debug("R�ckgabe: " . $rentalAction->getCustomer()->getName() . " gibt " . $vehicle->getManufacturer() . " zur�ck.");
        	return true;
        }
        return false;
    }

    /**
     * �berpr�ft, ob ein Fahrzeug gerade ausgeliehen werden kann
     *
     * @param Vehicle $vehicle
     * @return boolean
     */
    public function isVehicleAvailable(Vehicle $vehicle) {
        foreach ($this->rentalActions as $rentalAction) {
        	if ($rentalAction->getVehicle() !== $vehicle) {
        		continue;
        	}
        	if ($rentalAction->isReturned()) {
        		continue;
        	}
        	return false;
        }
        return true;
    }

    /**
     * Hilfsmethode f�r debugging
     *
     * @param string $message
     */
    protected function debug($message) {
        $this->debugger->debug($message);
    }
}
?>