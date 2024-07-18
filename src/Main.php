<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

use Closure;

class Main extends Component
{
    public function __construct($attributes = [])
    {
        $attributes = [
            'component' => 'AppMain',
            'attrs' => [
//                'actions' => $attributes['actions'] ?? [],
//                'title' => $attributes['title'] ?? [],
//                'tabs' => $attributes['tabs'] ?? [],
            ],
            'slots' => $attributes,
        ];

        parent::__construct($attributes);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        if (array_is_list($this->attributes['slots'])) {
            foreach ($this->attributes['slots'] as $k => $slot) {
                unset($this->attributes['slots'][$k]);

                $this->attributes['slots'][$slot['slot'] ?? 'default'][] = $slot;
            }
        }

        return parent::toArray();
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setActions($value): static
    {
        if ($value instanceof Closure) {
            $value = $value(Actions::make());
        }

        return $this->setSlot('actions', $value);
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setTitle($value): static
    {
        if ($value instanceof Closure) {
            $value = $value(Title::make());
        }

        return $this->setSlot('title', $value);
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setTabs($value): static
    {
        if ($value instanceof Closure) {
            $value = $value(Tabs::make());
        }

        return $this->setSlot('tabs', $value);
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setCrumbs($value): static
    {
        if ($value instanceof Closure) {
            $value = $value(Crumbs::make());
        }

        return $this->setSlot('crumbs', $value);
    }

    /**
     * @param string $key
     * @param array|Component $data
     *
     * @return $this
     */
    public function setSlot(string $key, array|Component $data = []): static
    {
        $this->attributes['slots'][$key] = $data;

        return $this;
    }

    /**
     * @param string $key
     * @param array|Component $data
     *
     * @return $this
     */
    public function putSlot(string $key, array|Component $data = []): static
    {
        $this->attributes['slots'][$key][] = $data;

        return $this;
    }
}
