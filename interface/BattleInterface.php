<?php

namespace Game\Interfaces;

interface BattleInterface {
    public function decideStart();
    public function battle();
    public function endBattle();
}


