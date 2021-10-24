<?php
namespace CryCMS;

class HTML
{
    protected static $simpleElements = [
        'div', 'form', 'select',
    ];

    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, self::$simpleElements, true)) {
            return self::simpleElement($name, $arguments[0] ?? '', $arguments[1] ?? []);
        }

        return 'HTML element "' . $name . '" is not exists';
    }

    public static function a(string $content, string $href, array $properties = []): string
    {
        return self::simpleElement('a', $content, array_merge($properties, ['href' => $href]));
    }

    public static function br(array $properties = []): string
    {
        $propertiesIn = self::generateProperties($properties);
        $html = "<br" . $propertiesIn . ">";
        return self::generateAround($html, $properties);
    }

    public static function input(string $name, string $value = null, array $properties = []): string
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

    public static function option(string $content, string $value, array $properties = []): string
    {
        return self::simpleElement('option', $content, array_merge($properties, ['value' => $value]));
    }

    protected static function simpleElement(string $element, string $content, array $properties = []): string
    {
        $propertiesIn = self::generateProperties($properties);
        $html = "<" . $element . $propertiesIn . ">" . $content . "</" . $element . ">";
        return self::generateAround($html, $properties);
    }

    protected static function generateAround(string $html, array $properties = []): string
    {
        if (
            isset($properties['around']['_type']) &&
            is_array($properties['around']) &&
            is_callable(__CLASS__, $properties['around']['_type']) === true
        ) {
            $html = self::{$properties['around']['_type']}($html, $properties['around']);
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