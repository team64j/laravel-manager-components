<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class Panel extends Component
{
    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $attributes = [
            'component' => 'AppPanel',
            'attrs' => [
                'id' => $data['id'] ?? null,
                'history' => $data['history'] ?? null,
                'data' => $data['data'] ?? null,
                'columns' => $data['columns'] ?? null,
                'route' => $data['route'] ?? null,
            ],
            'data' => $data['model'] ?? null,
        ];

        parent::__construct($attributes);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setView(string $value): static
    {
        $this->attributes['attrs']['view'] = $value;

        return $this;
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setViews(array $value): static
    {
        $this->attributes['attrs']['views'] = $value;

        return $this;
    }

    /**
     * @return void
     */
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

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setId(string $value = null): static
    {
        $this->attributes['attrs']['id'] = $value;

        return $this;
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setModel(string $value = null): static
    {
        $this->attributes['model'] = $value;

        return $this;
    }

    /**
     * @param array|null $value
     *
     * @return $this
     */
    public function setData(array $value = null): static
    {
        $this->attributes['attrs']['data'] = array_key_exists('data', $value) ? $value['data'] : $value;

        return $this;
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setClass(string $value = null): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }

    /**
     * @param string|array|null $value
     *
     * @return $this
     */
    public function setRoute(string|array $value = null): static
    {
        $this->attributes['attrs']['route'] = $value;

        return $this;
    }

    /**
     * @param bool|string|null $value
     *
     * @return $this
     */
    public function setHistory(bool|string $value = null): static
    {
        $this->attributes['attrs']['history'] = $value;

        return $this;
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setUrl(string $value = null): static
    {
        $this->attributes['attrs']['url'] = $value;

        return $this;
    }

    /**
     * @param string|array $name
     * @param string|null $label
     * @param array $style
     * @param bool $sort
     * @param array $values
     * @param array $actions
     * @param array|false $html
     * @param string|null $icon
     * @param bool $filter
     * @param bool $selectable
     * @param array|Component|null $component
     *
     * @return $this
     */
    public function addColumn(
        string | array $name,
        string $label = null,
        array $style = [],
        bool $sort = false,
        array $values = [],
        array $actions = [],
        bool $html = false,
        string $icon = null,
        bool $filter = false,
        bool $selectable = false,
        array|Component $component = null
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

    /**
     * @param string $icon
     * @param string|null $label
     * @param array $style
     *
     * @return $this
     */
    public function addColumnIcon(string $icon, string $label = null, array $style = []): static
    {
        $this->attributes['attrs']['columns'][] = get_defined_vars();

        return $this;
    }

    /**
     * @param string|null $label
     * @param array $style
     *
     * @return $this
     */
    public function addColumnHandle(string $label = null, array $style = []): static
    {
        $data = get_defined_vars();

        $data['icon'] = '<i class="icon fa fa-bars fa-fw draggable-handle"></i>';

        $this->attributes['attrs']['columns'][] = $data;

        return $this;
    }

    /**
     * @param array|null $value
     *
     * @return $this
     */
    public function setColumns(array $value = null): static
    {
        $this->attributes['attrs']['columns'] = array_is_list($value) ?
            array_map(fn($name) => is_array($name) ? $name : ['name' => $name], $value) : $value;

        return $this;
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setSlotTop(string $value = null): static
    {
        $this->attributes['slots']['top'] = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function isFilter(): static
    {
        $this->attributes['attrs']['filter'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function isRerender(): static
    {
        $this->attributes['attrs']['rerender'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function isDraggable(string $value = null): static
    {
        $this->attributes['attrs']['draggable'] = is_null($value) ? true : $value;

        return $this;
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setContextMenu(array $value): static
    {
        $this->attributes['attrs']['contextMenu'] = $value;

        return $this;
    }
}
