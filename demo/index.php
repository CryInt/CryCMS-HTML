<?php

use CryCMS\HTML;

require_once __DIR__ . '/../vendor/autoload.php';

echo HTML::h1('Header H1');
echo HTML::h2('Header H2');
echo HTML::h3('Header H3');
echo HTML::h4('Header H4');
echo HTML::h5('Header H5');
echo HTML::h6('Header H6');

echo HTML::a("GitHub", "https://github.com/CryInt/CryCMS-HTML", ['around' => ['_type' => 'div']]);

echo HTML::br();

echo HTML::tableGrid([
    'thead' => ['1', '2', '3'],
    'tbody' => ['C1', 'C2', 'C3'],
    'tfoot' => [
        [
            'content' => 'footer',
            'colspan' => '3',
        ],
    ],
], [
    'width' => '100%',
    'border' => '1',
]);