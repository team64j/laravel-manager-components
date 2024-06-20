<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Button extends Input
{
    public function __construct()
    {
        parent::__construct(...func_get_args());

        $this->attributes['attrs']['type'] = 'button';
    }
}
