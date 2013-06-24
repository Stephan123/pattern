<?php
require_once 'TextTableFactory.php';
require_once 'VehicleList.php';

use de\phpdesignpatterns\tables\util\VehicleList;
use de\phpdesignpatterns\tables\ascii\TextTableFactory;

$data = array(
           array('BMW', 'blau'),
           array('Peugeot', 'rot'),
           array('VW', 'schwarz'),
        );

$list = new VehicleList(new TextTableFactory());

$list->showTable($data);
?>