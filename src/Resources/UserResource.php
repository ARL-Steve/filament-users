<?php

namespace TomatoPHP\FilamentUsers\Resources;

use Filament\Schemas\Schema;
use TomatoPHP\FilamentUsers\Resources\UserResource\Pages\ManageUsers;
use TomatoPHP\FilamentUsers\Resources\UserResource\Pages\ListUsers;
use TomatoPHP\FilamentUsers\Resources\UserResource\Pages\CreateUser;
use TomatoPHP\FilamentUsers\Resources\UserResource\Pages\EditUser;
use TomatoPHP\FilamentUsers\Resources\UserResource\Pages\ViewUser;
use Filament\Resources\Pages\PageRegistration;
use Filament\Resources\RelationManagers\RelationGroup;
use Filament\Resources\RelationManagers\RelationManagerConfiguration;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?int $navigationSort = 9;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user';

    public static function getNavigationLabel(): string
    {
        return trans('filament-users::user.resource.label');
    }

    public static function getModel(): string
    {
        return FilamentUser::getModel();
    }

    public static function getPluralLabel(): string
    {
        return trans('filament-users::user.resource.label');
    }

    public static function getLabel(): string
    {
        return trans('filament-users::user.resource.single');
    }

    public static function getNavigationGroup(): ?string
    {
        if (config('filament-users.shield')) {
            return __('filament-shield::filament-shield.nav.group');
        }

        return config('filament-users.group') ?: trans('filament-users::user.group');
    }

    public function getTitle(): string
    {
        return trans('filament-users::user.resource.title.resource');
    }

    public static function form(Schema $schema): Schema
    {
        return config('filament-users.resource.form.class')::make($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return config('filament-users.resource.infolist.class')::make($schema);
    }

    public static function table(Table $table): Table
    {
        return config('filament-users.resource.table.class')::make($table);
    }

    /**
     * @return array|\class-string[]|RelationGroup[]|RelationManagerConfiguration[]
     */
    public static function getRelations(): array
    {
        return FilamentUser::getRelations();
    }

    /**
     * @return array|PageRegistration[]
     */
    public static function getPages(): array
    {
        return config('filament-users.simple') ? [
            'index' => ManageUsers::route('/'),
        ] : [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
            'view' => ViewUser::route('/{record}'),
        ];
    }
}
