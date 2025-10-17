<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Select extends Field
{
    protected $attributes = [
        'component' => 'AppSelect',
    ];

    public function isMultiple(bool $value = true): static
    {
        $this->attributes['attrs']['multiple'] = $value;

        return $this;
    }

    public function isLoaded(bool $value = true): static
    {
        $this->attributes['attrs']['load'] = $value;

        return $this;
    }
}
