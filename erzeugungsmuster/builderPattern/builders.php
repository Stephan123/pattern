<?php 
 require_once('classes.php');
 
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

class FamilyCarBuilder extends AbstractCarBuilder
{
    public function buildEngine()
    {
        $this->car->setEngine(new Engine(1600,"Diesel"));
    }

    public function buildRims()
    {
        $this->car->setRims(new Rim("steel","michel"));
    }

    public function buildTires()
    {
        $this->car->setTires(array (new Tire(165,"Dunlop"), new Tire(165,"Gummimeyer")));
    }

    public function buildTurbocharger()
    {
        $this->car->setTurbo(new TurboCharger(0,100,"gogoya"));
    }
}

class FieldCarBuilder extends AbstractCarBuilder
{
    public function buildEngine()
    {
        $this->car->setEngine(new Engine(2500,"Benzin"));
    }

    public function buildRims()
    {
        $this->car->setRims(new Rim("steel","maximum"));
    }

    public function buildTires()
    {
        $this->car->setTires(array (new Tire(200,"Firestone"), new Tire(200,"Dunlop")));
    }

    public function buildTurbocharger()
    {
        $this->car->setTurbo(new TurboCharger(0,200,"superb Turbo"));
    }
}



class StudentCarBuilder extends AbstractCarBuilder
{
    public function buildEngine()
    {
        $this->car->setEngine(new Engine(500,"Benzin"));
    }

    public function buildRims()
    {
        $this->car->setRims(new Rim("alu","normal"));
    }

    public function buildTires()
    {
        $this->car->setTires(array (new Tire(140,"Gummimayer"), new Tire(140,"gebraucht")));
    }

    public function buildTurbocharger()
    {
        $this->car->setTurbo(new TurboCharger(0,50,"slow turbo"));
    }
}
