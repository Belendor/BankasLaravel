<?php 

namespace App;

class GeneratorForm{

    public static function generateIban(){
        $string = 'LT';

        for($i = 0; $i<18; $i++){
            $randNr = rand(0,9);
            $string .= $randNr;
        }
    
        return $string;
    }

    public static function generateId(){
        $string = '';

        $string .= rand(1,6);
        $string .= str_pad(rand(0,99), 2, "0", STR_PAD_LEFT);
        $string .= str_pad(rand(1,12), 2, "0", STR_PAD_LEFT);
        $string .= str_pad(rand(1,31), 2, "0", STR_PAD_LEFT);

        for($i = 0; $i<4; $i++){
            $randNr = rand(0,9);
            $string .= $randNr;
        }

        return $string;
    }

    public static function generateName(){
        $string = '';

        for($i = 0; $i<5; $i++){
            $rand = range('a','z');
            shuffle($rand);
            $string .= $rand[0];
        }
    
        return $string;
    }
}