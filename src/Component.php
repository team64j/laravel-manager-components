<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Fluent;

abstract class Component extends Fluent
{
    protected $attributes = [
        'component' => 'AppComponent',
    ];

    public function __construct(?string $model = null, ?string $label = null, ?string $help = null)
    {
        parent::__construct(array_merge_recursive($this->attributes, [
            'model' => $model,
            'attrs' => [
                'label' => $label,
                'help' => $help,
            ],
        ]));
    }

    public static function make($attributes = null): static
    {
        return new static(...func_get_args());
    }

    public static function __callStatic($method, $parameters): static
    {
        return (new static)->$method(...$parameters);
    }

    public function toArray(): array
    {
        $this->checkPermissions();
        $this->clearAttributes();

        return parent::toArray();
    }

    public function toSlot(string $value): static
    {
        $this->attributes['slot'] = $value;

        return $this;
    }

    public function setAttribute(string $key, $value = null): static
    {
        $this->attributes['attrs'][$key] = $value;

        return $this;
    }

    protected function clearAttributes(): void
    {
        if (!empty($this->attributes['attrs'])) {
            $this->attributes['attrs'] = array_filter($this->attributes['attrs'], fn($i) => !is_null($i));
        }

        $this->attributes = array_filter($this->attributes, fn($i) => !is_null($i));
    }

    protected function checkPermissions(): void
    {
        $permissions = $this->attributes['permissions'] ?? $this->attributes['attrs']['permissions'] ?? true;

        if (!$this->hasPermissions($permissions)) {
            $this->attributes = [];
        }
    }

    protected function hasPermissions(bool | array | string $permissions = true): bool
    {
        if (is_bool($permissions)) {
            return $permissions;
        }

        if (is_string($permissions)) {
            return Gate::any(explode(',', $permissions));
        }

        return Gate::check($permissions);
    }

    public function setModel(?string $value): static
    {
        $this->attributes['model'] = $value;

        return $this;
    }
}
