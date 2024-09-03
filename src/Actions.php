<?php

declare(strict_types=1);

namespace Team64j\LaravelManagerComponents;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

/**
 * @method self setCancel(string $lang = null, string|array $to = null, string $class = null, string $icon = null)
 * @method self setCancelTo(string|array $to)
 * @method self setCancelTitle(string $lang)
 * @method self setCancelClass(string $class)
 * @method self setCancelIcon(string $icon)
 * @method self setDelete(string $lang = null, string|array $to = null, string $class = null, string $icon = null)
 * @method self setDeleteTo(string|array $to)
 * @method self setDeleteTitle(string $lang)
 * @method self setDeleteClass(string $class)
 * @method self setDeleteIcon(string $icon)
 * @method self setClear(string $lang = null, string|array $to = null, string $class = null, string $icon = null)
 * @method self setClearTo(string|array $to)
 * @method self setClearTitle(string $lang)
 * @method self setClearClass(string $class)
 * @method self setClearIcon(string $icon)
 * @method self setRestore(string $lang = null, string|array $to = null, string $class = null, string $icon = null)
 * @method self setRestoreTo(string|array $to)
 * @method self setRestoreTitle(string $lang)
 * @method self setRestoreClass(string $class)
 * @method self setRestoreIcon(string $icon)
 * @method self setCopy(string $lang = null, string|array $to = null, string $class = null, string $icon = null)
 * @method self setCopyTo(string|array $to)
 * @method self setCopyTitle(string $lang)
 * @method self setCopyClass(string $class)
 * @method self setCopyIcon(string $icon)
 * @method self setView(string $lang = null, string|array $to = null, string $class = null, string $icon = null)
 * @method self setViewTo(string|array $to)
 * @method self setViewTitle(string $lang)
 * @method self setViewClass(string $class)
 * @method self setViewIcon(string $icon)
 * @method self setNew(string $lang = null, string|array $to = null, string $class = null, string $icon = null)
 * @method self setNewTo(string|array $to)
 * @method self setNewTitle(string $lang)
 * @method self setNewClass(string $class)
 * @method self setNewIcon(string $icon)
 * @method self setSave(string $lang = null, string|array $to = null, string $class = null, string $icon = null)
 * @method self setSaveTo(string|array $to)
 * @method self setSaveTitle(string $lang)
 * @method self setSaveClass(string $class)
 * @method self setSaveIcon(string $icon)
 */
class Actions extends Component
{
    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $attributes = [
            'component' => 'AppActions',
        ];

        foreach ($data as $item) {
            if (is_string($item)) {
                $this->setAction($item);
            }
        }

