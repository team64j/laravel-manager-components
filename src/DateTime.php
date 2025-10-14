<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class DateTime extends Field
{
    protected $attributes = [
        'component' => 'AppDatetime',
    ];

    public function isClear(): static
    {
        $this->attributes['attrs']['clear'] = true;

        return $this;
    }
}
