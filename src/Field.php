<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

use Illuminate\Support\Facades\Lang;

class Field extends Component
{
    public function setData(?array $value = null): static
    {
        $this->attributes['attrs']['data'] = $value;

        return $this;
    }

    public function addOption($key, $value = null, ?bool $selected = null): static
    {
        $option = [
            'key'   => $key,
            'value' => $value,
        ];

        if (is_null($value)) {
            $option['value'] = $key;
        }

        if (!is_null($selected)) {
            $option['selected'] = $selected;
        }

        $this->attributes['attrs']['data'][] = $option;

        return $this;
    }

    public function addYesNo(
        ?string $langYes = null,
        ?string $langNo = null,
        string | int $valueYes = 1,
        string | int $valueNo = 0
    ): static {
        if (is_null($langYes)) {
            $langYes = Lang::get('global.yes');
        }

        if (is_null($langNo)) {
            $langNo = Lang::get('global.no');
        }

        return $this
            ->addOption($valueYes, $langYes)
            ->addOption($valueNo, $langNo);
    }

    public function setValue($value = null): static
    {
        $this->attributes['attrs']['value'] = $value;

        return $this;
    }

    public function setKeyValue($value = null): static
    {
        $this->attributes['attrs']['keyValue'] = $value;

        return $this;
    }

    public function setType(string | int | null $value = null): static
    {
        $this->attributes['attrs']['type'] = $value;

        return $this;
    }

    public function setId(string | int | null $value = null): static
    {
        $this->attributes['attrs']['id'] = $value;

        return $this;
    }

    public function setClass(?string $value = null): static
    {
        $this->attributes['attrs']['class'] = $value;

        return $this;
    }

    public function setLabel(?string $value = null): static
    {
        $this->attributes['attrs']['label'] = $value;

        return $this;
    }

    public function setDescription(?string $value = null): static
    {
        $this->attributes['attrs']['description'] = $value;

        return $this;
    }

    public function setHelp(?string $value = null): static
    {
        $this->attributes['attrs']['help'] = $value;

        return $this;
    }

    public function setInputClass(?string $value = null): static
    {
        $this->attributes['attrs']['inputClass'] = $value;

        return $this;
    }

    public function setErrorClass(?string $value = null): static
    {
        $this->attributes['attrs']['errorClass'] = $value;

        return $this;
    }

    public function setRequired(?string $value = null): static
    {
        $this->attributes['attrs']['requiredText'] = $value;

        return $this;
    }

    public function setCheckedValue($true = null, $false = null): static
    {
        $this->attributes['attrs']['trueValue'] = $true;
        $this->attributes['attrs']['falseValue'] = $false;

        return $this;
    }

    public function setUrl(?string $value = null): static
    {
        $this->attributes['attrs']['url'] = $value;

        return $this;
    }

    public function setRows(int $value): static
    {
        $this->attributes['attrs']['rows'] = $value;

        return $this;
    }

    public function setNew(string $value): static
    {
        $this->attributes['attrs']['itemNew'] = $value;

        if (!empty($this->attributes['attrs']['url'])) {
            $this->attributes['attrs']['url'] .= stripos($this->attributes['attrs']['url'], '?') !== false ? '&' : '?';
            $this->attributes['attrs']['url'] .= 'itemNew=' . $value;
        }

        return $this;
    }

    public function setRelation(string $value, $trueValue = null, $falseValue = null, $notEmpty = null): static
    {
        $this->attributes['attrs']['relation'] = [
            'key'        => $value,
            'trueValue'  => $trueValue,
            'falseValue' => $falseValue,
            'notEmpty'   => $notEmpty,
        ];

        return $this;
    }

    public function setEmitClick(string $value): static
    {
        $this->attributes['attrs']['emitClick'] = $value;

        return $this;
    }

    public function setEmitInput(string $value, ?string $key = null): static
    {
        $this->attributes['attrs']['emitInput'] = $value;
        $this->attributes['attrs']['emitInputKey'] = $key;

        return $this;
    }

    public function isRequired(): static
    {
        $this->attributes['attrs']['required'] = true;

        return $this;
    }

    public function isReadonly(): static
    {
        $this->attributes['attrs']['readonly'] = true;

        return $this;
    }

    public function isDisabled(): static
    {
        $this->attributes['attrs']['disabled'] = true;

        return $this;
    }
}
