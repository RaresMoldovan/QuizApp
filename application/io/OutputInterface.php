<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 31.07.2018
 * Time: 17:19
 */

namespace application\io;


interface OutputInterface
{
    public function outputObject($output) : void;
}