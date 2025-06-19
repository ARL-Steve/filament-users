<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table;

use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Filters\Verified;
use Filament\Tables\Filters\BaseFilter;

class UserFilters
{
    /**
     * @var array
     */
    protected static $filters = [];

    public static function make(): array
    {
        return self::getFilters();
    }

    private static function getDefaultFilters(): array
    {
        return [
            Verified::make(),
        ];
    }

    private static function getFilters(): array
    {
        return array_merge(self::getDefaultFilters(), self::$filters);
    }

    public static function register(BaseFilter | array $action): void
    {
        if (is_array($action)) {
            foreach ($action as $item) {
                if ($item instanceof BaseFilter) {
                    self::$filters[] = $item;
                }
            }
        } else {
            self::$filters[] = $action;
        }
    }
}
