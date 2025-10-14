<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Fluent;

/**
 * @template TKey of array-key
 * @template TValue
 */
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

    public function __call($method, $parameters)
    {
        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }

        $this->attributes['attrs'][$method] = count($parameters) > 0 ? array_first($parameters) : true;

        return $this;
    }

    /**
     * Dynamically retrieve the value of an attribute.
     *
     * @param  TKey  $key
     * @return TValue|null
     */
    public function __get($key)
    {
        return $this->value($key);
    }

    /**
     * Dynamically set the value of an attribute.
     *
     * @param  TKey  $key
     * @param  TValue  $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->offsetSet($key, $value);
    }

    /**
     * Set the value at the given offset.
     *
     * @param  TKey  $offset
     * @param  TValue  $value
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        $this->attributes['attrs'][$offset] = $value;
    }

    /**
     * Unset the value at the given offset.
     *
     * @param  TKey  $offset
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->attributes['attrs'][$offset]);
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
}
