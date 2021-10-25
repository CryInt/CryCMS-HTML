<?php
namespace CryCMS;

/**
 * @method static address (string $content, array $properties = [])
 * @method static b (string $content, array $properties = [])
 * @method static body (string $content, array $properties = [])
 * @method static div (string $content, array $properties = [])
 * @method static form (string $content, array $properties = [])
 * @method static h1 (string $content, array $properties = [])
 * @method static h2 (string $content, array $properties = [])
 * @method static h3 (string $content, array $properties = [])
 * @method static h4 (string $content, array $properties = [])
 * @method static h5 (string $content, array $properties = [])
 * @method static h6 (string $content, array $properties = [])
 * @method static html (string $content, array $properties = [])
 * @method static i (string $content, array $properties = [])
 * @method static select (string $optionsHTML, array $properties = [])
 * @method static style (string $text = '', array $properties = [])
 * @method static sub (string $text = '', array $properties = [])
 * @method static summary (string $text = '', array $properties = [])
 * @method static sup (string $text = '', array $properties = [])
 * @method static table (string $content, array $properties = [])
 * @method static th (string $content, array $properties = [])
 * @method static thead (string $content, array $properties = [])
 * @method static tbody (string $content, array $properties = [])
 * @method static tr (string $content, array $properties = [])
 * @method static td (string $content, array $properties = [])
 * @method static tfoot (string $content, array $properties = [])
 * @method static textarea (string $text = '', array $properties = [])
 * @method static time (string $text = '', array $properties = [])
 * @method static title (string $text = '', array $properties = [])
 * @method static u (string $text = '', array $properties = [])
 * @method static ul (string $text = '', array $properties = [])
 * @method static var (string $text = '', array $properties = [])
 * @method static video (string $text = '', array $properties = [])
 */

abstract class HTMLSimpleElements extends HTMLHelper
{
    protected static $simpleElements = [
        'address',
        'b', 'body',
        'div',
        'form',
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'html',
        'i',
        'select', 'style', 'sub', 'summary', 'sup',
        'table', 'tbody', 'td', 'tfoot', 'th', 'thead', 'tr', 'textarea', 'time', 'title',
        'u', 'ul',
        'var', 'video',
    ];

    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, self::$simpleElements, true)) {
            return self::removeDoubleAfterTag(
                self::simpleElement($name, $arguments[0] ?? '', $arguments[1] ?? [])
            );
        }

        return 'HTML element "' . $name . '" is not exists';
    }

    protected static function simpleElement(string $element, string $content, array $properties = []): string
    {
        $propertiesIn = self::generateProperties($properties);
        $html = "<" . $element . $propertiesIn . ">" . HTML::$afterTag . $content . HTML::$afterTag . "</" . $element . ">" . HTML::$afterTag;
        return self::generateAround($html, $properties);
    }
}