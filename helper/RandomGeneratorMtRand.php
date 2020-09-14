<?php

namespace Game\Helpers;

use Game\Interfaces\RandomGeneratorInterface;

/**
 * Class RandomGeneratorMtRand
 * @package Game\Helpers
 */
class RandomGeneratorMtRand implements RandomGeneratorInterface
{
    /**
     * @var null|RandomGeneratorMtRand
     */
    private static $instance = null;

    /**
     * @return RandomGeneratorMtRand
     */
    public static function getInstance(): RandomGeneratorMtRand
    {
        if (static::$instance == null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct()
    {
    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     */
    private function __wakeup()
    {
    }

    /**
     * @param $min
     * @param $max
     * @return int|mixed
     */
    public function generate($min, $max)
    {
        return mt_rand($min, $max);
    }

    /**
     * @param $chance
     * @return int|mixed
     */
    public function triggerSkill($chance)
    {
        if (mt_rand(1, 100) <= $chance) {
            return 1;
        } else {
            return 0;
        }
    }
}