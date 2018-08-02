<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 31.07.2018
 * Time: 16:51
 */

namespace application\io;

interface InputInterface
{
    public function getEmail() : string;
    public function getAnswer() : string;
    public function getQuizNumber() : string;
    public function getSolutionOption() : string;
}