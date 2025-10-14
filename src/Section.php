<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

use Illuminate\Support\Arr;

class Section extends Component
{
    protected $attributes = [
        'component' => 'AppSection',
        'slots' => [
            'default' => [],
        ],
    ];

    public function setIcon(string $value): static
    {
        $this->attributes['attrs']['icon'] = $value;

        return $this;
    }

    public function setLabel(string $value): static
    {
        $this->attributes['attrs']['label'] = $value;

        return $this;
    }

    public function setClass(string $value): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }

    public function isExpanded(): static
    {
        $this->attributes['attrs']['expanded'] = true;

        return $this;
    }

    public function putSlot(string|array|Component | null $slot = null): static
    {
        $this->attributes['slots']['default'][] = Arr::wrap($slot);

        return $this;
    }

    public function setSlot(string|array|Component | null $slot = null): static
    {
        $this->attributes['slots']['default'] = Arr::wrap($slot);

        return $this;
    }
}
