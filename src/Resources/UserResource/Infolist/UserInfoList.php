<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Infolist;

use Filament\Schemas\Schema;
use TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries\Name;
use TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries\Email;
use TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries\Verified;
use Filament\Infolists\Components\Entry;

class UserInfoList
{
    protected static array $schema = [];

    public static function make(Schema $schema): Schema
    {
        return $schema->components(self::getSchema());
    }

    public static function getDefaultComponents(): array
    {
        return [
            Name::make(),
            Email::make(),
            Verified::make(),
        ];
    }

    private static function getSchema(): array
    {
        return array_merge(self::getDefaultComponents(), self::$schema);
    }

    public static function register(Entry | array $component): void
    {
        if (is_array($component)) {
            foreach ($component as $item) {
                if ($item instanceof Entry) {
                    self::$schema[] = $item;
                }
            }

        } else {
            self::$schema[] = $component;
        }
    }
}
