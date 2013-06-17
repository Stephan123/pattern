<?php
/**
 * Beschreibung
 *
 *
 * 
 * 
 * @author stephan.krauss
 * @since 17.06.13 08:38
 */



interface Subject
{
    public function addObserver(Observer $Observer);
    public function removeObserver(Observer $Observer);
    public function notify();
}

class Train implements Subject
{
    protected $_minutesToArrival;
    protected $_observers = array();

    public function __construct($mins)
    {
        $this->setMinutesToArrival($mins);
    }

    public function addObserver(Observer $observer)
    {
        $this->_observers[] = $observer;
    }

    public function removeObserver(Observer $observer)
    {
        for ($i = 0; $i < count($this->_observers); $i++)
        {
            if ($this->_observers[$i] === $observer)
            {
                unset($this->_observers[$i]);
                break;
            }
        }
    }

    public function notify()
    {
        foreach($this->_observers as $o)
            $o->update($this);
    }

    public function setMinutesToArrival($mins)
    {
        $this->_minutesToArrival = $mins;
        $this->notify();
    }

    public function getMinutesToArrival()
    {
        return $this->_minutesToArrival;
    }
}

//----------------------------------------------

interface Observer
{
    public function update(Subject $Subject);
}

class PassengerJohn implements Observer
{
    public function update(Subject $train)
    {
        echo "John is glad that he arrives in ".$train->getMinutesToArrival()."mins<br />";
    }
}

class PassengerMary implements Observer
{
    public function update(Subject $train)
    {
        echo "Mary can sleep ".$train->getMinutesToArrival()."mins till she arrives<br />";
    }
}
