<?php
namespace CryCMS;

/**
 * Simple Elements
 *
 * @method static abbr (string $content, array $properties = [])
 * @method static address (string $content, array $properties = [])
 * @method static article (string $content, array $properties = [])
 * @method static aside (string $content, array $properties = [])
 * @method static audio (string $content, array $properties = [])
 * @method static b (string $content, array $properties = [])
 * @method static bdo (string $content, array $properties = [])
 * @method static body (string $content, array $properties = [])
 * @method static blockquote (string $content, array $properties = [])
 * @method static button (string $content, array $properties = [])
 * @method static canvas (string $content, array $properties = [])
 * @method static caption (string $content, array $properties = [])
 * @method static cite (string $content, array $properties = [])
 * @method static code (string $content, array $properties = [])
 * @method static colgroup (string $content, array $properties = [])
 * @method static datalist (string $content, array $properties = [])
 * @method static dd (string $content, array $properties = [])
 * @method static del (string $content, array $properties = [])
 * @method static details (string $content, array $properties = [])
 * @method static dl (string $content, array $properties = [])
 * @method static dt (string $content, array $properties = [])
 * @method static dfn (string $content, array $properties = [])
 * @method static div (string $content, array $properties = [])
 * @method static em (string $content, array $properties = [])
 * @method static fieldset (string $content, array $properties = [])
 * @method static figcaption (string $content, array $properties = [])
 * @method static figure (string $content, array $properties = [])
 * @method static form (string $content, array $properties = [])
 * @method static footer (string $content, array $properties = [])
 * @method static h1 (string $content, array $properties = [])
 * @method static h2 (string $content, array $properties = [])
 * @method static h3 (string $content, array $properties = [])
 * @method static h4 (string $content, array $properties = [])
 * @method static h5 (string $content, array $properties = [])
 * @method static h6 (string $content, array $properties = [])
 * @method static head (string $content, array $properties = [])
 * @method static header (string $content, array $properties = [])
 * @method static hgroup (string $content, array $properties = [])
 * @method static html (string $content, array $properties = [])
 * @method static i (string $content, array $properties = [])
 * @method static iframe (string $content, array $properties = [])
 * @method static ins (string $content, array $properties = [])
 * @method static kbd (string $content, array $properties = [])
 * @method static label (string $content, array $properties = [])
 * @method static legend (string $content, array $properties = [])
 * @method static li (string $content, array $properties = [])
 * @method static listing (string $content, array $properties = [])
 * @method static main (string $content, array $properties = [])
 * @method static map (string $content, array $properties = [])
 * @method static mark (string $content, array $properties = [])
 * @method static meter (string $content, array $properties = [])
 * @method static nav (string $content, array $properties = [])
 * @method static noscript (string $content, array $properties = [])
 * @method static object (string $content, array $properties = [])
 * @method static ol (string $content, array $properties = [])
 * @method static optgroup (string $content, array $properties = [])
 * @method static output (string $content, array $properties = [])
 * @method static p (string $content, array $properties = [])
 * @method static pre (string $content, array $properties = [])
 * @method static progress (string $content, array $properties = [])
 * @method static q (string $content, array $properties = [])
 * @method static rp (string $content, array $properties = [])
 * @method static rt (string $content, array $properties = [])
 * @method static ruby (string $content, array $properties = [])
 * @method static s (string $optionsHTML, array $properties = [])
 * @method static samp (string $optionsHTML, array $properties = [])
 * @method static select (string $optionsHTML, array $properties = [])
 * @method static script (string $text = '', array $properties = [])
 * @method static strong (string $text = '', array $properties = [])
 * @method static style (string $text = '', array $properties = [])
 * @method static sub (string $text = '', array $properties = [])
 * @method static summary (string $text = '', array $properties = [])
 * @method static sup (string $text = '', array $properties = [])
 * @method static table (string $content, array $properties = [])
 * @method static th (string $content, array $properties = [])
 * @method static thead (string $content, array $properties = [])
 * @method static tbody (string $content, array $properties = [])
 * @method static tr (string $content, array $properties = [])
 * @method static td (string $content, array $properties = [])
 * @method static tfoot (string $content, array $properties = [])
 * @method static textarea (string $text = '', array $properties = [])
 * @method static time (string $text = '', array $properties = [])
 * @method static title (string $text = '', array $properties = [])
 * @method static u (string $text = '', array $properties = [])
 * @method static ul (string $text = '', array $properties = [])
 * @method static var (string $text = '', array $properties = [])
 * @method static video (string $text = '', array $properties = [])
 *
 * Half Elements
 *
 * @method static area (array $properties = [])
 * @method static base (array $properties = [])
 * @method static br (array $properties = [])
 * @method static col (array $properties = [])
 * @method static embed (array $properties = [])
 * @method static hr (array $properties = [])
 * @method static meta (array $properties = [])
 * @method static param (array $properties = [])
 * @method static track (array $properties = [])
 * @method static wbr (array $properties = [])
 */

abstract class HTMLSimpleElements extends HTMLHelper
{
    protected static $simpleElements = [
        'abbr', 'address', 'article', 'aside', 'audio',
        'b', 'bdo', 'body', 'blockquote', 'button',
        'canvas', 'caption', 'cite', 'code', 'colgroup',
        'datalist', 'dd', 'del', 'details', 'dfn', 'div', 'dl', 'dt',
        'em',
        'fieldset', 'figcaption', 'figure', 'form', 'footer',
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'html',
        'i', 'iframe', 'ins',
        'kbd',
        'label', 'legend', 'li', 'listing',
        'main', 'map', 'mark', 'meter',
        'nav', 'noscript',
        'object', 'ol', 'optgroup', 'output',
        'p', 'pre', 'progress',
        'q',
        'rp', 'rt', 'ruby',
        's', 'samp', 'select', 'script', 'strong', 'style', 'sub', 'summary', 'sup',
        'table', 'tbody', 'td', 'tfoot', 'th', 'thead', 'tr', 'textarea', 'time', 'title',
        'u', 'ul',
        'var', 'video',
    ];

    protected static $halfElements = [
        'area',
        'base', 'br',
        'col',
        'embed',
        'hr',
        'meta',
        'param',
        'track',
        'wbr',
    ];

    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, self::$simpleElements, true)) {
            return self::removeDoubleAfterTag(
                self::simpleElement($name, $arguments[0] ?? '', $arguments[1] ?? [])
            );
        }

        if (in_array($name, self::$halfElements, true)) {
            return self::removeDoubleAfterTag(
                self::halfElement($name, $arguments[0] ?? [])
            );
        }

        return 'HTML element "' . $name . '" is not exists';
    }

    protected static function simpleElement(string $element, string $content, array $properties = []): string
    {
        $propertiesIn = self::generateProperties($properties);
        $content = !empty($content) ? HTML::$afterTag . $content . HTML::$afterTag : $content;
        $html = "<" . $element . $propertiesIn . ">" . $content . "</" . $element . ">" . HTML::$afterTag;
        return self::generateAround($html, $properties);
    }

    protected static function halfElement(string $element, array $properties = []): string
    {
        $propertiesIn = self::generateProperties($properties);
        $html = "<" . $element . $propertiesIn . ">" . HTML::$afterTag;
        return self::generateAround($html, $properties);
    }
}