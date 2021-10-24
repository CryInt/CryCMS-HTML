<?php
namespace CryCMS;

/**
 * + br
 * + div
 * + form
 */

class HTML
{
    public static function __callStatic($name, $arguments)
    {
        return 'HTML element "' . $name . '" is not exists';
    }

    public static function br(?array $properties = null): string
    {
        $propertiesIn = self::generateProperties($properties);
        $html = "<br" . $propertiesIn . ">";
        return self::generateAround($html, $properties);
    }

    public static function div(string $content, ?array $properties = null): string
    {
        $propertiesIn = self::generateProperties($properties);

        $html = "<div" . $propertiesIn . ">" . $content . "</div>";

        return self::generateAround($html, $properties);
    }

    public static function form(string $content, array $properties = null): string
    {
        $propertiesIn = self::generateProperties($properties);

        $html = "<form" . $propertiesIn . ">" . $content . "</form>";

        return self::generateAround($html, $properties);
    }

    public static function input(string $name, string $value = null, array $properties = null): string
    {
        if (!isset($properties['type'])) {
            $properties['type'] = 'text';
        }

        $properties['name'] = $name;
        $properties['value'] = $value ?? '';

        $propertiesIn = self::generateProperties($properties);

        $html = "<input" . $propertiesIn . ">";

        return self::generateAround($html, $properties);
    }

    protected static function generateAround(string $html, ?array $properties): string
    {
        if (isset($properties['around']) && is_array($properties['around'])) {
            foreach ($properties['around'] as $once) {
                if (isset($once['_type']) && method_exists(__CLASS__, $once['_type']) === true) {
                    $html = self::{$once['_type']}($html, $once);
                }
            }
        }

        return $html;
    }

    protected static function generateProperties($properties = null): string
    {
        $content = [];

        if (!empty($properties) && count($properties) > 0) {
            foreach ($properties as $key => $value) {
                if (empty($value) && $value !== '') {
                    continue;
                }

                if ($key === 'around' || $key === '_type') {
                    continue;
                }

                if (is_array($value)) {
                    $content[] = $key . '="' . implode(' ', $value) . '"';
                    continue;
                }

                if (is_object($value)) {
                    continue;
                }

                $content[] = $key . '="' . $value . '"';
            }
        }

        return (count($content) > 0 ? ' ' : '') . implode(" ", $content);
    }
}