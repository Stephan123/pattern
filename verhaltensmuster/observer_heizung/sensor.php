<?php 

include_once('heizung.php');
include_once('kuehlung.php');
 
class sensor
{
    private $listeDerGerate = array();


    public function geraetAnmelden(geraete $geraet)
    {
        $this->listeDerGerate[] = $geraet;
    }

    public function geraetAbmelden($geraeteName)
    {
        if(array_key_exists($geraeteName, $this->listeDerGerate))
            unset($this->listeDerGerate[$geraeteName]);
    }

    public function setTemperatur($aktuelleTemperatur)
    {
        $aktuelleTemperatur = (int) $aktuelleTemperatur;

        foreach($this->listeDerGerate as $geraet){
            $geraet->temperaturAenderung($aktuelleTemperatur);
        }
    }
}

$heizungObj = new heizung();
$kuehlungObj = new kuehlung();

$sensorObj = new sensor();

$sensorObj->geraetAnmelden($heizungObj);
$sensorObj->geraetAnmelden($kuehlungObj);

$sensorObj->setTemperatur(60);