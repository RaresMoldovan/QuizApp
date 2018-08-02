<?php
/**
 * Created by PhpStorm.
 * User: raresmoldovan
 * Date: 31.07.2018
 * Time: 17:21
 */

namespace application\validator;
class Validator
{
    /**
     * Will validate the presence of the email in the database when DAO objects implemented.
     * @param string $email
     * @return bool
     */
    public function validateEmail(string $email) : bool
    {
        return true;
    }

    /**
     * Will validate the quiz number when DAO objects implemented.
     * @param string $number
     * @return bool
     */
    public function validateQuizNumber(string $number) : bool
    {
        return true;
    }

}