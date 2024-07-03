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
            'slots' => $attributes['slots'] ?? [],
        ];

        parent::__construct($attributes);
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

        $this->attributes['slots']['actions'] = $value;

        return $this;
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

        $this->attributes['slots']['title'] = $value;

        return $this;
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

        $this->attributes['slots']['tabs'] = $value;

        return $this;
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

        $this->attributes['slots']['breadcrumbs'] = $value;

        return $this;
    }
}
