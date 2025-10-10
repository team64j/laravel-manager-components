<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Crumbs extends Component
{
    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $attributes = [
            'component' => 'AppCrumbs',
            'attrs' => [
                'data' => $attributes['data'] ?? [],
            ],
        ];

        parent::__construct($attributes);
    }

    /**
     * @param array|null $value
     *
     * @return $this
     */
    public function setData(?array $value = null): static
    {
        $this->attributes['attrs']['data'] = $value;

        return $this;
    }
}
