<?php 
interface bremseInterface
{
    public function getBremseName();
}

class bremse1 implements bremseInterface
{
    private $bremseName = "Bremse 1";

    public function getBremseName()
    {
        return $this->bremseName."<br>";
    }
}

class bremse2 implements bremseInterface
{
    private $bremseName = "Bremse 2";

    public function getBremseName()
    {
        return $this->bremseName."<br>";
    }
}

class bremse3 implements bremseInterface
{
    private $bremseName = "bremse 3";

    public function getBremseName()
    {
        return $this->bremseName."<br>";
    }
}