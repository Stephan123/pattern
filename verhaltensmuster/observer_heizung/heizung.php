<?php 
include_once('geraete.php');
 
class heizung implements geraete
{
    private $aktuelleTemperatur = null;

    private $conditionHeizungAn = -10;
    private $conditionHeizungAus = 20;

    private $flagHeizungAn = false;

    public function temperaturAenderung($aktuelleTemperatur)
    {
        $aktuelleTemperatur = (int) $aktuelleTemperatur;
        $this->aktuelleTemperatur = $aktuelleTemperatur;

        $this->kontrolleTemperatur();
        $this->kontrolleHeizung();

        return;
    }

    private function kontrolleTemperatur()
    {
        if($this->aktuelleTemperatur < $this->conditionHeizungAn)
            $this->flagHeizungAn = true;

        if($this->aktuelleTemperatur > $this->conditionHeizungAus)
            $this->flagHeizungAn = false;
    }

    private function kontrolleHeizung()
    {
        if($this->flagHeizungAn)
            echo "Heizung an <br>";
        else
            echo "Heizung aus <br>";
    }

}
