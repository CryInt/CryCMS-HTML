<?php
namespace CryCMS;

abstract class HTMLElements extends HTMLSimpleElements
{
    public static function a(string $content, string $href, array $properties = []): string
    {
        return self::simpleElement('a', $content, array_merge($properties, ['href' => $href]));
    }

    public static function input(string $name, string $value = null, array $properties = []): string
    {
        if (!isset($properties['type'])) {
            $properties['type'] = 'text';
        }

        $properties['name'] = $name;
        $properties['value'] = $value ?? '';

        $propertiesIn = self::generateProperties($properties);

        $html = "<input" . $propertiesIn . ">" . HTML::$afterTag;

        return self::generateAround($html, $properties);
    }

    public static function option(string $content, string $value, array $properties = []): string
    {
        return self::simpleElement('option', $content, array_merge($properties, ['value' => $value]));
    }

    public static function script(string $src, array $properties = []): string
    {
        $propertiesIn = self::generateProperties($properties);
        $html = "<script src='" . $src . "'" . $propertiesIn . "></script>" . HTML::$afterTag;
        return self::generateAround($html, $properties);
    }
}