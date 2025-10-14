<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Tab extends Component
{
    protected $attributes = [
        'component' => 'AppTab',
    ];

    public function setId(?string $value = null): static
    {
        $this->attributes['id'] = $value;

        return $this;
    }

    public function setName(?string $value = null): static
    {
        $this->attributes['name'] = $value;

        return $this;
    }

    public function setTitle(?string $value = null): static
    {
        $this->attributes['title'] = $value;

        return $this;
    }

    public function setIcon(?string $value = null): static
    {
        $this->attributes['icon'] = $value;

        return $this;
    }

    public function setClass(?string $value = null): static
    {
        $this->attributes['class'] = $value;

        return $this;
    }

    public function setRoute(string | array | null $value = null): static
    {
        $this->attributes['route'] = $value;

        return $this;
    }

    public function setSlot(array | Component | null $value): static
    {
        $this->attributes['slot'] = $value;

        return $this;
    }

    public function addSlot(array | Component $value): static
    {
        $this->attributes['slot'] = $value;

        return $this;
    }

    public function setPermissions(bool | array | string $value): static
    {
        $this->attributes['permissions'] = $value;

        return $this;
    }

    public function isNeedUpdate(bool $value = true): static
    {
        $this->attributes['needUpdate'] = $value;

        return $this;
    }
}
