<?php
namespace CryCMS;

abstract class HTMLHelper
{
    /**
     * @param string $html
     * @param array<string, mixed> $properties = []
     *
     * @return string
     */
    protected static function generateAround(string $html, array $properties = []): string
    {
        if (
            array_key_exists('around', $properties) &&
            is_array($properties['around']) &&
            array_key_exists('_type', $properties['around']) &&
            is_callable([HTML::class, $properties['around']['_type']]) === true
        ) {
            $html = HTML::{$properties['around']['_type']}($html, $properties['around']);
        }

        return $html;
    }

    /**
     * @param array<string, mixed> $properties = []
     *
     * @return string
     */
    protected static function generateProperties(array $properties = []): string
    {
        $content = [];

        if (!empty($properties)) {
            foreach ($properties as $key => $value) {
                if (empty($value) && $value !== '' && $value !== '0' && $value !== 0) {
                    continue;
                }

                if ($key === 'around' || $key === '_type') {
                    continue;
                }

                if (is_array($value)) {
                    /** @var array<string> $value */
                    $content[] = $key . '="' . implode(' ', $value) . '"';
                    continue;
                }

                if (is_object($value)) {
                    continue;
                }

                if (is_bool($value)) {
                    $content[] = $key;
                    continue;
                }

                if (is_string($value)) {
                    $content[] = $key . '="' . $value . '"';
                }
            }
        }

        return (count($content) > 0 ? ' ' : '') . implode(" ", $content);
    }

    protected static function removeDoubleAfterTag(string $string): string
    {
        if (!empty(HTML::$afterTag)) {
            return preg_replace('/' . HTML::$afterTag . '{2,}/', HTML::$afterTag, $string) ?? '';
        }

        return $string;
    }

    /**
     * @param string $element
     * @param array<string|array<string, string>> $data
     *
     * @return string
     */
    protected static function parseTablePart(string $element, array $data = []): string
    {
        if (count($data) === 0) {
            return '';
        }

        $content = [];

        if ($element === 'caption') {
            /** @var array<string, string> $data */
            return HTML::caption(
                $data['content'] ?? '',
                self::unsetReturn($data, 'content')
            );
        }

        foreach ($data as $once) {
            $tElement = $element === 'thead' ? 'th' : 'td';

            if (is_array($once)) {
                /** @var array<string, string> $once */
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

    /**
     * @param array<string|array<string, string>> $data
     *
     * @return string
     */
    protected static function uoList(array $data): string
    {
        $content = [];

        foreach ($data as $once) {
            if (is_array($once)) {
                $content[] = HTML::li(
                    $once['content'] ?? '',
                    self::unsetReturn($once, 'content')
                );
                continue;
            }

            $content[] = HTML::li($once);
        }

        return implode(HTML::$afterTag, $content);
    }

    /**
     * @param array<string, mixed> $array
     * @param string $unsetKey
     *
     * @return array<string, mixed>
     */
    protected static function unsetReturn(array $array, string $unsetKey): array
    {
        if (array_key_exists($unsetKey, $array) !== false) {
            unset($array[$unsetKey]);
        }

        return $array;
    }
}