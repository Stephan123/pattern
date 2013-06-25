<?php
require_once 'Vehicle.php';

/**
 * Repräsentation eines beliebigen Autos,
 * das das Interface 'Vehicle' erfüllt.
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
     * Höchstgeschwindigkeit
     *
     * @var int
     */
    protected $maxSpeed;

    /**
     * Gibt an, ob der Motor schon gestartet wurde
     *
     * @var boolean
     */
    protected $engineStarted = false;

    /**
     * Konstruktor für ein neues Auto
     *
     * @param string $manufacturer
     * @param string $color
     * @param integer $milage
     */
    public function __construct($manufacturer, $color, $milage = 0, $maxSpeed = 100) {
        $this->manufacturer = $manufacturer;
        $this->color = $color;
        $this->milage = $milage;
        $this->maxSpeed = $maxSpeed;
    }

    /**
     * Destruktor des Autos
     * Falls der Motor noch läuft wird dieser ausgeschalten.
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
        // Wenn der Motor nicht läuft, kann nicht gefahren werden.
        if ($this->engineStarted !== true) {
        	return false;
        }
        // Kilometerstand erhöhen
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
     * Kilometerstand zurück geben
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
     * Hersteller zurückgeben
     *
     * @return string
     */
    public function getManufacturer() {
        return $this->manufacturer;
    }

    /**
     * Farbe zurückgeben
     *
     * @return string
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * Gibt die Höchstgeschwindigkeit zurück
     *
     * @return integer
     */
    public function getMaxSpeed() {
        return $this->maxSpeed;
    }
}
?>