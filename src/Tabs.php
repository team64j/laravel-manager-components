<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Tabs extends Component
{
    protected $attributes = [
        'component' => 'AppTabs',
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

    public function setNavigation(?bool $value = null): static
    {
        $this->attributes['attrs']['navigation'] = $value ?? true;

        return $this;
    }

    public function isWatch(): static
    {
        $this->attributes['attrs']['watch'] = true;

        return $this;
    }

    public function isLoadOnce(): static
    {
        $this->attributes['attrs']['loadOnce'] = true;

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

    public function isHiddenTabs(): static
    {
        $this->attributes['attrs']['hiddenTabs'] = true;

        return $this;
    }

    public function addTab(
        string $id,
        ?string $name = null,
        ?string $icon = null,
        ?string $class = null,
        bool | array | string $permissions = true,
        string | array | null $route = null,
        ?string $title = null,
        array | Component | null $slot = null,
        bool $needUpdate = false
    ): static {
        $tab = Tab::make()
            ->setId($id)
            ->setName($name)
            ->setIcon($icon)
            ->setClass($class)
            ->setPermissions($permissions)
            ->setRoute($route)
            ->setTitle($title)
            ->setSlot($slot)
            ->isNeedUpdate($needUpdate)
            ->toArray();

        if (!$this->hasTab($id)) {
            $this->attributes['attrs']['data'][] = $tab;
        }

        if (!empty($tab['slot'])) {
            $this->attributes['slots'][$id] = $tab['slot'];
            unset($tab['slot']);
        }

        return $this;
    }

    protected function clearAttributes(): void
    {
        parent::clearAttributes();

        foreach ($this->attributes['attrs']['data'] ?? [] as $key => $value) {
            if (isset($this->attributes['attrs']['data'][$key]['slot'])) {
                unset($this->attributes['attrs']['data'][$key]['slot']);
            }

            if (isset($this->attributes['attrs']['data'][$key]['permissions'])) {
                unset($this->attributes['attrs']['data'][$key]['permissions']);
            }
        }
    }

    public function setTabs(array $data): static
    {
        $this->attributes['attrs']['data'] = $data;

        return $this;
    }

    public function removeTab(string $id): static
    {
        if ($this->hasTab($id)) {
            $this->attributes['attrs']['data'] = array_filter(
                $this->attributes['attrs']['data'],
                fn($item) => $item['id'] != $id
            );
        }

        if ($this->hasSlot($id)) {
            unset($this->attributes['slots'][$id]);
        }

        return $this;
    }

    public function hasTab(string $id): bool
    {
        return in_array($id, array_column($this->attributes['attrs']['data'] ?? [], 'id'), true);
    }

    public function addSlot(string $id, array | Component $data = [], bool | array | string $permissions = true): static
    {
        if ($this->hasPermissions($permissions)) {
            $this->attributes['slots'][$id] ??= $data;
        }

        return $this;
    }

    public function putSlot(string $id, array | Component $data = [], bool | array | string $permissions = true): static
    {
        if ($this->hasPermissions($permissions)) {
            $this->attributes['slots'][$id][] = $data;
        }

        return $this;
    }

    public function setSlots(array $data, bool | array | string $permissions = true): static
    {
        if ($this->hasPermissions($permissions)) {
            $this->attributes['slots'] = $data;
        }

        return $this;
    }

    public function hasSlot(string $id): bool
    {
        return !empty($this->attributes['slots'][$id]);
    }
}
