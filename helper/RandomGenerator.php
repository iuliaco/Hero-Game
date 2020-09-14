<?php

namespace Game\Helpers;

use Game\Interfaces\RandomGeneratorInterface;

/**
 * Class RandomGenerator
 * @package Game\Helpers
 */
class RandomGenerator implements RandomGeneratorInterface
{
    /**
     * @var RandomGeneratorInterface
     */
    private $generator = null;

    /**
     * RandomGenerator constructor.
     * @param RandomGeneratorInterface $generator
     */
    public function __construct(RandomGeneratorInterface $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @param $min
     * @param $max
     */
    public function generate($min, $max)
    {
      return $this->generator->generate($min, $max);
    }

    /**
     * @param $chance
     * @return int|mixed
     */
    public function triggerSkill($chance)
    {
        return $this->generator->triggerSkill($chance);
    }
}