<?php

// ***** konkrete Komponente *****
interface autoI
{
    public function starteAuto();
    public function fahreVorwaerts($kilometer);
    public function stoppeAuto();
}

class auto implements autoI
{
    private $autozubehoer = array();

    private $auto = false;
    private $kilometer = 0;
    private $kosten = 150;

    public function __construct(autoZubehoerI $autozubehoer)
    {
        $this->autozubehoer[] = $autozubehoer;
    }

    public function starteAuto()
    {
        $this->auto = true;

        $this;
    }

    public function fahreVorwaerts($kilometer)
    {
        $this->$kilometer += $kilometer;

        return $this;
    }

    public function stoppeAuto()
    {
        $this->auto = false;

        return $this;
    }

    public function setKosten()
    {
        foreach($this->autozubehoer as $zubehoer){
            $this->kosten += $zubehoer->getKosten();
        }

        return $this;
    }

    public function getKosten()
    {
        return $this->kosten;
    }
}

// ***** Dekorierer *****
interface autoZubehoerI
{
    public function getKosten();
}

class autoBreitreifen implements autoZubehoerI
{
    private $mehrkosten = 75;

    public function getKosten()
    {
        return $this->mehrkosten;
    }
}

// ***** Ablauf *****

$autoBreitreifen = new autoBreitreifen();
$auto = new auto($autoBreitreifen);
$kosten = $auto->setKosten()->getKosten();
echo $kosten;

