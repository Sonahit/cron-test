<?php

namespace App\Exceptions;

use Exception;

class TemplateNotFoundException extends Exception
{
    public function __construct($message = "Template Not Found", $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
