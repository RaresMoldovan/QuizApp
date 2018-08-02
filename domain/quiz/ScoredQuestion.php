<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 30.07.2018
 * Time: 15:26
 */

namespace domain\quiz;

class ScoredQuestion implements Entity
{
    private $id;
    /**
     * Composition over inheritance.
     * @var SimpleQuestion
     */
    protected $question;

    /**
     * @var int
     */
    protected $score;

    /**
     * ScoredQuestion constructor.
     * @param Question $question
     * @param int $score
     */
    public function __construct(string $id, Question $question, int $score)
    {
        $this->id       = $id;
        $this->question = $question;
        $this->score    = $score;
    }

    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    public function equals(Entity $entity) : bool{
        if(!$entity instanceof ScoredQuestion) {
            return false;
        }
        return $this->getQuestion()->equals($entity->getQuestion())&&$this->score===$entity->getScore();
    }

}