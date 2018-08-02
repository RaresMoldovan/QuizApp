<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 30.07.2018
 * Time: 14:09
 */

namespace domain\quiz;

use domain\collection\EntityCollection as EntityCollection;

class Question implements QuestionInterface, Entity
{

    protected $id;
    protected $text;
    /**
     * @var EntityCollection
     */
    protected $answers;

    public function __construct(string $id, string $text)
    {
        $this->id = $id;
        $this->text = $text;
        $this->answers = new EntityCollection(uniqid());
    }

    public function getId() : string
    {
        return $this->id;
    }

    public function getText() : string
    {
        return $this->text;
    }

    public function getAnswers() : EntityCollection
    {
        return $this->answers;
    }

    public function __toString() : string
    {
        return  $this->text;
    }

    public function addAnswer(Answer $answer)
    {
        $this->answers->addItem($answer);
    }

    public function showSolution() : string
    {
        $solution = 'QUESTION: ' . $this->__toString() . PHP_EOL;
        $solution .= 'ANSWER(s): ';
        foreach($this->answers as $answer) {
            $solution .= $answer->getText();
        }
        return $solution;
    }

    public function equals(Entity $entity): bool
    {
        if($entity instanceof Question) {
            return $entity->getText() == $this->getText();
        }
        return false;

    }
}