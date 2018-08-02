<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 30.07.2018
 * Time: 14:17
 */

namespace domain\quiz;

class MultiChoiceQuestion extends Question
{
    protected $choices;

    /**
     * MultiChoiceQuestion constructor.
     * @param string $id
     * @param string $text
     */
    public function __construct(string $id, string $text)
    {
        parent::__construct($id, $text);
        $this->choices = [];
    }

    /**
     * @param string $choice
     */
    public function addChoice(string $choice)
    {
        $this->choices[] = $choice;
    }

    /**
     * @return array
     */
    public function getChoices() : array
    {
        return $this->choices;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        $questionStatement = $this->text;
        $indexOfChoice = 0;
        foreach($this->choices as $choice) {
            $questionStatement .= PHP_EOL . (++$indexOfChoice) . ")". $choice;
        }
        return $questionStatement;
    }

}