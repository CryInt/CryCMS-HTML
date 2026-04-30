<?php
namespace CryCMS;

abstract class HTMLAdditional extends HTMLElements
{
    /**
     * @param string $name
     * @param array<int|string, string> $options = []
     * @param int|string|null $selected = null
     * @param array<string, mixed> $properties = []
     *
     * @return string
     */
    public static function selectOptions(
        string $name,
        array $options = [],
        int|string|null $selected = null,
        array $properties = []
    ): string
    {
        $optionsArray = [];
        foreach ($options as $optionKey => $optionTitle) {
            $prop = [];
            if ($optionKey === $selected) {
                $prop['selected'] = 'selected';
            }

            $optionsArray[] = HTMLElements::option($optionTitle, (string)$optionKey, $prop);
        }

        $optionsHTML = implode(PHP_EOL, $optionsArray);

        $properties['name'] = $name;

        return HTMLSimpleElements::select($optionsHTML, $properties);
    }

    /**
     * @param array<string, array<string|array<string, string>>> $contains
     * @param array<string, mixed> $properties
     *
     * @return string
     */
    public static function tableGrid(array $contains, array $properties = []): string
    {
        $content = '';

        foreach ($contains as $part => $data) {
            $content .= self::parseTablePart($part, $data);
        }

        return HTMLSimpleElements::table($content, $properties);
    }

    public static function faIcon(string $icon, int $size = 1, string $prefix = 'fas'): string
    {
        $class = [];
        $class[] = $prefix;
        $class[] = 'fa-' . $icon;
        $class[] = 'fa-' . $size . 'x';

        return HTML::i('', ['class' => implode(" ", $class)]);
    }

    /**
     * @param array<string|array<string, string>> $content
     * @param array<string, mixed> $properties = []
     *
     * @return string
     */
    public static function oList(array $content, array $properties = []): string
    {
        return HTML::ol(self::uoList($content), $properties);
    }

    /**
     * @param array<string|array<string, string>> $content
     * @param array<string, mixed> $properties = []
     *
     * @return string
     */
    public static function uList(array $content, array $properties = []): string
    {
        return HTML::ul(self::uoList($content), $properties);
    }

    public static function framingContent(string $content, ?string $with = null): string
    {
        if ($with === null) {
            $with = HTML::$afterTag;
        }

        return !empty($content) ? $with . $content . $with : $content;
    }
}