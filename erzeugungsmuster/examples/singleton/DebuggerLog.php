<?php
namespace de\phpdesignpatterns\util\debug;

require_once 'Debugger.php';

class DebuggerLog implements Debugger {

    protected $logfile = null;

    public function __construct($logfile) {
        $this->logfile = $logfile;
    }

    public function debug($message) {
        error_log("{$message}\n", 3, $this->logfile);
    }
}

$debuggerObi = new DebuggerLog('./obi.log');
$debuggerObi->debug('Nutze die Macht, Luke!');

$debuggerVader = new DebuggerLog('./vader.log');
$debuggerVader->debug('Luke, ich bin Dein Vater!');

if ($debuggerObi === $debuggerVader) {
    echo "Die beiden Debugger sind das selbe Objekt.\n";
} else {
    echo "Die beiden Debugger sind *NICHT* das selbe Objekt.\n";
}
?>