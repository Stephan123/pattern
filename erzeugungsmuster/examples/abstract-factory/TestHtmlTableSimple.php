<?php
require_once 'HtmlTableFactory.php';

use de\phpdesignpatterns\tables\html\HtmlTable;
use de\phpdesignpatterns\tables\html\HtmlHeader;
use de\phpdesignpatterns\tables\html\HtmlRow;
use de\phpdesignpatterns\tables\html\HtmlCell;

$table = new HtmlTable();
$header = new HtmlHeader();
$header->addCell(new HtmlCell('Spalte 1'));
$header->addCell(new HtmlCell('Spalte 2'));
$table->setHeader($header);

$row = new HtmlRow();
$row->addCell(new HtmlCell('Zeile 1 / Spalte 1'));
$row->addCell(new HtmlCell('Zeile 1 / Spalte 2'));
$table->addRow($row);

$table->display();
?>