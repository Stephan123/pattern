<?php
namespace de\phpdesignpatterns\tables\html;

use de\phpdesignpatterns\tables\TableFactory;
use de\phpdesignpatterns\tables\Table;
use de\phpdesignpatterns\tables\Row;
use de\phpdesignpatterns\tables\Header;
use de\phpdesignpatterns\tables\Cell;

require_once 'TableFactory.php';

class HtmlTableFactory implements TableFactory {
    public function createTable() {
        $table = new HtmlTable();
        return $table;
    }
    public function createRow() {
        $row = new HtmlRow();
        return $row;
    }
    public function createHeader() {
        $header = new HtmlHeader();
        return $header;
    }
    public function createCell($content) {
        $cell = new HtmlCell($content);
        return $cell;
    }
}

class HtmlTable extends Table {
    public function display() {
        print "<table border=\"1\">\n";
        $this->header->display();
        foreach ($this->rows as $row) {
            $row->display();
        }
        print "</table>";
    }
}

class HtmlRow extends Row {
    public function display() {
        print "  <tr>\n";
        foreach ($this->cells as $cell) {
            $cell->display();
        }
        print "  </tr>\n";
    }
}

class HtmlHeader extends Header {
    public function display() {
        print "  <tr style=\"font-weight: bold;\">\n";
        foreach ($this->cells as $cell) {
            $cell->display();
        }
        print "  </tr>\n";
    }
}

class HtmlCell extends Cell {
    public function display() {
        print "    <td>{$this->content}</td>\n";
    }
}
?>