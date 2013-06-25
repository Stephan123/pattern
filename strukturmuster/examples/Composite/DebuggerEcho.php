<?php
namespace de\phpdesignpatterns\util\debug;

require_once 'Debugger.php';

class DebuggerEcho implements Debugger {

    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DebuggerEcho();
        }
        return self::$instance;
    }

    protected function __construct() {
    }

    private function __clone() {}

    public function debug($message) {
        echo "{$message}\n";
    }
}
?>