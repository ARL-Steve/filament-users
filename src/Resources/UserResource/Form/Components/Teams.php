<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Select;

class Teams extends Component
{
    /**
     * @return Select
     */
    public static function make(): Select
    {
        return Select::make('teams')
            ->columnSpanFull()
            ->multiple()
            ->preload()
            ->relationship('teams', 'name')
            ->label(trans('filament-users::user.resource.teams'));
    }
}
