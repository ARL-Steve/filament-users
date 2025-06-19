<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Filters;

use Filament\Tables\Filters\SelectFilter;
use Filament\Tables;

class Teams extends Filter
{
    public static function make(): SelectFilter
    {
        return SelectFilter::make('teams')
            ->label(trans('filament-users::user.resource.teams'))
            ->multiple()
            ->searchable()
            ->preload()
            ->relationship('teams', 'name');
    }
}
