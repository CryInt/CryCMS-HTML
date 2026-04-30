<?php
namespace CryCMS;

class HTML extends HTMLAdditional
{
    public static string $afterTag = PHP_EOL;

    /** @var array<int, string> */
    public static array $autoFramingContent = [
        'html',
        'head',
        'body',
        'table',
        'thead',
        'tbody',
        'tfoot',
        'tr',
        'ol',
        'ul',
        'select'
    ];
}