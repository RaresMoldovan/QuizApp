<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 31.07.2018
 * Time: 16:57
 */

namespace application\io;


class ConsoleOutput implements  OutputInterface
{
    public function outputObject($output) : void
    {
        echo $output;
    }

}