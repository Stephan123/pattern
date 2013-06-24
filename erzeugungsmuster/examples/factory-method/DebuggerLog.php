<?php
namespace de\phpdesignpatterns\util\debug;

require_once 'Debugger.php';

class DebuggerLog implements Debugger {

    public function debug($message) {
        error_log("{$message}\n", 3, './debug.log');
    }
}
?>