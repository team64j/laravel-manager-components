<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

use Closure;

class Main extends Component
{
    protected $attributes = [
        'component' => 'AppMain',
    ];

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

    public function setActions($value): static
    {
        if ($value instanceof Closure) {
            $value = $value(Actions::make());
        }

        return $this->setSlot('actions', $value);
    }

    public function setTitle($value): static
    {
        if ($value instanceof Closure) {
            $value = $value(Title::make());
        }

        return $this->setSlot('title', $value);
    }

    public function setTabs($value): static
    {
        if ($value instanceof Closure) {
            $value = $value(Tabs::make());
        }

        return $this->setSlot('tabs', $value);
    }

    public function setCrumbs($value): static
    {
        if ($value instanceof Closure) {
            $value = $value(Crumbs::make());
        }

        return $this->setSlot('crumbs', $value);
    }

    public function setSlot(string $key, array|Component $data = []): static
    {
        $this->attributes['slots'][$key] = $data;

        return $this;
    }

    public function putSlot(string $key, array|Component $data = []): static
    {
        $this->attributes['slots'][$key][] = $data;

        return $this;
    }
}
