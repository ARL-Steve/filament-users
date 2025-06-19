<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables;

class Roles extends Column
{
    public static function make(): TextColumn
    {
        return TextColumn::make('roles.name')
            ->icon('heroicon-o-shield-check')
            ->color('success')
            ->toggleable()
            ->badge()
            ->label(trans('filament-users::user.resource.roles'));
    }
}
