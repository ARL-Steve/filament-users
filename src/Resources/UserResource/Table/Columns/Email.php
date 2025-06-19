<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables;

class Email extends Column
{
    public static function make(): TextColumn
    {
        return TextColumn::make('email')
            ->sortable()
            ->searchable()
            ->label(trans('filament-users::user.resource.email'));
    }
}
