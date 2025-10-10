<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class File extends Field
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
            'component' => 'AppFile',
            'attrs' => [
                'label' => $label,
                'help' => $help,
                'class' => $class,
            ],
            'model' => $model,
        ];

        parent::__construct($attributes);
    }
}
