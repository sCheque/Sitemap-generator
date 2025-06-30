# Sitemap-generator
Библиотека генерации карты сайта (sitemap.xml, .csv, .json) на чистом PHP с возможностью подключения через Composer.

В директории examples файл с примером использования

# Установка
Через Packagist:
composer require sCheque/sitemap-generator

 Быстрый пример использования
 ```php
require __DIR__ . '/vendor/autoload.php';

use Sitemap\SitemapGenerator;

$pages = [
    [
        'loc' => 'https://site.ru/',
        'lastmod' => '2024-12-14',
        'priority' => 1.0,
        'changefreq' => 'hourly'
    ],
    [
        'loc' => 'https://site.ru/news',
        'lastmod' => '2024-12-10',
        'priority' => 0.5,
        'changefreq' => 'daily'
    ]
];

$generator = new SitemapGenerator($pages, 'xml', __DIR__ . '/sitemaps/sitemap.xml');
$generator->generate();

echo "Sitemap created!";
```

Поддерживаемые форматы:
| Формат | Расширение | Пример использования                      |
|--------|------------|-------------------------------------------|
|XML     | .xml       |new SitemapGenerator($pages, 'xml', $path) |
|CSV     | .csv       |new SitemapGenerator($pages, 'csv', $path) |
|JSON    | .json      |new SitemapGenerator($pages, 'json', $path)|


Входной формат данных
```
[
  [
    'loc' => 'https://example.com/about',
    'lastmod' => '2024-06-30',
    'priority' => 0.5,
    'changefreq' => 'weekly'
  ],
  ...
]
```

