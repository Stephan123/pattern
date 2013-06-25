<?php
require_once 'DebuggerComposite.php';
require_once 'DebuggerLog.php';
require_once 'DebuggerEcho.php';

use de\phpdesignpatterns\util\debug\DebuggerLog;
use de\phpdesignpatterns\util\debug\DebuggerEcho;
use de\phpdesignpatterns\util\debug\DebuggerComposite;

$debuggerLog  = DebuggerLog::getInstance('./debug.log');
$debuggerEcho = DebuggerEcho::getInstance();

$composite = new DebuggerComposite();
$composite->addDebugger($debuggerEcho);
$composite->addDebugger($debuggerLog);

$debuggerEcho->debug('Nur ausgeben.');
$debuggerLog->debug('Nur in die Datei schreiben.');
$composite->debug('Ausgeben und in die Datei schreiben.');
?>