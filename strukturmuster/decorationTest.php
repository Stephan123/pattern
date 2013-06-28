<?php


class torte{

    private $kerzen = true;
    private $zuckerguss = true;

    /**
     * @return boolean
     */
    public function getKerzen()
    {
        return $this->kerzen;
    }

    /**
     * @return boolean
     */
    public function getZuckerguss()
    {
        return $this->zuckerguss;
    }
}


class Konditor
{
    protected $kerzen;
    protected $zuckerguss;
    protected $torte;

    public function __constructor(torte $torte)
    {
        $this->torte = $torte;
        $this->resetKerzen();
        $this->resetZuckerguss();
    }

    private function resetKerzen()
    {
        $this->kerzen = $this->torte->getKerzen();
    }

    private function resetZuckerguss()
    {
        $this->zuckerguss = $this->torte->getZuckerguss();
    }
}

class torteSuper extends Konditor
{
    private $konditor;

    public function __construct(Konditor $konditor)
    {
        $this->konditor = $konditor;
    }

    function setZusatzbelag() {
        $this->$konditor->title = "!" . $this->btd->title . "!";
    }
}

