<?php

interface GoAlgorithm {
    function go();
}

class GoByDrivingAlgorithm implements GoAlgorithm {
    function go() {
        return "Go by driving";
    }
}

class GoByFlyingAlgorithm implements GoAlgorithm {
    function go() {
        return "Go by flying";
    }
}

class GoByFlyingFastAlgorithm implements GoAlgorithm {
    function go() {
        return "Go by flying fast";
    }
}

class GoByFlyingFastestAlgorithm implements GoAlgorithm {
    function go() {
        return " ... changed to fastest";
    }
}

abstract class Vehicle {

    protected $goAlgorithm;
    
    function __construct() {
        
    }

    public function setGoAlgorithm($_goAlgorithm) {
        $this->goAlgorithm = $_goAlgorithm; 
    }

    public function go() {
        return $this->goAlgorithm->go();
    }
}

class StreetRacer extends Vehicle {

    function __construct() {
        $this->setGoAlgorithm(new GoByDrivingAlgorithm());
    }
}

class Helicopter extends Vehicle {

    function __construct() {
        $this->setGoAlgorithm(new GoByFlyingAlgorithm());
    }
}

class Jet extends Vehicle {

    function __construct() {
        $this->setGoAlgorithm(new GoByFlyingFastAlgorithm());
    }
}

function writeln($line_in) {
    echo $line_in."<br/>";
}

$streetRacer = new StreetRacer();
$helicopter = new Helicopter();
writeln($streetRacer->go());
writeln($helicopter->go());
$jet = new Jet();
echo($jet->go());
$jet->setGoAlgorithm(new GoByFlyingFastestAlgorithm());
echo($jet->go());