<?php
/**
 * Beschreibung
 *
 *
 * 
 * 
 * @author stephan.krauss
 * @since 17.06.13 08:39
 */

include_once('observerPattern.php');

$train = new Train(60);

$john = new PassengerJohn();
$train->addObserver($john);

$mary = new PassengerMary();
$train->addObserver($mary);

$train->setMinutesToArrival(55);
//John is glad that he arrives in 55mins
//Mary can sleep 55mins till she arrives

$train->setMinutesToArrival(45);
//John is glad that he arrives in 45mins
//Mary can sleep 45mins till she arrives

$train->removeObserver($mary);
$train->setMinutesToArrival(35);
//John is glad that he arrives in 35mins
