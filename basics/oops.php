<?php
    //1. Encapsulation
        class Fruit{
            private $name; private $color;
            
            // constructor of the class4;/
            function __construct(String $name, String $color){
                $this->name = $name;
                $this->color = $color;
            }
            
            function get_name(){
                return $this->name;
            }
            function get_color(){
                return $this->color;
            }
        }
        
            $apple = new Fruit("Apple", "Red");
            $banana = new Fruit("Banana", "Yellow");
            
            
            echo $apple->get_name()." is in ".$apple->get_color()." color<br>";
            echo $banana->get_name()." is in ".$banana->get_color()." color<br>";

            var_dump($apple instanceof Fruit);
            
?>