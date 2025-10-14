<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Media extends Component
{
    protected $attributes = [
        'component' => 'AppMedia',
    ];

    public function setData(?array $value = null): static
    {
        $this->attributes['attrs']['data'] = $value;

        return $this;
    }

    public function setClass(?string $value = null): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }
}
