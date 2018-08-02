<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 30.07.2018
 * Time: 14:00
 */

namespace domain\quiz;

use domain\collection\EntityCollection;

interface QuestionInterface
{
    public function getId() : string;
    public function getText() : string;
    public function getAnswers() : EntityCollection;
    public function __toString() : string;
}