<?php

namespace Sitemap\Exception;

use Exception;

class FileWriteException extends Exception
{
    public function __construct(string $message = "Unable to write file", int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
