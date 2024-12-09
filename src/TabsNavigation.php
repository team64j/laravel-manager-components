<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class TabsNavigation extends Component
{
    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $attributes = [
            'component' => 'AppTabsNavigation',
            'attrs' => [
                'id' => $data['id'] ?? null,
                'history' => $data['history'] ?? null,
                'data' => $data['data'] ?? [],
            ],
            'data' => $data['model'] ?? null,
        ];

        parent::__construct($attributes);
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
    public function setUid(string $value = null): static
    {
        $this->attributes['attrs']['uid'] = $value;

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
     * @param array|null $value
     *
     * @return $this
     */
    public function setData(array $value = null): static
    {
        $this->attributes['attrs']['data'] = $value;

        return $this;
    }

    /**
     * @param string|bool|null $value
     *
     * @return $this
     */
    public function setHistory(string|bool $value = null): static
    {
        $this->attributes['attrs']['history'] = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function isVertical(): static
    {
        $this->attributes['attrs']['vertical'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function isSmallTabs(): static
    {
        $this->attributes['attrs']['smallTabs'] = true;

        return $this;
    }

}
