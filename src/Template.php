<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Template extends Component
{
    protected $attributes = [
        'component' => 'AppTemplate',
    ];

    public function setClass(string $value): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }

    public function putSlot(string | array | Component | null $slot = null): static
    {
        $this->attributes['slots']['default'][] = $slot;

        return $this;
    }

    public function setSlot(string | array | Component | null $slot = null): static
    {
        $this->attributes['slots']['default'] = $slot;

        return $this;
    }
}
