<?php

/**
 * BlitzrException file.
 */

namespace Blitzr\Exception;

use Exception;

/**
 * BlitzrException, base exception.
 */
class BlitzrException extends Exception
{
    /**
    * BlitzrException constructor.
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
    * BlitzrException toString.
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
