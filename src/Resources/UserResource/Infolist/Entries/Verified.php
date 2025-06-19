<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists;

class Verified extends Entry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('email_verified_at')
            ->visible(fn ($record) => $record->email_verified_at)
            ->label(trans('filament-users::user.resource.email_verified_at'));
    }
}
