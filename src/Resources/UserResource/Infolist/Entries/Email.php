<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists;

class Email extends Entry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('email')
            ->label(trans('filament-users::user.resource.email'));
    }
}
