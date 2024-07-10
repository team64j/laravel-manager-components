<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Fluent;

abstract class Component extends Fluent
{
    /**
     * @return static
     */
    public static function make(): static
    {
        return new static(...func_get_args());
    }

    /**
     * @param $method
     * @param $parameters
     *
     * @return static
     */
    public static function __callStatic($method, $parameters): static
    {
        return (new static)->$method(...$parameters);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $this->checkPermissions();
        $this->clearAttributes();

        return parent::toArray();
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function toSlot(string $value): static
    {
        $this->attributes['slot'] = $value;

        return $this;
    }

    /**
     * @param string $key
     * @param null $value
     *
     * @return $this
     */
    public function setAttribute(string $key, $value = null): static
    {
        $this->attributes['attrs'][$key] = $value;

        return $this;
    }

    /**
     * @return void
     */
    protected function clearAttributes(): void
    {
        if (!empty($this->attributes['attrs'])) {
            $this->attributes['attrs'] = array_filter($this->attributes['attrs'], fn($i) => !is_null($i));
        }

        $this->attributes = array_filter($this->attributes, fn($i) => !is_null($i));
    }

    /**
     * @return void
     */
    protected function checkPermissions(): void
    {
        $permissions = $this->attributes['permissions'] ?? $this->attributes['attrs']['permissions'] ?? true;

        if (!$this->hasPermissions($permissions)) {
            $this->attributes = [];
        }
    }

    /**
     * @param mixed $cond
     * @param callable|null $callableIf
     * @param callable|null $callableElse
     *
     * @return $this
     */
    public function when(mixed $cond, callable $callableIf = null, callable $callableElse = null): static
    {
        if ($cond && $callableIf instanceof Closure) {
            return $callableIf($this);
        }

        if ($callableElse instanceof Closure) {
            return $callableElse($this);
        }

        return $this;
    }

    /**
     * @param bool|array|string $permissions
     *
     * @return bool
     */
    protected function hasPermissions(bool|array|string $permissions = true): bool
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
