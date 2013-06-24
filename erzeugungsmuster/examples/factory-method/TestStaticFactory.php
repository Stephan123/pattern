<?php
define('DEBUG_MODE', 'echo');

require_once 'StaticFactoryMethod.php';

use de\phpdesignpatterns\util\debug\DebuggerFactory;

$debugger = DebuggerFactory::createDebugger(DEBUG_MODE);
$debugger->debug('Danger Will Robsinson!');
?>