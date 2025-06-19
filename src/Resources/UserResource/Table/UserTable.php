<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table;

use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns\ID;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns\Name;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns\Email;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns\Verified;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns\CreatedAt;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns\UpdatedAt;
use Filament\Tables\Columns\Column;
use Filament\Tables\Table;

class UserTable
{
    protected static array $columns = [];

    public static function make(Table $table): Table
    {
        return $table
            ->deferLoading()
            ->toolbarActions(config('filament-users.resource.table.bulkActions')::make())
            ->recordActions(config('filament-users.resource.table.actions')::make())
            ->filters(config('filament-users.resource.table.filters')::make())
            ->columns(self::getColumns());
    }

    public static function getDefaultColumns(): array
    {
        return [
            ID::make(),
            Name::make(),
            Email::make(),
            Verified::make(),
            CreatedAt::make(),
            UpdatedAt::make(),
        ];
    }

    private static function getColumns(): array
    {
        return array_merge(self::getDefaultColumns(), self::$columns);
    }

    public static function register(Column | array $column): void
    {
        if (is_array($column)) {
            foreach ($column as $item) {
                if ($item instanceof Column) {
                    self::$columns[] = $item;
                }
            }
        } else {
            self::$columns[] = $column;
        }
    }
}
