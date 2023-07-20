<?php
require_once 'StringControler/CaseTrait.php';
require_once 'StringControler/CheckersTrait.php';
require_once 'StringControler/ReplacerTrait.php';
require_once 'StringControler/CountTraits.php';
require_once 'StringControler/ManipulationTraits.php';
require_once 'StringControler/ParsingTraits.php';

class Str
{
    use CaseTrait,
        CheckersTrait,
        ReplaceTrait,
        CountTrait,
        ManipulationTraits,
        ParsingTrait;

    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function __toString()
    {
        return $this->string;
    }

    // Example of usage of this class:
    // $string = new StringHelper("Hello, World!");
    // echo $string->toLowerCase(); // Output: "hello, world!"
    // echo $string->length(); // Output: 13
}
