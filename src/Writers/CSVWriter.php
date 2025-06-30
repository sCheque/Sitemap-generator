<?php

namespace Sitemap\Writers;

use Sitemap\Exception\FileWriteException;

class CSVWriter
{
    public function write(array $pages, string $filePath)
    {
        $handle = fopen($filePath, 'w');

        if ($handle === false) {
            throw new FileWriteException('Cannot open file: ' . $filePath);
        }

        fputcsv($handle, ['loc', 'lastmod', 'priority', 'changefreq'], ';');
        foreach ($pages as $page) {
            fputcsv($handle, [
                $page['loc'],
                $page['lastmod'],
                $page['priority'],
                $page['changefreq'],
            ], ';');
        }

        fclose($handle);
    }
}