<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables;

class UpdatedAt extends Column
{
    public static function make(): TextColumn
    {
        return TextColumn::make('updated_at')
            ->label(trans('filament-users::user.resource.updated_at'))
            ->dateTime()
            ->description(fn ($record) => $record->updated_at->diffForHumans())
            ->toggleable(isToggledHiddenByDefault: true)
            ->sortable();
    }
}
