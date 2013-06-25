<?php
namespace de\phpdesignpatterns\util\debug;

interface Debugger {
    public function debug($message);
}

class DebuggerEcho implements Debugger {
    public function debug($message) {
        echo "{$message}\n";
    }
}

class DebuggerLog implements Debugger {
    public function debug($message) {
        error_log("{$message}\n", 3, './RentalCompany.log');
    }
}

class DebuggerVoid implements Debugger {
    public function debug($message) {
        // Alle Meldungen einfach ignorieren
    }
}
?>