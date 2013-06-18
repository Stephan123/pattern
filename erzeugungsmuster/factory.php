<?php
/**
 * Beschreibung
 *
 *
 * 
 * 
 * @author Stephan.Krauss
 * @since 18.06.13 08:38
 */

interface dbObject_interface {

	public function dbSetStatement($strSQLStatement);
	public function dbFetchArray();
	public function dbFetchObject();
	public function dbFetchRow();

}

class dbObject_mysql implements dbObject_interface {

	public function dbSetStatement($strSQLStatement) {
		// code
	}

	public function dbFetchArray() {
		// code
	}

	public function dbFetchObject() {
		// code
	}
	public function dbFetchRow() {
		// code
	}
}

class dbObject_postgresql implements dbObject_interface {

    public function dbSetStatement($strSQLStatement) {
		// code
    }

    public function dbFetchArray() {
		// code
	}

    public function dbFetchObject() {
		// code
	}

    public function dbFetchRow() {
		// code
	}
}

// ********************************************

abstract class factoryDbObject
{

    protected $className = null;

    public function __construct($className)
    {
        $this->className = $className;
    }

    abstract public function generateObj();

    abstract public function getRow();
}

class superDbObjects extends factoryDbObject
{
    public function generateObj()
    {
        $obj = new $this->className();

        return $obj;
    }

    public function getRow()
    {
        $row = array(
            'name' => 'mustermann',
            'vorname' => 'max'
        );

        return $row;
    }

}

// **************************************************

$mysqlObj = new superDbObjects('dbObject_mysql');
$row = $mysqlObj->getRow();

var_dump($row);



