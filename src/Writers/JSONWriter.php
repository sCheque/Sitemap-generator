<?php

namespace Sitemap\Writers;

use Sitemap\Exception\FileWriteException;

class JSONWriter
{
    public function write(array $pages, string $filePath): void
    {
        $json = json_encode($pages, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        if ($json === false) {
            throw new FileWriteException("Could not encode JSON" . json_last_error_msg());
        }

        if (file_put_contents($filePath, $json) === false) {
            throw new FileWriteException("Could not write JSON to file: " . $filePath);
        }
    }
}