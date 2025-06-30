<?php

require __DIR__ . '/../vendor/autoload.php';

use Sitemap\SitemapGenerator;

$pages = [
    ['loc' => 'https://site.ru', 'lastmod' => '2020-12-14', 'priority' => 1.0, 'changefreq' => 'hourly'],
    ['loc' => 'https://site.ru/news', 'lastmod' => '2020-12-10', 'priority' => 0.5, 'changefreq' => 'daily'],
    ['loc' => 'https://site.ru/about', 'lastmod' => '2020-12-07', 'priority' => 0.1, 'changefreq' => 'weekly'],
    ['loc' => 'https://site.ru/products', 'lastmod' => '2020-12-12', 'priority' => 0.5, 'changefreq' => 'weekly'],
    ['loc' => 'https://site.ru/ps5', 'lastmod' => '2020-12-11', 'priority' => 0.1, 'changefreq' => 'weekly'],
    ['loc' => 'https://site.ru/xbox', 'lastmod' => '2020-12-12', 'priority' => 0.1, 'changefreq' => 'weekly'],
    ['loc' => 'https://site.ru/wii', 'lastmod' => '2020-12-11', 'priority' => 0.1, 'changefreq' => 'weekly'],
];

$format = 'xml';
$output = __DIR__ . '/../output/sitemap.xml';

$generator = new SitemapGenerator($pages, $format, $output);

try {
    $generator->generate();
    echo 'Sitemap generated!';
} catch (Throwable $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
