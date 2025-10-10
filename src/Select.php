<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Select extends Field
{
    /**
     * @param string|null $model
     * @param string|null $label
     * @param string|null $help
     * @param string|null $class
     */
    public function __construct(
        ?string $model = null,
        ?string $label = null,
        ?string $help = null,
        ?string $class = null
    ) {
        $attributes = [
            'component' => 'AppSelect',
            'attrs' => [
                'label' => $label,
                'help' => $help,
                'class' => $class,
            ],
            'model' => $model,
        ];

        parent::__construct($attributes);
    }

    /**
     * @return $this
     */
    public function setMultiple(): static
    {
        $this->attributes['attrs']['multiple'] = true;

        return $this;
    }
}
