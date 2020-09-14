<?php


namespace Game\Classes;


class AddAttack implements \Game\Interfaces\SkillInterface
{
    public $name;
    public $procent;
    public $type;
    public $duration;
    public $currentDuration;

    public function __construct($procent, $type, $duration = 1)
    {
        $this->name = get_class($this);
        $this->procent = $procent;
        $this->type = $type;
        $this->duration = $duration;
        $this->currentDuration = 0;
    }

    public function use($damage)
    {
        $damage = $damage + 10;
        return $damage;
    }
}