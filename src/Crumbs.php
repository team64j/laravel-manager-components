<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Crumbs extends Component
{
    protected $attributes = [
        'component' => 'AppCrumbs',
    ];

    public function setData(?array $value = null): static
    {
        $this->attributes['attrs']['data'] = $value;

        return $this;
    }
}
