<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Title extends Component
{
    protected $attributes = [
        'component' => 'AppTitle',
    ];

    public function setTitle(?string $value = null): static
    {
        $this->attributes['attrs']['title'] = $value;

        return $this;
    }

    public function setIcon(?string $value = null): static
    {
        $this->attributes['attrs']['icon'] = $value;

        return $this;
    }

    public function setId(string | int | null $value = null): static
    {
        $this->attributes['attrs']['id'] = $value;

        return $this;
    }

    public function setData(?string $value = null): static
    {
        $this->attributes['data'] = $value;

        return $this;
    }

    public function setHelp(?string $value = null): static
    {
        $this->attributes['attrs']['help'] = $value;

        return $this;
    }
}
