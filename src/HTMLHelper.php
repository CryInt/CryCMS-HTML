<?php
namespace CryCMS;

abstract class HTMLHelper
{
    protected static function generateAround(string $html, array $properties = []): string
    {
        if (
            isset($properties['around']['_type']) &&
            is_array($properties['around']) &&
            is_callable(__CLASS__, $properties['around']['_type']) === true
        ) {
            $html = HTML::{$properties['around']['_type']}($html, $properties['around']);
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

    protected static function removeDoubleAfterTag(string $string): string
    {
        if (!empty(HTML::$afterTag)) {
            return preg_replace('/' . HTML::$afterTag . '{2,}/', HTML::$afterTag, $string);
        }

        return $string;
    }

    protected static function parseTablePart(string $element, array $data = []): string
    {
        if (count($data) === 0) {
            return '';
        }

        $content = [];

        if ($element === 'caption') {
            return HTML::caption(
                $data['content'] ?? '',
                self::unsetReturn($data, 'content')
            );
        }

        foreach ($data as $once) {
            $tElement = $element === 'thead' ? 'th' : 'td';

            if (is_array($once)) {
                $content[] = HTML::$tElement(
                    $once['content'] ?? '',
                    self::unsetReturn($once, 'content')
                );
                continue;
            }

            $content[] = HTML::$tElement($once);
        }

        $content = implode(HTML::$afterTag, $content);
        $content = HTML::tr($content);

        return HTML::$element($content);
    }

    protected static function unsetReturn(array $array, string $unsetKey): array
    {
        if (array_key_exists($unsetKey, $array) !== false) {
            unset($array[$unsetKey]);
        }

        return $array;
    }
}