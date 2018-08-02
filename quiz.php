<?php

require_once 'autoload.php';

use application\QuizController as QuizController;

$controller = new QuizController(new \application\io\ConsoleInput(), new \application\io\ConsoleOutput(), new \application\validator\Validator());
$controller->takeQuiz();