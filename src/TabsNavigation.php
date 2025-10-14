<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class TabsNavigation extends Component
{
    protected $attributes = [
        'component' => 'AppNavigation',
    ];

    public function setId(?string $value = null): static
    {
        $this->attributes['attrs']['id'] = $value;

        return $this;
    }

    public function setUid(?string $value = null): static
    {
        $this->attributes['attrs']['uid'] = $value;

        return $this;
    }

    public function setClass(?string $value = null): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }

    public function setData(?array $value = null): static
    {
        $this->attributes['attrs']['data'] = $value;

        return $this;
    }

    public function setHistory(string | bool | null $value = null): static
    {
        $this->attributes['attrs']['history'] = $value;

        return $this;
    }

    public function isVertical(): static
    {
        $this->attributes['attrs']['vertical'] = true;

        return $this;
    }

    public function isSmallTabs(): static
    {
        $this->attributes['attrs']['smallTabs'] = true;

        return $this;
    }

}
