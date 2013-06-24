<?php
namespace de\phpdesignpatterns\vehicles;

use de\phpdesignpatterns\vehicles\addons\AirCondition;

require_once 'Vehicle.php';
require_once 'AirCondition.php';

/**
 * Repr�sentation eines beliebigen Autos,
 * das das Interface 'Vehicle' erf�llt.
 */
class Car implements Vehicle {
    /**
     * Hersteller des Autos
     *
     * @var string
     */
    protected $manufacturer;

    /**
     * Farbe des Autos
     *
     * @var string
     */
    protected $color;

    /**
     * Kilometerstand des Autos
     *
     * @var integer
     */
    protected $milage;

    /**
     * Gibt an, ob der Motor schon gestartet wurde
     *
     * @var boolean
     */
    protected $engineStarted = false;

    /**
     * Klimaanlage
     *
     * @var boolean
     */
    protected $airCondition;

    /**
     * Grafiken, die auf dem Auto angebracht wurden
     *
     * @var string
     */
    protected $graphics = null;


    /**
     * Konstruktor f�r ein neues Auto
     *
     * @param string $manufacturer
     * @param string $color
     * @param integer $milage
     */
    public function __construct($manufacturer, $color, $milage = 0) {
        $this->manufacturer = $manufacturer;
        $this->color = $color;
        $this->milage = $milage;
    }

    /**
     * Destruktor des Autos
     * Falls der Motor noch l�uft wird dieser ausgeschalten.
     */
    public function __destruct() {
        if ($this->engineStarted) {
        	$this->stopEngine();
        }
    }

    /**
     * Motor anlassen
     */
    public function startEngine() {
        $this->engineStarted = true;
    }

    /**
     * Einige Kilometer fahren
     *
     * @param integer $miles
     */
    public function moveForward($miles) {
        // Wenn der Motor nicht l�uft, kann nicht gefahren werden.
        if ($this->engineStarted !== true) {
        	return false;
        }
        // Kilometerstand erh�hen
        $this->milage = $this->milage + $miles;
        return true;
    }

    /**
     * Motor wieder stoppen
     */
    public function stopEngine() {
        $this->engineStarted = false;
    }

    /**
     * Kilometerstand zur�ck geben
     *
     * @return integer
     */
    public function getMilage() {
        return $this->milage;
    }

    /**
     * Tagessatz ermitteln
     *
     * @param integer $days
     * @return float
     */
    public function getDailyRate($days = 1) {
        if ($days >= 7) {
        	return 65.90;
        }
        return 75.50;
    }

    /**
     * Hersteller zur�ckgeben
     *
     * @return string
     */
    public function getManufacturer() {
        return $this->manufacturer;
    }

    /**
     * Farbe zur�ckgeben
     *
     * @return string
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * Setzt die Grafiken, die auf dem Auto angebracht wurden
     *
     * @param string
     */
    public function setGraphics($graphics) {
        $this->graphics = $graphics;
    }

    /**
     * Setzt die Information, ob eine Klimaanlage verf�gbar ist
     *
     * @param AirCondition
     */
    public function setAirCondition(AirCondition $airCondition) {
        $this->airCondition = $airCondition;
    }

    /**
     * Grafiken zur�ckgeben
     *
     * @return string
     */
    public function getGraphics() {
        return $this->graphics;
    }

    /**
     * Gibt zur�ck, ob das Auto eine Klimaanlage hat
     *
     * @return AirCondition
     */
    public function getAirCondition() {
        return $this->airCondition;
    }

    public function __clone() {
        $this->setAirCondition(clone $this->getAirCondition());
    }
}
?>