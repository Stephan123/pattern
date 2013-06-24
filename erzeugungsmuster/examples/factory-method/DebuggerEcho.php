<?php
namespace de\phpdesignpatterns\util\debug;

require_once 'Debugger.php';

class DebuggerEcho implements Debugger {

    public function debug($message) {
        echo "{$message}\n";
    }
}
?>