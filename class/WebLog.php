<?php


namespace Game\Classes;


class WebLog implements \Game\Interfaces\Log
{

    public function startGame($firstPlayer)
    {
        echo "A inceput lupta, " . $firstPlayer->getName() . " ataca primul. </br>";
    }

    public function endGame($winner)
    {
        echo "S-a terminat lupta, " . $winner->getName() . " a reusit sa-si infranga adversarul. </br>";
    }

    public function nextRound($actualPlayer, $no)
    {
        echo "Trecem la runda numarul " . $no . " unde " . $actualPlayer->getName() . " ataca <br/>";
    }

    public function resultRound($attacker, $defender, $damage)
    {
        echo "In aceasta runda " . $attacker->getName() . " l-a atacat pe " . $defender->getName() . " dandu-i " . $damage . " damage <br/>";
    }
    public function statistics($hero, $enemy)
    {
        echo "In aceasta runda " . $hero->getName() . " mai are " . $hero->getHealth() . " viata, iar " . $enemy->getName() . " mai are " . $enemy->getHealth() . " viata<br/>";
    }


    public function endRounds($winner, $loser)
    {
        echo "Am trecut de numarul maxim de 20 de runde, iar in urma lui " . $winner->getName() . " a reusit sa il infranga pe " . $loser->getName() . "<br/>";
    }

    public function skillUsedAttack($user, $skill, $damage, $currentDuration)
    {
        if($currentDuration == 1)
            echo $user->getName() . " si a declansat skillul de atac " . $skill->name . " care dureaza " . $currentDuration . " runda si a crescut damageul la " . $damage . "<br/>";
        else
            echo $user->getName() . " si a declansat skillul de atac " . $skill->name . " care dureaza " . $currentDuration . " runde si a crescut damageul la " . $damage . "<br/>";
    }

    public function skillUsedDefend($user, $skill, $damage, $currentDuration)
    {
        if($currentDuration == 1)
            echo $user->getName() . " si a declansat skillul de aparare " . $skill->name . " care dureaza " . $currentDuration  . " runda si a scazut damageul la " . $damage . "<br/>";
        else
            echo $user->getName() . " si a declansat skillul de aparare " . $skill->name . " care dureaza " . $currentDuration  . " runde si a scazut damageul la " . $damage . "<br/>";
    }
    public function skillUsedFromBeforeAttack($user, $skill, $damage, $currentDuration)
    {
        if($currentDuration == 1)
            echo $user->getName() . " si a folosit skilul declansat anterior de atac " . $skill->name . " care mai dureaza " . $currentDuration . " runda si a crescut damageul la " . $damage . "<br/>";
        else
            echo $user->getName() . " si a folosit skilul declansat anterior de atac " . $skill->name . " care mai dureaza " . $currentDuration . " runde si a crescut damageul la " . $damage . "<br/>";
    }

    public function skillUsedFromBeforeDefend($user, $skill, $damage, $currentDuration)
    {
        if($currentDuration == 1)
            echo $user->getName() . " si a folosit skilul declansat anterior de aparare " . $skill->name . " care mai dureaza " . $currentDuration  . " runda si a scazut damageul la " . $damage . "<br/>";
        else
            echo $user->getName() . " si a folosit skilul declansat anterior de aparare " . $skill->name . " care mai dureaza " . $currentDuration  . " runde si a scazut damageul la " . $damage . "<br/>";
    }
}