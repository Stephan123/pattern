<?php
header("Content-Type: text/html; charset=utf-8");

//***** Interface ****
interface bankI
{
    public function getKredit($money);
    public function setLimit($money);
    public function getLimit();
}

//***** konkrete Klasse *****
class bank implements bankI
{
    public $maxMoney = 0;

    public function __construct(){

    }

    public function setLimit($money)
    {
        $this->maxMoney = $money;
    }

    public function getKredit($money)
    {
        return $money;
    }

    public function getLimit()
    {
        return $this->maxMoney;
    }
}

//***** identischen Stellvertreter *****
class bankAngestellter implements bankI
{
    public $bank;

    public function __construct($bank)
    {
        $this->bank = $bank;
    }

    public function setLimit($money)
    {
        $this->bank->setLimit($money);
    }

    public function getKredit($money)
    {
        return $this->bank->getKredit($money);
    }

    public function getLimit()
    {
        return $this->bank->maxMoney;
    }

}

//***** angepasste Stellvertreter *****
class bankAngestellterAngepasst extends bankAngestellter
{
    public function getKredit($money)
    {
        if($this->bank->maxMoney < $money){
            echo "Kreditrahmen überzogen<br>";

            return 0;
        }
        else
            return parent::getKredit($money);
    }
}

$bank = new bank();

// $bank->setLimit(500);
// echo $bank->getKredit(400);

//$bankAngestellter = new bankAngestellter($bank);
//$bankAngestellter->setLimit(500);
//$limit = $bankAngestellter->getLimit();
//echo "max. Limit ".$limit."<br>";
//echo $bankAngestellter->getKredit(600);

$bankAngestellterAngepasst = new bankAngestellterAngepasst($bank);
$bankAngestellterAngepasst->setLimit(500);
$limit = $bankAngestellterAngepasst->getLimit();
echo "mögliches Limit: ".$limit."<br>";
$kredit = $bankAngestellterAngepasst->getKredit(600);
echo "Kredit: ".$kredit;