        parent::__construct($attributes);
    }

    /**
     * @param $method
     * @param $parameters
     *
     * @return $this
     */
    public function __call($method, $parameters): static
    {
        $str = Str::of($method);

        if ($str->test('/^set(.*?)Title$/')) {
            return $this->setActionTitle(
                $str->match('/^set(.*?)Title$/')->camel()->toString(),
                ...$parameters
            );
        }

        if ($str->test('/^set(.*?)To$/')) {
            return $this->setActionTo(
                $str->match('/^set(.*?)To$/')->camel()->toString(),
                ...$parameters
            );
        }

        if ($str->test('/^set(.*?)Class$/')) {
            return $this->setActionClass(
                $str->match('/^set(.*?)Class$/')->camel()->toString(),
                ...$parameters
            );
        }

        if ($str->test('/^set(.*?)Icon$/')) {
            return $this->setActionIcon(
                $str->match('/^set(.*?)Icon$/')->camel()->toString(),
                ...$parameters
            );
        }

        if ($str->test('/^set(.*?)$/')) {
            return $this->setAction(
                $str->match('/^set(.*?)$/')->camel()->toString(),
                ...$parameters
            );
        }

        return $this;
    }

    /**
     * @param $action
     * @param null $lang
     * @param null $to
     * @param null $class
     * @param null $icon
     *
     * @return $this
     */
    public function setAction($action, $lang = null, $to = null, $class = null, $icon = null): static
    {
        $params = $action;

        if (!empty($action['action'])) {
            $action = $action['action'];
        }

        if (!empty($this->attributes['attrs']['data'])) {
            foreach ($this->attributes['attrs']['data'] as $value) {
                if (($value['action']['action'] ?? $value['action']) == $action) {
                    return $this;
                }
            }
        }

        $this->attributes['attrs']['data'][] = [
            'action' => $params,
        ];

        return $this->setActionTo($action, $to)
            ->setActionTitle($action, $lang)
            ->setActionClass($action, $class)
            ->setActionIcon($action, $icon);
    }

    /**
     * @param $action
     * @param $lang
     *
     * @return $this
     */
    public function setActionTitle($action, $lang = null): static
    {
        $this->setAction($action);

        foreach ($this->attributes['attrs']['data'] as &$value) {
            if (($value['action']['action'] ?? $value['action']) == $action) {
                $value['title'] = match ($action) {
                    'cancel' => $lang ?? Lang::get('global.cancel'),
                    'delete' => $lang ?? Lang::get('global.delete'),
                    'clear' => $lang ?? Lang::get('global.clear'),
                    'restore' => $lang ?? Lang::get('global.undelete_resource'),
                    'copy' => $lang ?? Lang::get('global.duplicate'),
                    'view' => $lang ?? Lang::get('global.view'),
                    'new' => $lang ?? Lang::get('global.new_resource'),
                    'save', 'saveAnd' => $lang ?? Lang::get('global.save'),
                    default => $lang ?? Lang::get('global.create_new')
                };

                break;
            }
        }

        return $this;
    }

    /**
     * @param $action
     * @param null $to
     *
     * @return $this
     */
    public function setActionTo($action, $to = null): static
    {
        $this->setAction($action);

        if ($to) {
            foreach ($this->attributes['attrs']['data'] as &$value) {
                if (($value['action']['action'] ?? $value['action']) == $action) {
                    if (is_array($to)) {
                        $value['to'] = $to;
                    } else {
                        $value['to'] = [
                            'path' => $to,
                        ];

                        if ($action == 'new') {
                            $value['to']['params']['id'] = 'new';
                        }
                    }

                    break;
                }
            }
        }

        return $this;
    }

    /**
     * @param $action
     * @param null $class
     *
     * @return $this
     */
    public function setActionClass($action, $class = null): static
    {
        $this->setAction($action);

        if ($class) {
            foreach ($this->attributes['attrs']['data'] as &$value) {
                if (($value['action']['action'] ?? $value['action']) == $action) {
                    $value['class'] = trim(($value['class'] ?? '') . ' ' . $class);

                    break;
                }
            }
        }

        return $this;
    }

    /**
     * @param $action
     * @param null $icon
     *
     * @return $this
     */
    public function setActionIcon($action, $icon = null): static
    {
        $this->setAction($action);

        foreach ($this->attributes['attrs']['data'] as &$value) {
            if (($value['action']['action'] ?? $value['action']) == $action) {
                $value['icon'] = match ($action) {
                    'cancel' => $icon ?? 'fa fa-reply',
                    'delete' => $icon ?? 'fa fa-trash-alt',
                    'clear' => $icon ?? 'fa fa-remove',
                    'restore' => $icon ?? 'fa fa-undo',
                    'copy' => $icon ?? 'fa fa-copy',
                    'view' => $icon ?? 'fa fa-eye',
                    'new' => $icon ?? 'fa fa-plus',
                    'save', 'saveAnd' => $icon ?? 'fa fa-save',
                    default => $icon ?? 'fa fa-circle'
                };

                break;
            }
        }

        return $this;
    }

    public function setSaveAnd($lang = null, $class = null, $icon = null): static
    {
        $this->attributes['attrs']['data'][] = [
            'action' => 'save',
            'icon' => $icon ?? 'fa fa-save',
            'title' => $lang ?? Lang::get('global.save'),
            'class' => $class ?? 'btn-green',
            'data' => [
                [
                    'stay' => 0,
                    'icon' => 'fa fa-reply fa-fw',
                    'title' => Lang::get('global.close'),
                ],
                [
                    'stay' => 1,
                    'icon' => 'fa fa-copy fa-fw',
                    'title' => Lang::get('global.stay_new'),
                ],
                [
                    'stay' => 2,
                    'icon' => 'fa fa-pencil fa-fw',
                    'title' => Lang::get('global.stay'),
                ],
            ],
        ];

        return $this;
    }
}
