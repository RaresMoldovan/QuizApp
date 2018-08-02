<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 31.07.2018
 * Time: 16:41
 */

namespace application;


use application\io\InputInterface as InputInterface;
use application\io\OutputInterface;
use application\validator\Validator as Validator;
use domain\quiz\Quiz as Quiz;
use domain\user\UserQuiz as UserQuiz;

class QuizController
{
    private $inputHandler;
    private $outputHandler;
    private $validator;
    private $quizSolver;

    /**
     * QuizController constructor.
     * @param $inputHandler InputInterface
     * @param $outputHandler OutputInterface
     * @param $validator Validator
     */
    public function __construct(InputInterface $inputHandler, OutputInterface $outputHandler, Validator $validator)
    {
        $this->inputHandler  = $inputHandler;
        $this->outputHandler = $outputHandler;
        $this->validator     = $validator;
        $this->quizSolver    = new QuizSolver($inputHandler, $outputHandler);
    }


    /**
     * Performs main flow of the program.
     */
    public function takeQuiz()
    {
        //Get email from user
        $email = $this->inputHandler->getEmail();

        //Validate email
        if ($this->validator->validateEmail($email) == false) {
            return;
        }

        //Get quiz number
        $quizNr = $this->inputHandler->getQuizNumber();

        //Validate quiz number
        if ($this->validator->validateQuizNumber($quizNr) == false) {
            return;
        }

        //Get the quiz object
        $quiz = HardCodedQuizes::getQuiz($quizNr);

        var_dump($quiz);
        //Create a user quiz object
        $userQuiz = new UserQuiz($quiz, '01/01/2018');

        //Solve quiz to get result
        $result = $this->quizSolver->solveQuiz($userQuiz);

        //Store result in user quiz object
        $userQuiz->setTotal($result);

        //Display result
        $this->outputHandler->outputObject('YOUR RESULT IS  ' . $result . '!' . PHP_EOL);

        //Ask the user if he wants to see the soluyion
        $resultOption        = $this->inputHandler->getSolutionOption();
        $firstLetterOfOption = substr($resultOption, 0, 1);

        if ($firstLetterOfOption === 'y' || $firstLetterOfOption === 'Y') {
            $this->outputHandler->outputObject($quiz->getSolution());
        }

    }
}