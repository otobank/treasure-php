<?php

$finder = new PhpCsFixer\Finder();

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false,
        ],
        'no_null_property_initialization' => false,
    ])
    ->setFinder($finder)
;
