<?php 
interface motorInterface
{
    public function getMotorName();
}
 
class motor1 implements motorInterface
{
    private $motorName = "Motor 1";

    public function getMotorName()
    {
        return $this->motorName."<br>";
    }
}

class motor2 implements motorInterface
{
    private $motorName = "Motor 2";

    public function getMotorName()
    {
        return $this->motorName."<br>";
    }
}

class motor3 implements motorInterface
{
    private $motorName = "Motor 3";

    public function getMotorName()
    {
        return $this->motorName."<br>";
    }
}

class motor4 implements motorInterface
{
    private $motorName = "Motor 4";

    public function getMotorName()
    {
        return $this->motorName.'<br>';
    }
}