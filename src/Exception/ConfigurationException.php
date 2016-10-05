<?php

/**
 * ConfigurationException file.
 */
namespace Blitzr\Exception;

use Exception;

/**
 * ConfigurationException, signal a configuration issue.
 */
class ConfigurationException extends Exception
{
    /**
     * ConfigurationException constructor.
     *
     * Use this constructor to set the error message and code, eventually give a parent exception.
     *
     * @param string $message  Error message
     * @param int    $code     Error code
     * @param object $previous Previous Exception
     */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * ConfigurationException toString.
     *
     * Return readable exception string
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__.": [{$this->code}]: {$this->message}\n";
    }
}
