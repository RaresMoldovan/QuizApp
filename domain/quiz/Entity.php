<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 01.08.2018
 * Time: 11:39
 */

namespace domain\quiz;


interface Entity
{
    public function getId() : string;

    /**
     * Defines the equality relation between two entities.
     * @param Entity $entity
     * @return bool
     */
    public function equals(Entity $entity) : bool;
}