<?php

namespace TomatoPHP\FilamentUsers;

use BezhanSalleh\FilamentShield\FilamentShield;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\UserForm;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components\Roles;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserTable;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserFilters;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserBulkActions;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\BulkActions\RolesAction;
use TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\UserInfoList;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components\Teams;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\BulkActions\TeamsAction;
use STS\FilamentImpersonate\Tables\Actions\Impersonate;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserActions;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions\ImpersonateAction;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Laravel\Jetstream\Jetstream;
use TomatoPHP\FilamentUsers\Resources\TeamResource;
use TomatoPHP\FilamentUsers\Resources\UserResource;

class FilamentUsersPlugin implements Plugin
{
    protected static bool $useAvatar = false;

    public function getId(): string
    {
        return 'filament-user';
    }

    public function useAvatar(bool $useAvatar = true): self
    {
        self::$useAvatar = $useAvatar;

        return $this;
    }

    public static function hasAvatar(): bool
    {
        return self::$useAvatar;
    }

    public function register(Panel $panel): void
    {
        if (! config('filament-users.publish_resource')) {
            $panel->resources([
                UserResource::class,
            ]);
        }

        if (config('filament-users.teams')) {
            $panel->resources([
                TeamResource::class,
            ]);
        }
    }

    public function boot(Panel $panel): void
    {
        if (config('filament-users.shield') && class_exists(FilamentShield::class)) {
            UserForm::register(Roles::make());
            UserTable::register(UserResource\Table\Columns\Roles::make());
            UserFilters::register(UserResource\Table\Filters\Roles::make());
            UserBulkActions::register(RolesAction::make());
            UserInfoList::register(UserResource\Infolist\Entries\Roles::make());
        }

        if (config('filament-users.teams') && class_exists(Jetstream::class)) {
            UserForm::register(Teams::make());
            UserTable::register(UserResource\Table\Columns\Teams::make());
            UserFilters::register(UserResource\Table\Filters\Teams::make());
            UserBulkActions::register(TeamsAction::make());
            UserInfoList::register(UserResource\Infolist\Entries\Teams::make());
        }

        if (config('filament-users.impersonate') && class_exists(Impersonate::class)) {
            UserActions::register(ImpersonateAction::make());
        }
    }

    public static function make(): self
    {
        return new FilamentUsersPlugin;
    }
}
