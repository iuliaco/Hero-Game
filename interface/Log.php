<?php


namespace Game\Interfaces;


interface Log
{
    public function startGame($firstPlayer);
    public function endGame($winner);
    public function nextRound($actualPlayer, $no);
    public function resultRound($attacker, $defender, $damage);
    public function statistics($hero, $enemy);
    public function endRounds($winner, $loser);
    public function skillUsedAttack($user, $skill, $damage, $currentDuration);
    public function skillUsedDefend($user, $skill, $damage, $currentDuration);
    public function skillUsedFromBeforeAttack($user, $skill, $damage, $currentDuration);
    public function skillUsedFromBeforeDefend($user, $skill, $damage, $currentDuration);
}