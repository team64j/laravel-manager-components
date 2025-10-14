<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Select extends Field
{
    protected $attributes = [
        'component' => 'AppSelect',
    ];

    public function setMultiple(): static
    {
        $this->attributes['attrs']['multiple'] = true;

        return $this;
    }
}
