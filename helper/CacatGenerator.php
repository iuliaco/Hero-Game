<?php

namespace Game\Helpers;

use Game\Interfaces\RandomGeneratorInterface;

class CacatGenerator implements RandomGeneratorInterface
{
    public function generate($min, $max)
    {
        return ($max - $min) / 2 + $min;
    }

    public static function getInstance()
    {
        return new CacatGenerator();
    }
}