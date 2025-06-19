<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables;

class CreatedAt extends Column
{
    public static function make(): TextColumn
    {
        return TextColumn::make('created_at')
            ->label(trans('filament-users::user.resource.created_at'))
            ->dateTime()
            ->description(fn ($record) => $record->created_at->diffForHumans())
            ->toggleable(isToggledHiddenByDefault: true)
            ->sortable();
    }
}
