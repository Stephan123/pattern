<?php
require_once 'HtmlTableFactory.php';

use de\phpdesignpatterns\tables\html\HtmlTableFactory;

$factory = new HtmlTableFactory();

$table = $factory->createTable();
$header = $factory->createHeader();
$header->addCell($factory->createCell('Spalte 1'));
$header->addCell($factory->createCell('Spalte 2'));
$table->setHeader($header);

$row = $factory->createRow();
$row->addCell($factory->createCell('Zeile 1 / Spalte 1'));
$row->addCell($factory->createCell('Zeile 1 / Spalte 2'));
$table->addRow($row);

$table->display();
?>