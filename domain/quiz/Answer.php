<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 30.07.2018
 * Time: 13:35
 */

namespace domain\quiz;

class Answer implements  Entity
{
    private $id;
    private $text;
    private $explanation;

    public function __construct(string $id, string $text)
    {
        $this->id = $id;
        $this->text = $text;
        $this->explanation = '';
    }

    public function getId() : string {
        return $this->id;
    }

    public function getText() : string
    {
        return $this->text;
    }

    public function getExplanation() : string
    {
        return $this->explanation;
    }

    public function setExplanation(string $explanation) : string
    {
        $this->explanation = $explanation;
    }

    public function __toString() : string
    {
        return $this->text . PHP_EOL . ($this->explanation !== '' ? $this->explanation . PHP_EOL : '');
    }

    public function equals(Entity $entity): bool
    {
        if($entity instanceof Answer) {
            return $entity->getText() === $this->getText();
        }
        return false;

    }
}