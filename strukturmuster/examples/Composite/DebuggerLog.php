<?php
namespace de\phpdesignpatterns\util\debug;

require_once 'Debugger.php';

class DebuggerLog implements Debugger {

    protected $logfile = null;
    private static $instances = array();

    public static function getInstance($logfile) {
        if (!isset(self::$instances[$logfile])) {
            self::$instances[$logfile] = new DebuggerLog($logfile);
        }
        return self::$instances[$logfile];
    }

    protected function __construct($logfile) {
        $this->logfile = $logfile;
    }

    private function __clone() {}

    public function debug($message) {
        error_log("{$message}\n", 3, $this->logfile);
    }
}
?>