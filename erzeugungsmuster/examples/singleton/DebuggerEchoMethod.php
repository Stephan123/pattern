<?php
namespace de\phpdesignpatterns\util\debug;

require_once 'Debugger.php';

class DebuggerEcho implements Debugger {

    public static function getInstance() {
        $debugger = new DebuggerEcho();
        return $debugger;
    }

    public function debug($message) {
        echo "{$message}\n";
    }
}

$debuggerObi = DebuggerEcho::getInstance();
$debuggerObi->debug('Nutze die Macht, Luke!');

$debuggerVader = DebuggerEcho::getInstance();
$debuggerVader->debug('Luke, ich bin Dein Vater!');

if ($debuggerObi === $debuggerVader) {
    echo "Die beiden Debugger sind das selbe Objekt.\n";
} else {
    echo "Die beiden Debugger sind *NICHT* das selbe Objekt.\n";
}
?>