<?php

namespace Game\Classes;


use Game\Interfaces\RandomGeneratorInterface;
use Game\Interfaces\SkillInterface;

class Character
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $health;
    /**
     * @var int
     */
    private $strength;
    /**
     * @var int
     */
    private $defence;
    /**
     * @var int
     */
    private $speed;
    /**
     * @var int
     */
    private $lucky;
    /**
     * @var RandomGeneratorInterface
     */
    private $generator;

    /**
     * @var array
     */
    private $skills = [];

    public function __construct(string $name, RandomGeneratorInterface $generator)
    {
        $this->setName($name);
        $this->generator = $generator;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return int
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @param int $defence
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;
    }

    /**
     * @return int
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return int
     */
    public function getLucky()
    {
        return $this->lucky;
    }

    /**
     * @param int $lucky
     */
    public function setLucky($lucky)
    {
        $this->lucky = $lucky;
    }

    /**
     * @param $from
     * @param $to
     * @return $this
     */
    public function addHealth($from, $to)
    {
        $this->setHealth($this->generator->generate($from, $to));

        return $this;
    }
    public function addStrength($from, $to)
    {
        $this->setStrength($this->generator->generate($from, $to));

        return $this;
    }
    public function addDefence($from, $to)
    {
        $this->setDefence($this->generator->generate($from, $to));

        return $this;
    }
    public function addSpeed($from, $to)
    {
        $this->setSpeed($this->generator->generate($from, $to));

        return $this;
    }
    public function addLucky($from, $to)
    {
        $this->setLucky($this->generator->generate($from, $to));

        return $this;
    }

    public function addSkill(SkillInterface $skill)
    {
        $this->skills[] = $skill;
        return $this;

    }
    public function getSkills()
    {
        return $this->skills;

    }
    public function triggerSkill($chance)
    {
        return $this->generator->triggerSkill($chance);
    }


}
