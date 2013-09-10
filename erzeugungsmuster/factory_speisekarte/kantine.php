<?php

include_once('frueh.php');
include_once('mittag.php');
include_once('abend.php');
include_once('snack.php');

include_once('speisekarte.php');
 
class kantine implements speisekarte
{
    private $class = null;
    private $className = null;

    public function __construct($className)
    {
        $this->className = $className;

        $this->buildClass();
    }

    private function buildClass()
    {
        switch($this->className){
            case 'frueh':
                $this->class = new frueh();
                break;
            case 'mittag':
                $this->class = new mittag();
                break;
            case 'abend':
                $this->class = new abend();
                break;
            case 'snack':
                $this->class = new snack();
                break;
        }
    }

    public function getMahlzeit(){
        return $this->class;
    }
}
