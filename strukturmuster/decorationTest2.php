<?php

// *** Interface ***

interface komponenteI
{
    public function setFoo($foo);
    public function setBar($bar);
    public function steuerungInfo();
}

// *** konkrete Komponente ***

 class komponente implements komponenteI
 {
     public $foo = false;
     public $bar = false;

     public function setFoo($foo)
     {
         $this->foo = $foo;

         $this;
     }

     public function setBar($bar)
     {
         $this->bar = $bar;

         $this;
     }

     public function steuerungInfo()
     {
         return $this->foo." : ".$this->bar;
     }
 }

// *** Dekorierer ***
abstract class dekorierer implements komponenteI
{
    public $komponente = false;

    public function __construct(komponenteI $komponente)
    {
        $this->komponente = $komponente;
    }

    public function setFoo($foo)
    {
        $this->komponente->setFoo($foo);

        $this;
    }

    public function setBar($bar)
    {
        $this->komponente->setBar($bar);

        $this;
    }

    public function steuerungInfo()
    {
        return $this->komponente->foo." : ".$this->komponente->bar;
    }
}


// *** Dekoration 1 ***
class decoration1 extends dekorierer
{
    public function setFoo($foo)
    {
        parent::setFoo($foo);

        return $this;
    }

    public function setBar($bar)
    {
        parent::setBar($bar);

        return $this;
    }


    public function steuerungInfo()
    {
        $wert = parent::steuerungInfo();
        return $wert;
    }
}


// *** Dekoration 2 ***

// *** Test ***
$komponente = new komponente();
$test1 = new decoration1(new komponente());

$information = $test1->setBar('aaa')->setFoo('111')->steuerungInfo();
echo $information;