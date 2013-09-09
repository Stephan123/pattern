<?php 
include_once('motor.php');
include_once('bremse.php');
include_once('audio.php');

interface autoInterface {
    public function setMotor(motorInterface $motor);
    public function setBremse(bremseInterface $bremse);
    public function setAudio(audioInterface $audio);
}

 
class auto extends autoBasis implements autoInterface
{
    protected $motor = null;
    protected $bremse = null;
    protected $audio = null;

    public function checkAuto()
    {
        $this->checkMotor();

        return $this;
    }

    private function checkMotor()
    {
        echo $this->motor->getMotorName();
        echo $this->bremse->getBremseName();
        echo $this->audio->getAudioName();
    }
}

class autoBasis{
    public function setMotor(motorInterface $motor)
    {
        $this->motor = $motor;

        return $this;
    }

    public function setBremse(bremseInterface $bremse)
    {
       $this->bremse = $bremse;

       return $this;
    }

    public function setAudio(audioInterface $audio)
    {
        $this->audio = $audio;

        return $this;
    }
}

$motor = new motor2();
$bremse = new bremse3();
$audio = new audio1();

$auto = new auto();
$auto->setMotor($motor)->setBremse($bremse)->setAudio($audio)->checkAuto();
