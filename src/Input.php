<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Input extends Field
{
    /**
     * @param string|null $model
     * @param string|null $label
     * @param string|null $help
     * @param string|null $class
     */
    public function __construct(
        string $model = null,
        string $label = null,
        string $help = null,
        string $class = null
    ) {
        parent::__construct([
            'component' => 'AppInput',
            'attrs' => get_defined_vars(),
            'model' => $model,
        ]);
    }
}
