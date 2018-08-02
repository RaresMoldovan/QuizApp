<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 31.07.2018
 * Time: 15:41
 */

namespace application;

use domain\quiz\MultiChoiceQuestion as MultiChoiceQuestion;
use \domain\quiz\ScoredQuestion as ScoredQuestion;
use \domain\quiz\Quiz as Quiz;
use \domain\quiz\Answer as Answer;
use \domain\quiz\Question as Question;


class HardCodedQuizes
{
    /**
     * Method and class shall dissapear once the database functionality is introduced.
     * @param string $quizNumber
     * @return Quiz
     */
    public static function getQuiz(string $quizNumber) : Quiz
    {
        $quiz = new Quiz(1, 'SW Quiz');
        //Q1
        $question =  new Question(1, 'What does S in SOLID stand for?');
        $answer = new Answer(1, 'Single responsibility');
        $question->addAnswer($answer);
        foreach($question->getAnswers() as $answer) {
            var_dump($answer);
        }
        $quiz->addQuestion(new ScoredQuestion(1, $question, 5));

        //Q2
        $question =  new Question(1, 'What does LCOM4 measure?');
        $answer = new Answer(2,'Cohesion');
        $question->addAnswer($answer);
        $quiz->addQuestion(new ScoredQuestion(2,$question, 10));

        //Q3
        $question =  new Question(3, 'What pattern models the notification in the MVC architecture?');
        $answer = new Answer(3,'Observer');
        $question->addAnswer($answer);
        $quiz->addQuestion(new ScoredQuestion(3,$question, 10));

        //Q4
        $question =  new Question(4, 'How do you call the process of creating a method with the same signature but different behaviour in a subclass?');
        $answer = new Answer(4,'Overriding');
        $question->addAnswer($answer);
        $quiz->addQuestion(new ScoredQuestion(4,$question, 5));

        //Q5
        $question =  new MultiChoiceQuestion(5, "Which of the following is an anti pattern?");
        $question->addChoice('Singleton');
        $question->addChoice('Adapter');
        $question->addChoice('Factory');
        $question->addChoice('Decorator');
        $answer = new Answer(5,'Singleton');
        $question->addAnswer($answer);
        $quiz->addQuestion(new ScoredQuestion(5,$question, 5));

        return $quiz;
    }
}