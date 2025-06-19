<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Filters;

use Filament\Tables\Filters\SelectFilter;
use Filament\Tables;

class Roles extends Filter
{
    public static function make(): SelectFilter
    {
        return SelectFilter::make('roles')
            ->label(trans('filament-users::user.resource.roles'))
            ->multiple()
            ->searchable()
            ->preload()
            ->relationship('roles', 'name');
    }
}
