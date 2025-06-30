<?php

namespace Sitemap\Exception;

use Exception;

class InvalidSitemapDataException extends Exception
{
    public function __construct(string $message = "Invalid sitemap data provided", int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
