<?php

namespace Team64j\LaravelManagerComponents;

use Illuminate\Support\Arr;

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

    public function addArea(string | array | Component | null $slot, string | array $gridArea): static
    {
        $this->attributes['attrs']['gridAreas'][] = $gridArea;
        $this->attributes['slots']['grid_' . count($this->attributes['attrs']['gridAreas']) - 1] = Arr::wrap($slot);

        //        $this->attributes['attrs']['data'][] = [
        //            'slot' => $slot,
        //            'gridArea' => $gridArea,
        //        ];

        return $this;
    }
}
