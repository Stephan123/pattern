<?php
namespace de\phpdesignpatterns\rental;

class RentalAction {

    /**
     * Das ausgeliehene Fahrzeug
     *
     * @var Vehicle
     */
    protected $vehicle;

    /**
     * Der Kunde, der das Fahrzeug geliehen hat
     *
     * @var Customer
     */
    protected $customer;

    /**
     * Datum des Mietens
     *
     * @var string
     */
    protected $rentDate;

    /**
     * Datum des Zur�ckgebens
     *
     * @var string
     */
    protected $returnDate = null;

    /**
     * Neuen Ausleihvorgang erzeugen
     *
     * @param Vehicle  $vehicle
     * @param Customer $customer
     * @param string   $date
     */
    public function __construct(Vehicle $vehicle, Customer $customer, $date = null) {
        if ($date === null) {
        	$date = date('Y-m-d H:i:s');
        }
        $this->vehicle  = $vehicle;
        $this->customer = $customer;
        $this->rentDate = $date;
    }

    /**
     * Gibt das entsprechende Fahrzeug zur�ck
     *
     * @return Vehicle
     */
    public function getVehicle() {
        return $this->vehicle;
    }

    /**
     * Gibt den entsprechenden Kunden zur�ck
     *
     * @return Customer
     */
    public function getCustomer() {
        return $this->customer;
    }

    /**
     * Gibt den Start des Mietvorganges zur�ck
     *
     * @return string
     */
    public function getRentDate() {
        return $this->rentDate;
    }

    /**
     * Gibt das Ende des Mietvorganges zur�ck
     *
     * @return string
     */
    public function getReturnDate() {
        return $this->returnDate;
    }

    /**
     * Fahrzeug als zur�ckgebracht markieren
     *
     * @param string   $date
     */
    public function markVehicleReturned($date = null) {
        if ($date === null) {
        	$date = date('Y-m-d H:i:s');
        }
        $this->returnDate = $date;
    }

    /**
     * �berpr�ft, ob das Fahrzeug zur�ck gegeben wurde
     *
     * @return boolean
     */
    public function isReturned() {
        return $this->returnDate !== null;
    }
}
?>