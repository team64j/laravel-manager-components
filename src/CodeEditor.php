<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

class CodeEditor extends Component
{
    protected $attributes = [
        'component' => 'AppCodeEditor',
        'attrs' => [
            'config' => [
                [
                    'component' => 'Codemirror',
                    'name'      => 'Codemirror',
                ],
            ],
        ],
    ];

    public function setLabel(?string $value = null): static
    {
        $this->attributes['attrs']['label'] = $value;

        return $this;
    }

    public function setHelp(?string $value = null): static
    {
        $this->attributes['attrs']['help'] = $value;

        return $this;
    }

    public function setClass(?string $value = null): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }

    public function setInputClass(?string $value = null): static
    {
        $this->attributes['attrs']['inputClass'] = $value;

        return $this;
    }

    public function setRows(int | string $value): static
    {
        $this->attributes['attrs']['rows'] = $value;

        return $this;
    }

    public function setLanguage(string $value): static
    {
        foreach ($this->attributes['attrs']['config'] as &$attr) {
            if ($attr['component'] == 'Codemirror') {
                $attr['lang'] = $value;
            }
        }

        return $this;
    }

    public function setConfig(array $value): static
    {
        $this->attributes['attrs']['config'] = $value;

        return $this;
    }

    public function isFullSize(): static
    {
        $this->attributes['attrs']['fullSize'] = true;

        return $this;
    }
}
