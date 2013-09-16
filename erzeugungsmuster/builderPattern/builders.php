<?php 
 /**
 * Beschreibung der Klasse
 *
 * + Ausführliche Beschreibung der Klasse
 * + Ausführliche Beschreibung der Klasse
 * + Ausführliche Beschreibung der Klasse
 * 
 * @author Stephan.Krauss
 * @date 16.09.13
 * @file builders.php
 * @package front | admin | tools | plugins | schnittstelle | tabelle
 * @subpackage controller | model | interface | shadow | data
 */
 
abstract class AbstractCarBuilder
{
    protected $car;

    public function createcar()
    {
        $this->car = new Car();
    }

    public abstract function buildEngine();
    public abstract function buildRims();
    public abstract function buildTires();
    public abstract function buildTurbocharger();

    public function getCar()
    {
        return $this->car;
    }
}
