<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class GlobalTab extends Component
{
    protected $attributes = [
        'component' => 'AppGlobalTab',
    ];

    public function setIcon(string $value): static
    {
        $this->attributes['attrs']['icon'] = $value;

        return $this;
    }

    public function setTitle(string $value): static
    {
        $this->attributes['attrs']['title'] = $value;

        return $this;
    }
}
