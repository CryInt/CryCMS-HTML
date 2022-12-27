<?php
namespace CryCMS;

class HTML extends HTMLAdditional
{
    public static $afterTag = PHP_EOL;

    public static $autoFramingContent = [
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