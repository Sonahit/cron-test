<?php

namespace App\Exceptions;

use Exception;

class MethodNotFoundException extends Exception
{
    public function __construct($message = "Method not Found", $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
