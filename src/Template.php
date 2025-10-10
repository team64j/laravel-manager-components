<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

use Illuminate\Support\Arr;

class Template extends Component
{
    /**
     * @param string|null $class
     * @param string|array|Component|null $slot
     */
    public function __construct(
        ?string $class = null,
        string|array|Component | null $slot = null
    ) {
        $attributes = [
            'component' => 'AppTemplate',
            'attrs' => [
                'class' => $class,
            ],
            'slots' => [
                'default' => Arr::wrap($slot),
            ],
        ];

        parent::__construct($attributes);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setClass(string $value): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }

    /**
     * @param string|array|Component|null $slot
     *
     * @return $this
     */
    public function putSlot(string|array|Component | null $slot = null): static
    {
        $this->attributes['slots']['default'][] = $slot;

        return $this;
    }

    /**
     * @param string|array|Component|null $slot
     *
     * @return $this
     */
    public function setSlot(string|array|Component | null $slot = null): static
    {
        $this->attributes['slots']['default'] = $slot;

        return $this;
    }
}
