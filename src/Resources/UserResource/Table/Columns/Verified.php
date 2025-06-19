<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables;

class Verified extends Column
{
    public static function make(): IconColumn
    {
        return IconColumn::make('email_verified_at')
            ->state(fn ($record) => (bool) $record->email_verified_at)
            ->boolean()
            ->sortable()
            ->label(trans('filament-users::user.resource.email_verified_at'))
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
