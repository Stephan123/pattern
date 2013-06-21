<?php

class ABC
{
    protected $wertA = null;

    public function getWertA()
    {
        return $this->wertA;
    }

    public function setWertA($wertA)
    {
        $this->wertA = $wertA;
    }
}

class DEF
{
    protected $wertA = null;

    public function getWertA()
    {
        return $this->wertA;
    }

    public function setWertA($wertA)
    {
        $this->wertA = $wertA;
    }
}

//*******************************

abstract class factoryAbstract
{
    protected $className = null;
    protected $wertA = null;

    public function __construct($className)
    {
        $this->className = $className;
    }

    abstract public function erzeugeObj();

    abstract public function setWertA($wertA);

}

class factory extends factoryAbstract
{
    public function erzeugeObj()
    {
        $newObj = new $this->className();
        $newObj->setWertA($this->wertA);

        return $newObj;
    }

    public function setWertA($wertA)
    {
        $this->wertA = $wertA;
    }
}

//******************************

$myObj = new factory('ABC');
$myObj->setWertA(55);
$ABC = $myObj->erzeugeObj();
$wertA = $ABC->getWertA();

$myObj = new factory('DEF');
$myObj->setWertA(66);
$DEF = $myObj->erzeugeObj();
$wertA = $DEF->getWertA();
