<?php
/*
 * This document has been generated with
 * https://mlocati.github.io/php-cs-fixer-configurator/#version:2.15|configurator
 * you can change this configuration by importing this file.
 */

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setLineEnding("\r\n")
    ->setRules([
        '@Symfony' => true,
        '@PSR2' => true,
        '@PhpCsFixer' => true,
        'not_operator_with_successor_space' => false,
        'combine_consecutive_issets' => true,
        'array_syntax' => ['syntax' => 'short'],
        'no_superfluous_phpdoc_tags' => false,
        'binary_operator_spaces' => ['align_double_arrow' => true],
        'braces' => ['allow_single_line_closure' => true],
        'class_definition' => ['single_line' => true],
        'increment_style' => ['style' => 'post'],
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'blank_line_before_statement' => ['statements' => ['return', 'throw']],
        'blank_line_after_opening_tag' => true,
        'ordered_imports' => ['sort_algorithm' => 'length'],
        'php_unit_method_casing' => ['case' => 'snake_case'],
        'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->exclude('vendor')
        ->in(__DIR__)
    )
;