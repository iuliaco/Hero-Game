<?php

namespace Game\Classes;

use Game\Interfaces\BattleInterface;
use Game\Interfaces\SkillInterface;

class BattleNow implements BattleInterface
{
    public $hero;
    public $enemy;
    public $actualPlayer;
    public $winner;
    public $game;
    public $log;

    public function decideStart()
    {
        if ($this->hero->getSpeed() > $this->enemy->getSpeed()) {
            return $this->hero;
        } elseif ($this->hero->getSpeed() < $this->enemy->getSpeed()) {
            return $this->enemy;
        } else {
            if ($this->hero->getLucky() >= $this->enemy->getLucky()) {
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
        $this->game = 1;
        $this->actualPlayer = $this->decideStart();
    }

    public function checkDead()
    {
        if ($this->hero->getHealth() <= 0) {
            return 1;
        } else if ($this->enemy->getHealth() <= 0) {
            return 1;
        }
        return 0;
    }

    public function getDamage(Character $attacker, Character $defender)
    {
        $damage = $attacker->getStrength() - $defender->getDefence();
        return $damage;
    }

    public function applyDamage(Character $defender, $damage)
    {
        $health = $defender->getHealth() - $damage;
        $defender->setHealth($health);
    }

    public function applySkills(Character $attacker, Character $defender, $damage, $log)
    {
        foreach ($attacker->getSkills() as $skill) {
            if ($skill->type === "attack") {
                if($skill->currentDuration !== 0) {
                    $damage = $skill->use($damage);
                    $skill->currentDuration--;
                    $log->skillUsedFromBeforeAttack($attacker, $skill, $damage, $skill->currentDuration);
                } elseif ($attacker->triggerSkill($skill->procent)) {
                    $skill->currentDuration = $skill->duration;
                    $damage = $skill->use($damage);
                    $log->skillUsedAttack($attacker, $skill, $damage, $skill->currentDuration);
                    $skill->currentDuration--;
                }
            }
        }
        foreach ($defender->getSkills() as $skill) {
            if ($skill->type === "defence") {
                if($skill->currentDuration !== 0) {
                    $damage = $skill->use($damage);
                    $skill->currentDuration--;
                    $log->skillUsedFromBeforeDefend($defender, $skill, $damage, $skill->currentDuration);
                } elseif ($defender->triggerSkill($skill->procent)) {
                    $skill->currentDuration = $skill->duration;
                    $damage = $skill->use($damage);
                    $log->skillUsedDefend($defender, $skill, $damage, $skill->currentDuration);
                    $skill->currentDuration--;
                }
            }
        }
        $log->resultRound($attacker, $defender, $damage);
        $this->applyDamage($defender, $damage);

    }

    public function battle()
    {
        $log = new WebLog();
        $log->startGame($this->actualPlayer);
        for ($i = 0; $i < 20; $i++) {
            $log->nextRound($this->actualPlayer, $i + 1);
            $damage = $this->getDamage($this->actualPlayer, $this->nextPlayer());
            $this->applySkills($this->actualPlayer, $this->nextPlayer(), $damage, $log);
            $log->statistics($this->hero, $this->enemy);

            if ($this->checkDead()) {
                $log->endGame($this->actualPlayer);
                return 0;
            }
            $this->actualPlayer = $this->nextPlayer();
        }
        $log->endRounds($this->hero, $this->enemy);

    }
}

