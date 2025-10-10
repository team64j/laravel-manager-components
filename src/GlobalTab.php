<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class GlobalTab extends Component
{
    /**
     * @param string|null $icon
     * @param string|null $title
     */
    public function __construct(
        ?string $icon = null,
        ?string $title = null,
    ) {
        $attributes = [
            'component' => 'AppGlobalTab',
            'attrs' => [
                'icon' => $icon,
                'title' => $title,
            ],
        ];

        parent::__construct($attributes);
    }
}
