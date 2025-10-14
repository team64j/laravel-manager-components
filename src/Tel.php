<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Tel extends Field
{
    protected $attributes = [
        'component' => 'AppInput',
        'attrs' => [
            'type' => 'tel',
        ],
    ];
}
