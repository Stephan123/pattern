<?php
namespace de\phpdesignpatterns\tables\ascii;

use de\phpdesignpatterns\tables\TableFactory;
use de\phpdesignpatterns\tables\Table;
use de\phpdesignpatterns\tables\Row;
use de\phpdesignpatterns\tables\Header;
use de\phpdesignpatterns\tables\Cell;

require_once 'TableFactory.php';

class TextTableFactory implements TableFactory {
    private $cell = null;

    public function createTable() {
        $table = new TextTable();
        return $table;
    }
    public function createRow() {
        $row = new TextRow($this->createCell());
        return $row;
    }
    public function createHeader() {
        $header = new TextHeader($this->createCell());
        return $header;
    }
    public function createCell() {
        if ($this->cell == null) {
            $this->cell = new TextCell();
        }
        return $this->cell;
    }
}

class TextTable extends Table {
    public function display() {
        $this->header->display();
        foreach ($this->rows as $row) {
            $row->display();
        }
    }
}

class TextRow extends Row {
    public function display() {
        foreach ($this->cellData as $data) {
            $this->cell->display($data);
        }
        print "|\n";
        print "+" . str_repeat("-", (count($this->cellData) * 21)-1) . "+\n";
    }
}

class TextHeader extends Header {
    public function display() {
        print "+" . str_repeat("-", (count($this->cellData) * 21)-1) . "+\n";
        foreach ($this->cellData as $data) {
            $this->cell->display($data);
        }
        print "|\n";
        print "+" . str_repeat("-", (count($this->cellData) * 21)-1) . "+\n";
    }
}


class TextCell extends Cell {
    public function display($data) {
        print '|' . str_pad($data, 20);
    }
}
?>