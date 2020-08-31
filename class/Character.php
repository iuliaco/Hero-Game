<?php

namespace Game\Classes;


class Character
{
    public $health;
    public $strength;
    public $defence;
    public $speed;
    public $lucky;

    function __construct($healthMin, $healthMax, $strengthMin, $strengthMax,
                         $defenceMin, $defenceMax, $speedMin, $speedMax, $luckyMin, $luckyMax)
    {
        $this->health = rand($healthMin, $healthMax);
        $this->strength = rand($strengthMin, $strengthMax);
        $this->defence = rand($defenceMin, $defenceMax);
        $this->speed = rand($speedMin, $speedMax);
        $this->lucky = rand($luckyMin, $luckyMax);
    }

    function get_health()
    {
        return $this->health;
    }

    function get_strength()
    {
        return $this->strength;
    }

    function get_defence()
    {
        return $this->defence;
    }

    function get_speed()
    {
        return $this->speed;
    }

    function get_lucky()
    {
        return $this->lucky;
    }

}
