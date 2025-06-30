<?php

namespace Sitemap\Exception;

use Exception;

class UnsupportedFormatException extends Exception
{
    public function __construct(string $message = "Unsupported file format", int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
