<?php

namespace Game\Interfaces;

/**
 * Interface RandomGeneratorInterface
 * @package Game\Interfaces
 */
interface RandomGeneratorInterface
{
    /**
     * @param $min
     * @param $max
     * @return mixed
     */
    public function generate($min, $max);
}