<?php
namespace de\phpdesignpatterns\util\debug;

require_once 'Debugger.php';

class DebuggerComposite implements Debugger {
    protected $debuggers = array();

    public function addDebugger(Debugger $debugger) {
        $this->debuggers[] = $debugger;
    }

    public function removeDebugger(Debugger $debugger) {
        $key = array_search($debugger, $this->debuggers);
        if ($key === false) {
            return false;
        }
        unset($this->debuggers[$key]);
        return true;
    }

    public function debug($message) {
        foreach ($this->debuggers as $debugger) {
            $debugger->debug($message);
        }
    }
}
?>