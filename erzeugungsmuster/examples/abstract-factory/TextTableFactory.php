<?php
namespace de\phpdesignpatterns\tables\ascii;

use de\phpdesignpatterns\tables\TableFactory;
use de\phpdesignpatterns\tables\Table;
use de\phpdesignpatterns\tables\Row;
use de\phpdesignpatterns\tables\Header;
use de\phpdesignpatterns\tables\Cell;

require_once 'TableFactory.php';

class TextTableFactory implements TableFactory {
    public function createTable() {
        $table = new TextTable();
        return $table;
    }
    public function createRow() {
        $row = new TextRow();
        return $row;
    }
    public function createHeader() {
        $header = new TextHeader();
        return $header;
    }
    public function createCell($content) {
        $cell = new TextCell($content);
        return $cell;
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
        foreach ($this->cells as $cell) {
            $cell->display();
        }
        print "|\n";
        print "+" . str_repeat("-", (count($this->cells) * 21)-1) . "+\n";
    }
}

class TextHeader extends Header {
    public function display() {
        print "+" . str_repeat("-", (count($this->cells) * 21)-1) . "+\n";
        foreach ($this->cells as $cell) {
            $cell->display();
        }
        print "|\n";
        print "+" . str_repeat("-", (count($this->cells) * 21)-1) . "+\n";
    }
}


class TextCell extends Cell {
    public function display() {
        print '|' . str_pad($this->content, 20);
    }
}
?>