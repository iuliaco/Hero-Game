<?php


namespace Game\Classes;


abstract class Skill
{
    public $procent;
    public $player;
    public $type;
    abstract function enable();
    public function __construct($procent, $player, $type) {
        $this->procent = $procent;
        $this->player = $player;
        $this->type = $type;
    }

}