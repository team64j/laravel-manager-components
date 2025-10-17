<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Media extends Component
{
    protected $attributes = [
        'component' => 'AppMedia',
    ];

    public function setData(?array $value = null): static
    {
        $this->attributes['attrs']['data'] = $value;

        return $this;
    }

    public function setClass(?string $value = null): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }

    public function setLabel(?string $value = null): static
    {
        $this->attributes['attrs']['label'] = $value;

        return $this;
    }

    public function setHelp(?string $value = null): static
    {
        $this->attributes['attrs']['help'] = $value;

        return $this;
    }
}
