<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Button extends Field
{
    protected $attributes = [
        'component' => 'AppInput',
        'attrs' => [
            'type' => 'button',
        ],
    ];
}
