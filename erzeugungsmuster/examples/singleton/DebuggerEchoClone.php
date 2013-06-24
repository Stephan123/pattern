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

$debuggerObi = DebuggerEcho::getInstance();
$debuggerObi->debug('Nutze die Macht, Luke!');

$debuggerVader = clone $debuggerObi;
$debuggerVader->debug('Luke, ich bin Dein Vater!');

if ($debuggerObi === $debuggerVader) {
    echo "Die beiden Debugger sind das selbe Objekt.\n";
} else {
    echo "Die beiden Debugger sind *NICHT* das selbe Objekt.\n";
}
?>