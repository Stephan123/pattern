<?php
namespace de\phpdesignpatterns\tables;

interface TableFactory {
    public function createTable();
    public function createRow();
    public function createHeader();
    public function createCell($content);
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
    protected $cells = array();

    public function addCell(Cell $cell) {
        $this->cells[] = $cell;
    }

    abstract public function display();
}

abstract class Header extends Row {
}

abstract class Cell {
    protected $content = null;

    public function __construct($content) {
        $this->content = $content;
    }
    abstract public function display();
}
?>