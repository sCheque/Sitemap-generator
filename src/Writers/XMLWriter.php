<?php

namespace Sitemap\Writers;

use Sitemap\Exception\FileWriteException;

class XMLWriter
{
    public function write(array $pages, string $filePath): void
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        $urlset = $dom->createElement('urlset');
        $urlset->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $urlset->setAttribute(
            'xsi:schemaLocation',
            'http://www.sitemaps.org/schemas/sitemap/0.9 ' .
            'http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd'
        );

        foreach ($pages as $page) {
            $url = $dom->createElement('url');
            $url->appendChild($dom->createElement('loc', $page['loc']));
            $url->appendChild($dom->createElement('lastmod', $page['lastmod']));
            $url->appendChild($dom->createElement('priority', $page['priority']));
            $url->appendChild($dom->createElement('changefreq', $page['changefreq']));

            $urlset->appendChild($url);
        }

        $dom->appendChild($urlset);

        if($dom->save($filePath) === false) {
            throw new FileWriteException('Unable to write xml file to: ' . $filePath);
        }
    }
}