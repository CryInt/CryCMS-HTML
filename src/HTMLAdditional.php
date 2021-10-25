<?php
namespace CryCMS;

abstract class HTMLAdditional extends HTMLElements
{
    public static function selectOptions(string $name, array $options = [], string $selected = null, array $properties = []): string
    {
        $optionsArray = [];
        foreach ($options as $optionKey => $optionTitle) {
            $prop = [];
            if ($optionKey === $selected) {
                $prop['selected'] = 'selected';
            }

            $optionsArray[] = HTMLElements::option($optionTitle, $optionKey, $prop);
        }

        $optionsHTML = implode(PHP_EOL, $optionsArray);

        $properties['name'] = $name;

        return HTMLSimpleElements::select($optionsHTML, $properties);
    }

    public static function tableGrid(array $contains, array $properties = []): string
    {
        $content = '';

        foreach ($contains as $part => $data) {
            $content .= self::parseTablePart($part, $data);
        }

        return HTMLSimpleElements::table($content, $properties);
    }
}