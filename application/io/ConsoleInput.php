<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 31.07.2018
 * Time: 16:53
 */

namespace application\io;

class ConsoleInput implements InputInterface
{
    public function getEmail(): string
    {
        echo "EMAIL: ";
        return fgets(STDIN);
    }

    public function getAnswer(): string
    {
        echo "\nYour answer is: ";
        return fgets(STDIN);
    }

    public function getQuizNumber(): string
    {
        echo "Number of the quiz you want to take: ";
        return fgets(STDIN);
    }

    public function getSolutionOption(): string
    {
        echo "Do you want to see the results? Y/N: ";
        return fgets(STDIN);

    }
}