<?php

namespace Game\Interfaces;

interface SkillInterface
{

    public function use($damage);
    public function __construct($procent, $type);
}