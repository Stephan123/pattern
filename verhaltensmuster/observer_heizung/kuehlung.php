<?php 
include_once('geraete.php');
 
class kuehlung implements geraete
{
    private $aktuelleTemperatur = null;

    private $conditionKuehlungAn = 40;
    private $conditionKuehlungAus = 25;

    private $flagKuehlungAn = false;

    public function temperaturAenderung($aktuelleTemperatur)
    {
        $aktuelleTemperatur = (int) $aktuelleTemperatur;
        $this->aktuelleTemperatur = $aktuelleTemperatur;

        $this->kontrolleTemperatur();
        $this->kontrolleKuehlung();

        return;
    }

    private function kontrolleTemperatur()
    {
        if($this->aktuelleTemperatur > $this->conditionKuehlungAn)
            $this->flagKuehlungAn = true;

        if($this->aktuelleTemperatur < $this->conditionKuehlungAus)
            $this->flagKuehlungAn = false;
    }

    private function kontrolleKuehlung()
    {
        if($this->flagKuehlungAn)
            echo "Kühlung an <br>";
        else
            echo "Kühlung aus <br>";
    }

}
