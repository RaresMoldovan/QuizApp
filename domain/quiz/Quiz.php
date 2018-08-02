<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 30.07.2018
 * Time: 14:25
 */

namespace domain\quiz;

use domain\collection\EntityCollection as EntityCollection;

class Quiz implements Entity
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var EntityCollection
     */
    protected $questions;

    /**
     * Quiz constructor.
     * @param string $id
     * @param string $title
     */
    public function __construct(string $id, string $title)
    {
        $this->id        = $id;
        $this->title     = $title;
        $this->questions = new EntityCollection(uniqid());
    }

    public function getId() : string
    {
        return $this->id;
    }
    /**
     * @param ScoredQuestion $question
     */
    public function addQuestion(ScoredQuestion $question)
    {
        $this->questions->addItem($question);
    }

    /**
     * @return array
     */
    public function getQuestions(): EntityCollection
    {
        return $this->questions;
    }

    /**
     * @return string
     */
    public function getSolution(): string
    {
        $solution = '';
        foreach ($this->questions as $scoredQuestion) {
            $solution .= $scoredQuestion->getQuestion()->showSolution() . PHP_EOL;
        }
        return $solution;
    }

    /**
     * The equality of 2 quizes. TODO: Check the equivalance of questions.
     * @param Entity $entity
     * @return bool
     */
    public function equals(Entity $entity) : bool
    {
        if(!$entity instanceof  Quiz) {
            return false;
        }
        $size = count($this->questions);
        if($size!=count($entity->getQuestions())) {
            return false;
        }
        return true;
    }
}