<?php
namespace de\phpdesignpatterns\tables;

interface TableFactory {
    public function createTable();
    public function createRow();
    public function createHeader();
    public function createCell();
}


abstract class Table {
    protected $header = null;
    protected $rows = array();

    public function setHeader(Header $header) {
        $this->header = $header;
    }

    public function addRow(Row $row) {
        $this->rows[] = $row;
    }

    abstract public function display();
}

abstract class Row {
    protected $cell;
    protected $cellData = array();

    public function __construct(Cell $cell) {
        $this->cell = $cell;
    }

    public function addCell($cell) {
        $this->cellData[] = $cell;
    }

    abstract public function display();
}

abstract class Header extends Row {
}

abstract class Cell {
    abstract public function display($data);
}
?>