<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 30.07.2018
 * Time: 15:47
 */


namespace domain\user;
use domain\quiz\Quiz as Quiz;

class UserQuiz
{
    /**
     * @var
     */
    protected $originalQuiz;
    protected $dateTaken;
    protected $total;

    /**
     * UserQuiz constructor.
     * @param $originalQuiz
     * @param $dateTaken
     */
    public function __construct(Quiz $originalQuiz, string $dateTaken)
    {
        $this->originalQuiz = $originalQuiz;
        $this->dateTaken    = $dateTaken;
        $this->total        = 0;
    }

    /**
     * @return Quiz
     */
    public function getOriginalQuiz() : Quiz
    {
        return $this->originalQuiz;
    }

    /**
     * @return string
     */
    public function getDateTaken() : string
    {
        return $this->dateTaken;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total)
    {
        $this->total = $total;
    }
}