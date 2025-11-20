<?php

namespace Team64j\LaravelManagerComponents;

use Illuminate\Support\Arr;
use Ramsey\Uuid\Uuid;

class Grid extends Component
{
    protected $attributes = [
        'component' => 'AppGrid',
    ];

    public function setGap(string $value): static
    {
        $this->attributes['attrs']['gap'] = $value;

        return $this;
    }

    public function addArea(string | array | Component | null $slot, string | array | null $gridArea = null): static
    {
        $this->attributes['attrs']['gridAreas'][] = $gridArea;
        $this->attributes['slots']['grid_' . count($this->attributes['attrs']['gridAreas']) - 1] = Arr::wrap($slot);

        return $this;
    }
}
