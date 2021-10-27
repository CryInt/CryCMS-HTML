<?php
use CryCMS\HTML;
require_once __DIR__ . '/../vendor/autoload.php';

ob_start();

echo HTML::h1('Header H1');
echo HTML::h2('Header H2');
echo HTML::h3('Header H3');
echo HTML::h4('Header H4');
echo HTML::h5('Header H5');
echo HTML::h6('Header H6');

echo HTML::faIcon('space-shuttle', 3);

echo HTML::a("GitHub", "https://github.com/CryInt/CryCMS-HTML", ['around' => ['_type' => 'div']]);

echo HTML::br();

echo HTML::tableGrid([
    'caption' => [
        'content' => 'TEST TABLE',
    ],
    'thead' => [
        ['content' => '1', 'id' => 'first', 'class' => 'header'],
        '2',
        '3' . HTML::sub('log'),
    ],
    'tbody' => ['C1', 'C2', 'C3'],
    'tfoot' => [
        [
            'content' => 'footer' . HTML::sup(2),
            'colspan' => '3',
        ],
    ],
], [
    'width' => '100%',
    'border' => '1',
]);

echo HTML::div("W" . HTML::wbr() . "BR");

echo HTML::oList([
    ['content' => 'first', 'id' => 'first_id'],
    '2',
    '3',
    '4',
], [
    'data-test' => 'ol-list',
]);

echo HTML::uList([
    '1',
    '2',
    '3',
    ['content' => 'last', 'class' => 'lastElement'],
], [
    'data-test' => 'ul-list',
]);

echo HTML::strong("STRONG");
echo HTML::style("body { font-size: 14px; }");

$content = ob_get_clean();

$title = HTML::title("HTML DEMO PAGE");
$script = HTML::scriptSrc('https://kit.fontawesome.com/b2478143fd.js', ['crossorigin' => 'anonymous']);
$link = HTML::link('/demo/demo.css', 'stylesheet');
$meta = HTML::meta(['charset' => 'utf-8']);

$body = HTML::body($content);

$body = HTML::head($title . $meta . $link . $script) . $body;

echo HTML::html($body);

echo "end";