<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Tree extends Component
{
    protected $attributes = [
        'component' => 'AppTree',
    ];

    public function setId(string $value): static
    {
        $this->attributes['attrs']['id'] = $value;

        return $this;
    }

    public function setClass(string $value): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }

    public function setUrl(string $value): static
    {
        $this->attributes['attrs']['url'] = $value;

        return $this;
    }

    public function setRoute(string | array $value): static
    {
        $this->attributes['attrs']['route'] = $value;

        return $this;
    }

    public function setRouteList(string $value): static
    {
        $this->attributes['attrs']['routeList'] = $value;

        return $this;
    }

    public function setAliases(array $value): static
    {
        $this->attributes['attrs']['aliases'] = $value;

        return $this;
    }

    public function setIcons(array $value): static
    {
        $this->attributes['attrs']['icons'] = $value;

        return $this;
    }

    public function setTemplates(array $value): static
    {
        $this->attributes['attrs']['templates'] = $value;

        return $this;
    }

    public function setAppends(array $value): static
    {
        $this->attributes['attrs']['appends'] = $value;

        return $this;
    }

    public function setContextMenu(array $value): static
    {
        $this->attributes['attrs']['contextMenu'] = $value;

        return $this;
    }

    public function setMenu(array $value): static
    {
        $this->attributes['attrs']['menu'] = $value;

        return $this;
    }

    public function setSettings(array $value): static
    {
        $this->attributes['attrs']['settings'] = $value;

        return $this;
    }

    public function isCategory(): static
    {
        $this->attributes['attrs']['category'] = true;

        return $this;
    }

    public function isSearchable(): static
    {
        $this->attributes['attrs']['search'] = true;

        return $this;
    }
}
