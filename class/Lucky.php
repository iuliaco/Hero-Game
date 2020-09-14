<?php


namespace Game\Classes;

use Game\Interfaces\SkillInterface;

class Lucky implements SkillInterface
{
    public $name;
    public $procent;
    public $type;
    public $duration;
    public $currentDuration;

    public function __construct($procent, $type, $active = 0, $duration = 1)
    {
        $this->name = "Lucky";
        $this->procent = $procent;
        $this->type = $type;
        $this->currentDuration = 0;
        $this->duration = $duration;
    }

    public function use($damage)
    {
        $damage = 0;
        return $damage;
    }
}