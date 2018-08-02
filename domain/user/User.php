<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 30.07.2018
 * Time: 14:34
 */

namespace domain\user;


class User
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;
    /**
     * @var array(UserQuiz)
     */
    protected $takenQuizes;

    public function __construct(string $id, string $email)
    {
        $this->id          = $id;
        $this->email       = $email;
        $this->takenQuizes = [];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param UserQuiz $userQuiz
     */
    public function addQuiz(UserQuiz $userQuiz): void
    {
        $this->takenQuizes[] = $userQuiz;
    }

    /**
     * @param int $quizId
     * @return float
     */
    public function getAverageForQuiz(int $quizId): float
    {
        $sum   = 0;
        $count = 0;
        foreach ($this->takenQuizes as $userQuiz) {
            if ($userQuiz->getQuiz()->getId() === $quizId) {
                $sum += $userQuiz->getResult();
                $count++;
            }
        }
        return (float)$sum / $count;
    }

}