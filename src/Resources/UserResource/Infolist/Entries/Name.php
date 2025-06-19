<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists;

class Name extends Entry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('name')
            ->columnSpanFull()
            ->label(trans('filament-users::user.resource.name'));
    }
}
