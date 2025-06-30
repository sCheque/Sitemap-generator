<?php

namespace Sitemap;

use Sitemap\Exception\InvalidSitemapDataException;
use Sitemap\Exception\UnsupportedFormatException;
use Sitemap\Writers\XMLWriter;
use Sitemap\Writers\JSONWriter;
use Sitemap\Writers\CSVWriter;

class SitemapGenerator
{
    protected array $pages;
    protected string $format;
    protected string $filePath;

    public function __construct(array $pages, string $format, string $filePath)
    {
        if (empty($pages)) {
            throw new InvalidSitemapDataException('Pages array cannot be empty');
        }

        foreach ($pages as $page) {
            if (!isset($page['loc'], $page['lastmod'], $page['priority'],$page['changefreq'])) {
                throw new InvalidSitemapDataException('Missing one or more required fields');
            }
        }

        $this->pages = $pages;
        $this->format = strtolower($format);
        $this->filePath = $filePath;

        $this->ensureDirectoryExists(dirname($filePath));
    }

    public function generate(): void
    {
        switch ($this->format) {
            case 'xml':
                new XMLWriter()->write($this->pages, $this->filePath);
                break;
            case 'csv':
                new CSVWriter()->write($this->pages, $this->filePath);
                break;
            case 'json':
                new JSONWriter()->write($this->pages, $this->filePath);
                break;
            default:
                throw new UnsupportedFormatException('Format not supported');
        }
    }

    protected function ensureDirectoryExists(string $dir): void
    {
        if(!is_dir($dir) && !mkdir($dir, 0775, true)) {
            throw new \RuntimeException('Cannot create directory ' . $dir);
        }
    }
}
