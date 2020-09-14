<?php


namespace Game\Classes;

use Game\Interfaces\SkillInterface;

class MagicShield implements SkillInterface
{
    public $name;
    public $procent;
    public $type;
    public $active;
    public $duration;
    public $currentDuration;

    public function __construct($procent, $type, $duration = 1)
    {
        $this->name = "Magic Shield";
        $this->procent = $procent;
        $this->type = $type;
        $this->currentDuration = 0;
        $this->duration = $duration;
    }

    public function use($damage)
    {
        $damage = round($damage / 2);
        return $damage;
    }
}