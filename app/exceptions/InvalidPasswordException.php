<?php

class InvalidPasswordException extends \Exception{

    public function __construct($message)
    {


        parent::__construct($message);
    }

}