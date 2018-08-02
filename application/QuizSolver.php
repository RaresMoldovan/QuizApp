<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 01.08.2018
 * Time: 10:47
 */

namespace application;

use application\io\InputInterface as InputInterface;
use application\io\OutputInterface as OutputInterface;
use domain\user\UserQuiz as UserQuiz;
use domain\quiz\Answer as Answer;

class QuizSolver
{
    private $inputHandler;
    private $outputHandler;

    /**
     * QuizSolver constructor.
     * @param $inputHandler
     * @param $outputHandler
     */
    public function __construct(InputInterface $inputHandler, OutputInterface $outputHandler)
    {
        $this->inputHandler  = $inputHandler;
        $this->outputHandler = $outputHandler;
    }


    /**
     * I know the function does too much stuff but I switched from array to collection last minute and had no time
     * left to break the function.
     * @param UserQuiz $userQuiz
     * @return int
     */
    public function solveQuiz(UserQuiz $userQuiz): int
    {
        $questions = $userQuiz->getOriginalQuiz()->getQuestions();
        $points = 0;
        foreach ($questions as $question) {
            $this->outputHandler->outputObject($question->getQuestion() . PHP_EOL . "POINTS: " . $question->getScore());
            $answer            = $this->inputHandler->getAnswer();
            $answers           = explode(',', $answer);
            $answerObjects = [];
            //Create an array of answers
            foreach($answers as $stringAnswer) {
                $answerObjects[] = new Answer(uniqid(), substr($stringAnswer, 0, strlen($stringAnswer)-1));
            }
            $answeredCorrectly = true;
            foreach ($answerObjects as $userAnswer) {
                if (!$question->getQuestion()->getAnswers()->hasItem($userAnswer)) {
                    $answeredCorrectly = false;
                    break;
                }
            }
            if ($answeredCorrectly == true) {
                $points += $question->getScore();
            }
        }
        return $points;
    }
}