<?php
namespace CryCMS;

/**
 * @method static div (string $content, array $properties = [])
 * @method static form (string $content, array $properties = [])
 * @method static h1 (string $content, array $properties = [])
 * @method static h2 (string $content, array $properties = [])
 * @method static h3 (string $content, array $properties = [])
 * @method static h4 (string $content, array $properties = [])
 * @method static h5 (string $content, array $properties = [])
 * @method static h6 (string $content, array $properties = [])
 * @method static select (string $optionsHTML, array $properties = [])
 * @method static table (string $content, array $properties = [])
 * @method static th (string $content, array $properties = [])
 * @method static thead (string $content, array $properties = [])
 * @method static tbody (string $content, array $properties = [])
 * @method static tr (string $content, array $properties = [])
 * @method static td (string $content, array $properties = [])
 * @method static tfoot (string $content, array $properties = [])
 * @method static textarea (string $text = '', array $properties = [])
 */

abstract class HTMLSimpleElements extends HTMLHelper
{
    protected static $simpleElements = [
        'div', 'form',
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
        'select',
        'table', 'tbody', 'td', 'tfoot', 'th', 'thead', 'tr',
        'textarea',
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