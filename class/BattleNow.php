<?php
namespace Game\Classes;

use Game\Interfaces\BattleInterface;

class BattleNow implements BattleInterface
{
    public $hero;
    public $enemy;
    public $actualPlayer;
    public $heroSkills;
    public $enemySkills;
    public $winner;
    public $game;

    public function decideStart()
    {
        if ($this->hero->get_speed() > $this->enemy->get_speed()) {
            return $this->hero;
        } elseif ($this->hero->get_speed() < $this->enemy->get_speed()) {
            return $this->enemy;
        } else {
            if ($this->hero->get_lucky() >= $this->enemy->get_lucky()) {
                return $this->hero;
            } else {
                return $this->enemy;
            }
        }
    }

    public function nextPlayer()
    {
        if ($this->actualPlayer === $this->hero) {
            return $this->enemy;
        } else {
            return $this->hero;
        }
    }

    public function __construct(Character $hero, Character $enemy)
    {
        $this->hero = $hero;
        $this->enemy = $enemy;
        $this->heroSkills = array();
        $this->enemySkills = array();
        $this->addSkill($this->hero, "attack", "rapid-strike", 10);
        $this->addSkill($this->hero, "defence", "magic-shield", 20);
        $this->addSkill($this->hero, "defence", "lucky", 10);
        $this->addSkill($this->enemy, "defence", "lucky", 20);
        $this->game = 1;
        $this->actualPlayer = $this->decideStart();
    }

    public function checkProp($attacker, $damage, $type)
    {

    }

    public function getDamage($attacker)
    {

    }

    public function battle()
    {
        echo "battle";
    }

    public function addSkill($character, $type, $name, $percent)
    {
        if ($this->hero === $character) {
            array_push($this->heroSkills, array(
                "type" => $type,
                "name" => $name,
                "percent" => $percent,
            ));
        } else {
            array_push($this->enemySkills, array(
                "name" => $name,
                "percent" => $percent,
                "type" => $type
            ));
        }

    }

    public function showSkills()
    {
        echo '<pre>';
        print_r($this->heroSkills);
        echo '</pre>';

    }

    public function endBattle()
    {
        echo "end";
    }
}