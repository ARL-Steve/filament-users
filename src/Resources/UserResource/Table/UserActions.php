<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table;

use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions\ViewAction;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions\EditAction;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions\DeleteAction;
use Filament\Actions\Action;

class UserActions
{
    /**
     * @var array
     */
    protected static $actions = [];

    public static function make(): array
    {
        return self::getActions();
    }

    private static function getDefaultActions(): array
    {
        return [
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
        ];
    }

    private static function getActions(): array
    {
        return array_merge(self::getDefaultActions(), self::$actions);
    }

    public static function register(Action | array $action): void
    {
        if (is_array($action)) {
            foreach ($action as $item) {
                if ($item instanceof Action) {
                    self::$actions[] = $item;
                }
            }
        } else {
            self::$actions[] = $action;
        }
    }
}
