<?php

/**
 * NetworkException file.
 */

namespace Blitzr\Exception;

use Exception;

/**
 * NetworkException, base exception.
 */
class NetworkException extends Exception
{
    /**
    * NetworkException constructor.
    *
    * Use this constructor to set the error message and code, eventually give a parent exception.
    *
    * @param string $message Error message
    * @param integer $code Error code
    * @param object $previous Previous Exception
    *
    * @return null
    */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
    * NetworkException toString.
    *
    * Return readable exception string
    *
    * @return string
    */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
