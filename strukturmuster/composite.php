<?php
interface message
{
    public function information($message);
}

class foo implements message
{
    public function information($message)
    {
        echo 'Foo: '.$message."<hr>";
    }
}

class bar implements message
{
    public function information($message)
    {
        echo 'Bar: '.$message."<hr>";
    }
}


class composite implements message
{
    protected $classes = array();

    public function addClass(message $class)
    {
        $this->classes[] = $class;
    }

    public function removeClass(message $class)
    {
        $key = array_search($class,$this->classes);
        if($key === false){
            return false;
        }
        unset($this->classes[$key]);

        return true;
    }

    public function information($message)
    {
        foreach($this->classes as $action){
            $action->information($message);
        }
    }
}

$classFoo = new foo();
$classBar = new bar();

$classComposite = new composite();
$classComposite->addClass($classBar);
$classComposite->addClass($classFoo);
// $classComposite->removeClass($classFoo);

$classComposite->information('Das ist eine Information');

