<?php

namespace Game\Classes;

use Game\Helpers\RandomGenerator;
use Game\Helpers\RandomGeneratorMtRand;

class CharacterFactory
{
    private static $generator;

    public static function create(string $name)
    {
        if (self::$generator == null) {
            self::$generator = new RandomGenerator(RandomGeneratorMtRand::getInstance());
        }
        return new Character($name, self::$generator);
    }
}