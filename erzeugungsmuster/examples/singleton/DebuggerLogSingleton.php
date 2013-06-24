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

$debuggerObi = DebuggerLog::getInstance('./obi.log');
$debuggerObi->debug('Nutze die Macht, Luke!');

$debuggerVader = DebuggerLog::getInstance('./vader.log');
$debuggerVader->debug('Luke, ich bin Dein Vater!');

if ($debuggerObi === $debuggerVader) {
    echo "Die beiden Debugger sind das selbe Objekt.\n";
} else {
    echo "Die beiden Debugger sind *NICHT* das selbe Objekt.\n";
}
?>