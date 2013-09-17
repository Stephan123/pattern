<?php
require_once("builders.php");

class director
{
    private $builder;

    private function setBuilder($builder)
    {
        $this->builder = $builder;
    }

    public function getCar($description)
    {
        if($description == 'student')
            $this->setBuilder(new StudentCarBuilder());
        elseif($description == 'family')
            $this->setBuilder(new FamilyCarBuilder());
        elseif($description == 'field')
            $this->setBuilder(new FieldCarBuilder());

        $this->builder->createCar();
        $this->builder->buildEngine();
        $this->builder->buildRims();
        $this->builder->Tires();
        $this->builder->buildTurbocharger();

        return $this->builder->getCar();
    }
}