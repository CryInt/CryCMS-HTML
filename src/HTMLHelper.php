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

        foreach ($data as $once) {
            if (is_array($once)) {
                $c = $once['content'] ?? '';
                $p = $once;
                unset($p['content']);
                $content[] = $element === 'thead' ? HTML::th($c, $p) : HTML::td($c, $p);
                continue;
            }

            $content[] = $element === 'thead' ? HTML::th($once) : HTML::td($once);
        }

        $content = implode(HTML::$afterTag, $content);
        $content = HTML::tr($content);

        return HTML::$element($content);
    }
}