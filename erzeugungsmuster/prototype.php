<?php
/**
 * Class vorlage
 *
 * Meine Vorlage zur Schaffung von Sonderformen
 */
class prototype
{
    protected $myFoo = null;
    protected $myBar = null;
    protected $classname = null;
    protected static $instance = null;

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new prototype();
        }

        return self::$instance;
    }

    /**
     * @param null $myBar
     */
    public function setMyBar($myBar)
    {
        $this->myBar = $myBar;
    }

    /**
     * @return null
     */
    public function getMyBar()
    {
        return $this->myBar;
    }

    /**
     * @param null $myFoo
     */
    public function setMyFoo($myFoo)
    {
        $this->myFoo = $myFoo;
    }

    /**
     * @return null
     */
    public function getMyFoo()
    {
        return $this->myFoo;
    }
}

// *****************************************************

/**
 * Class specialversions
 *
 * speichern der möglichen modifizierten Versionen der Grundform
 */
class specialversions
{
    protected $specialversions = array();

    public function addSpecialVersion($name, prototype $specialVersion)
    {
        $this->specialversions[$name] = $specialVersion;
    }

    public function getSpecialVersion($name)
    {
        if(!isset($this->specialversions[$name]))
            return false;
        else
            return clone $this->specialversions[$name];
    }
}

// ****************************************
// Erstellen der Sonderformen und abspeichern dieser Sonderformen
$vorlageFoo = prototype::getInstance();
$vorlageFoo->setMyFoo('aaa');

$vorlageBar = prototype::getInstance();
$vorlageFoo->setMyBar('bbb');

$prototypesStore = new specialversions();
$prototypesStore->addSpecialVersion('foo', $vorlageFoo);
$prototypesStore->addSpecialVersion('bar', $vorlageBar);

// ***************************************
// vervielfältigen dieser Prototypen
$foo1 = $prototypesStore->getSpecialVersion('foo');
$foo2 = $prototypesStore->getSpecialVersion('foo');

$bar1 = $prototypesStore->getSpecialVersion('bar');
$bar2 = $prototypesStore->getSpecialVersion('bar');


// ********************************
// Testreihe geklonte Objekte des Prototypes

$foo1->setMyFoo('my foo 1');
echo $foo1->getMyFoo();

echo '<hr>';

$foo2->setMyFoo('my foo 2');
echo $foo2->getMyFoo();

echo '<hr>';

echo $foo1->getMyFoo();



