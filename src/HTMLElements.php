<?php
namespace CryCMS;

abstract class HTMLElements extends HTMLSimpleElements
{
    /**
     * @param string $tag
     * @param array<string, mixed> $properties = []
     * @param bool $half
     * @param bool $withoutAfterTag
     *
     * @return string
     */
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
            if (is_string($properties['content'])) {
                $content = $properties['content'];
            }

            unset($properties['content']);
        }

        return self::simpleElement(
            $tag,
            $content,
            $properties,
            $withoutAfterTag
        );
    }

    /**
     * @param string $content
     * @param string $href
     * @param array<string, mixed> $properties = []
     * @param bool $withoutAfterTag
     *
     * @return string
     */
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

    /**
     * @param string $src
     * @param array<string, mixed> $properties = []
     * @param bool $withoutAfterTag
     *
     * @return string
     */
    public static function img(
        string $src,
        array $properties = [],
        bool $withoutAfterTag = false
    ): string
    {
        $properties['src'] = $src;
        return self::halfElement('img', $properties, $withoutAfterTag);
    }

    /**
     * @param string $name
     * @param string|null $value
     * @param array<string, mixed> $properties = []
     * @param bool $withoutAfterTag
     *
     * @return string
     */
    public static function input(
        string $name,
        ?string $value = null,
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

    /**
     * @param string $href
     * @param string $rel
     * @param array<string, mixed> $properties = []
     * @param bool $withoutAfterTag
     * @return string
     */
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

    /**
     * @param string $content
     * @param string $value
     * @param array<string, mixed> $properties = []
     * @param bool $withoutAfterTag
     *
     * @return string
     */
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

    /**
     * @param string $src
     * @param array<string, mixed> $properties = []
     * @param bool $withoutAfterTag
     * @return string
     */
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