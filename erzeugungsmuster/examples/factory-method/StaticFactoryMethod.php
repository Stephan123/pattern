<?php
namespace de\phpdesignpatterns\util\debug;

class DebuggerFactory {
    static public function createDebugger($type) {
        switch (strtolower($type)) {
            case 'echo':
                require_once 'DebuggerEcho.php';
                $debugger = new DebuggerEcho();
                break;
            case 'log':
                require_once 'DebuggerLog.php';
                $debugger = new DebuggerLog();
                break;
            default:
                throw new UnknownDebuggerException();
        }
        return $debugger;
    }
}

class UnknownDebuggerException {
}
?>