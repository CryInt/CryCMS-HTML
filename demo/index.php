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

echo HTML::icon('space-shuttle', 3);

echo HTML::a("GitHub", "https://github.com/CryInt/CryCMS-HTML", ['around' => ['_type' => 'div']]);

echo HTML::br();

echo HTML::tableGrid([
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

echo "W" . HTML::wbr() . "BR";

echo HTML::style("body { font-size: 14px; }");

$content = ob_get_clean();

echo $title = HTML::title("HTML DEMO PAGE");
echo $script = HTML::script('https://kit.fontawesome.com/b2478143fd.js', ['crossorigin' => 'anonymous']);

$body = HTML::body($content);

echo HTML::html($body);

echo "end";