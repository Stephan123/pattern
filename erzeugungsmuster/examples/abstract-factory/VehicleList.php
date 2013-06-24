<?php
namespace de\phpdesignpatterns\tables\util;

use de\phpdesignpatterns\tables\TableFactory;

class VehicleList {

    /**
     * Table factory
     *
     * @var TableFectory
     */
    protected $tableFactory = null;

    public function __construct(TableFactory $tableFactory) {
        $this->tableFactory = $tableFactory;
    }

    public function showTable($data) {

        $table = $this->tableFactory->createTable();

        // Kopfzeile erstellen
        $header = $this->tableFactory->createHeader();
        $header->addCell($this->tableFactory->createCell('Hersteller'));
        $header->addCell($this->tableFactory->createCell('Farbe'));

        $table->setHeader($header);

        foreach ($data as $line) {
            $row = $this->tableFactory->createRow();
            $table->addRow($row);
            foreach ($line as $field) {
                $cell = $this->tableFactory->createCell($field);
                $row->addCell($cell);
            }
        }
        var_dump($table);
        $table->display();
    }
}
?>