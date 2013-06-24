<?php
require_once 'HtmlTableFactory.php';
require_once 'VehicleList.php';

use de\phpdesignpatterns\tables\util\VehicleList;
use de\phpdesignpatterns\tables\html\HtmlTableFactory;

$data = array(
           array('BMW', 'blau'),
           array('Peugeot', 'rot'),
           array('VW', 'schwarz'),
        );

$list = new VehicleList(new HtmlTableFactory());

$list->showTable($data);
?>