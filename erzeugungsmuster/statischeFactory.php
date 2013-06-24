<?php

class AAA
{
    public function foo()
    {
        echo 'foo';
    }
}

class BBB
{
    public function foo()
    {
        echo 'foo';
    }
}

class CCC
{
    public function foo()
    {
        echo 'foo';
    }
}

class DebuggerFactory
{
    static  public function createDebugger($type)
    {
        switch($type){
            case 'AAA':
                $debugger = new AAA();
                break;
            case 'BBB':
                $debugger = new BBB();
                break;
            case 'CCC':
                $debugger = new CCC();
                break;
        }

        return $debugger;
    }
}

$debugger = DebuggerFactory::createDebugger('AAA');
$debugger->foo();
