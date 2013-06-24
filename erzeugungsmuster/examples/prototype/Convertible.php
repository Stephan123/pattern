<?php
namespace de\phpdesignpatterns\vehicles;

require_once 'Car.php';
/**
 * Klasse f�r ein Cabrio
 *
 * Erbt alle Methoden und Eigenschaften von einem Auto.
 */
class Convertible extends Car {
    /**
     * Gibt an, ob das Dach gerade offen ist
     *
     * @var boolean
     */
    public $roofOpen = false;

    /**
     * �ffnet das Dach des Cabrios
     */
    public function openRoof() {
        $this->roofOpen = true;
    }

    /**
     * Schlie�t das Dach des Cabrios
     */
    public function closeRoof() {
        $this->roofOpen = false;
    }

    /**
     * Motor abstellen.
     *
     * �berschreibt die Implementierung aus der Klasse 'Car'.
     */
    public function stopEngine() {
        // Falls das Dach offen ist, dieses zuerst schlie�en
        if ($this->roofOpen) {
        	$this->closeRoof();
        }
        // Den Motor mit der Implementierung
        // in der Klasse Car stoppen.
        parent::stopEngine();
    }
}
?>