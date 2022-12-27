<?php
namespace CryCMS;

abstract class HTMLElements extends HTMLSimpleElements
{
    public static function tag(
        string $tag,
        array $properties = [],
        bool $half = false,
        bool $withoutAfterTag = false
    ): string
    {
        if ($half) {
            return self::halfElement($tag, $properties);
        }

        $content = '';
        if (array_key_exists('content', $properties)) {
            $content = $properties['content'];
            unset($properties['content']);
        }

        return self::simpleElement(
            $tag,
            $content,
            $properties,
            $withoutAfterTag
        );
    }

    public static function a(
        string $content,
        string $href,
        array $properties = [],
        bool $withoutAfterTag = false
    ): string
    {
        return self::simpleElement(
            'a',
            $content,
            array_merge($properties, ['href' => $href]),
            $withoutAfterTag
        );
    }

    public static function img(
        string $src,
        array $properties = [],
        bool $withoutAfterTag = false
    ): string
    {
        $properties['src'] = $src;
        return self::halfElement('img', $properties, $withoutAfterTag);
    }

    public static function input(
        string $name,
        string $value = null,
        array $properties = [],
        bool $withoutAfterTag = false
    ): string
    {
        if (!isset($properties['type'])) {
            $properties['type'] = 'text';
        }

        $properties['name'] = $name;
        $properties['value'] = $value ?? '';

        $propertiesIn = self::generateProperties($properties);

        $html = "<input" . $propertiesIn . ">";
        $html .= ($withoutAfterTag) ? '' : HTML::$afterTag;

        return self::generateAround($html, $properties);
    }

    public static function link(
        string $href,
        string $rel = '',
        array $properties = [],
        bool $withoutAfterTag = false
    ): string
    {
        $properties['href'] = $href;

        if (!empty($rel)) {
            $properties['rel'] = $rel;
        }

        $propertiesIn = self::generateProperties($properties);

        $html = "<link" . $propertiesIn . ">";
        $html .= ($withoutAfterTag) ? '' : HTML::$afterTag;

        return self::generateAround($html, $properties);
    }

    public static function option(
        string $content,
        string $value,
        array $properties = [],
        bool $withoutAfterTag = false
    ): string
    {
        return self::simpleElement(
            'option',
            $content,
            array_merge($properties, ['value' => $value]),
            $withoutAfterTag
        );
    }

    public static function scriptSrc(
        string $src,
        array $properties = [],
        bool $withoutAfterTag = false
    ): string
    {
        return self::simpleElement(
            'script',
            '',
            array_merge($properties, ['src' => $src]),
            $withoutAfterTag
        );
    }
}