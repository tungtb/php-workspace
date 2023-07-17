<?php

interface ComputerInf {
    function description();
}

class Computer implements ComputerInf {
    
    function __construct() {
        
    }

    function description() {
        return "New computer";
    }
}

abstract class DecoratorComputer implements ComputerInf {

    protected $computer;

    function __construct($_computer) {
        $this->computer = $_computer;
    }

    public function description() {
        return $this->computer->description();
    }
}

class ComputerWithDisk extends DecoratorComputer {

    public function description() {
        return $this->computer->description() . ' and a disk added';
    }
}

class ComputerWithCD extends DecoratorComputer {
    
    public function description() {
        return $this->computer->description() . ' and a CD added';
    }
}

function writeln($line_in) {
    echo $line_in."<br/>";
}

$computer = new Computer();
writeln($computer->description());
$computer = new ComputerWithDisk($computer);
writeln($computer->description());
$computer = new ComputerWithCD($computer);
writeln($computer->description());
