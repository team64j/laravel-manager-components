<?php

namespace Team64j\LaravelManagerComponents;

class Alert extends Component
{
    protected $attributes = [
        'component' => 'AppAlert',
    ];

    public function setType(string $type): static
    {
        $this->attributes['attrs']['type'] = $type;

        return $this;
    }

    public function setSlot(string | array | Component | null $slot = null): static
    {
        $this->attributes['slots']['default'] = $slot;

        return $this;
    }
}
