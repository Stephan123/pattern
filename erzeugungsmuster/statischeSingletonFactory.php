<?php

class AAA
{
    private static $instance = null;

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new AAA();
        }

        return self::$instance;
    }

    public function foo()
    {
        echo 'foo';
    }
}

class BBB
{
    private static $instance = null;

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new AAA();
        }

        return self::$instance;
    }

    public function foo()
    {
        echo 'foo';
    }
}

class CCC
{
    private static $instance = null;

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new AAA();
        }

        return self::$instance;
    }

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
