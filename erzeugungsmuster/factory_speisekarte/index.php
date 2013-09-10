<?php

include_once('kantine.php');

// Factory
$kantine = new kantine('mittag');
$mahlzeit = $kantine->getMahlzeit();

// Operationen gegen Interface
$mahlzeit->getMahlzeit();