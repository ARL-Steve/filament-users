<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables;

class Teams extends Column
{
    public static function make(): TextColumn
    {
        return TextColumn::make('teams.name')
            ->color('info')
            ->icon('heroicon-o-users')
            ->toggleable()
            ->badge();
    }
}
