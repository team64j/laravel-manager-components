<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Panel extends Component
{
    protected $attributes = [
        'component' => 'AppPanel',
    ];

    public function setView(string $value): static
    {
        $this->attributes['attrs']['view'] = $value;

        return $this;
    }

    public function setViews(array $value): static
    {
        $this->attributes['attrs']['views'] = $value;

        return $this;
    }

    protected function clearAttributes(): void
    {
        if (!empty($this->attributes['attrs']['columns'])) {
            $this->attributes['attrs']['columns'] = array_map(
                fn($column) => array_filter($column),
                $this->attributes['attrs']['columns']
            );
        }

        parent::clearAttributes();
    }

    public function setId(?string $value = null): static
    {
        $this->attributes['attrs']['id'] = $value;

        return $this;
    }

    public function setModel(?string $value = null): static
    {
        $this->attributes['model'] = $value;

        return $this;
    }

    public function setData(?array $value = null): static
    {
        $this->attributes['attrs']['data'] = array_key_exists('data', $value) ? $value['data'] : $value;

        return $this;
    }

    public function setClass(?string $value = null): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }

    public function setRoute(string | array | null $value = null): static
    {
        $this->attributes['attrs']['route'] = $value;

        return $this;
    }

    public function setHistory(bool | string | null $value = null): static
    {
        $this->attributes['attrs']['history'] = $value;

        return $this;
    }

    public function setUrl(?string $value = null): static
    {
        $this->attributes['attrs']['url'] = $value;

        return $this;
    }

    public function addColumn(
        string | array $name,
        ?string $label = null,
        array $style = [],
        bool $sort = false,
        array $values = [],
        array $actions = [],
        bool $html = false,
        ?string $icon = null,
        bool $filter = false,
        bool $selectable = false,
        array | Component | null $component = null
    ): static {
        $data = get_defined_vars();

        if (is_array($data['name'])) {
            $data['key'] = $data['name'][1] ?? null;
            $data['name'] = $data['name'][0] ?? null;
        }

        if (!empty($style['width'])) {
            $data['width'] = $style['width'];
        }

        $this->attributes['attrs']['columns'][] = $data;

        return $this;
    }

    public function addColumnIcon(string $icon, ?string $label = null, array $style = []): static
    {
        $this->attributes['attrs']['columns'][] = get_defined_vars();

        return $this;
    }

    public function addColumnHandle(?string $label = null, array $style = []): static
    {
        $data = get_defined_vars();

        $data['icon'] = '<i class="icon fa fa-bars fa-fw draggable-handle"></i>';

        $this->attributes['attrs']['columns'][] = $data;

        return $this;
    }

    public function setColumns(?array $value = null): static
    {
        $this->attributes['attrs']['columns'] = array_is_list($value) ?
            array_map(fn($name) => is_array($name) ? $name : ['name' => $name], $value) : $value;

        return $this;
    }

    public function setSlotTop(?string $value = null): static
    {
        $this->attributes['slots']['top'] = $value;

        return $this;
    }

    public function isFilter(): static
    {
        $this->attributes['attrs']['filter'] = true;

        return $this;
    }

    public function isRerender(): static
    {
        $this->attributes['attrs']['rerender'] = true;

        return $this;
    }

    public function isDraggable(?string $value = null): static
    {
        $this->attributes['attrs']['draggable'] = is_null($value) ? true : $value;

        return $this;
    }

    public function setContextMenu(array $value): static
    {
        $this->attributes['attrs']['contextMenu'] = $value;

        return $this;
    }
}
