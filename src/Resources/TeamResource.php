<?php

namespace TomatoPHP\FilamentUsers\Resources;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use TomatoPHP\FilamentUsers\Resources\TeamResource\Pages\ListTeams;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use TomatoPHP\FilamentUsers\Resources\TeamResource\Pages;

class TeamResource extends Resource
{
    public static function getModel(): string
    {
        return config('filament-users.team_model');
    }

    protected static ?string $recordTitleAttribute = 'name';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-group';

    public static function getLabel(): ?string
    {
        return trans('filament-users::user.team.single');
    }

    public static function getNavigationLabel(): string
    {
        return trans('filament-users::user.team.title');
    }

    public static function getPluralLabel(): ?string
    {
        return trans('filament-users::user.team.title');
    }

    public static function getNavigationGroup(): ?string
    {
        if (config('filament-users.shield')) {
            return __('filament-shield::filament-shield.nav.group');
        }

        return config('filament-users.group') ?: trans('filament-users::user.group');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                //                Forms\Components\SpatieMediaLibraryFileUpload::make('avatar')
                //                    ->label(trans('filament-users::user.team.columns.avatar'))
                //                    ->hiddenLabel()
                //                    ->alignCenter()
                //                    ->avatar()
                //                    ->collection('avatar')
                //                    ->image(),
                TextInput::make('name')
                    ->label(trans('filament-users::user.team.columns.name'))
                    ->required()
                    ->maxLength(255),
                Select::make('user_id')
                    ->label(trans('filament-users::user.team.columns.owner'))
                    ->relationship('owner', 'name')
                    ->required()
                    ->preload()
                    ->searchable(),
                Toggle::make('personal_team')
                    ->label(trans('filament-users::user.team.columns.personal_team')),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        $columns = [];

        if (filament('filament-user')::hasAvatar()) {
            $columns[] = TextColumn::make('owner.name')
                ->label(trans('filament-users::user.team.columns.owner'))
                ->sortable();
        } else {
            $columns[] = TextColumn::make('owner.name')
                ->label(trans('filament-users::user.team.columns.owner'))
                ->sortable();
        }

        return $table
            ->columns(array_merge([
                //                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')
                //                    ->circular()
                //                    ->collection('avatar')
                //                    ->label(trans('filament-users::user.team.columns.avatar'))
                //                    ->toggleable(),
                TextColumn::make('name')
                    ->label(trans('filament-users::user.team.columns.name'))
                    ->searchable()
                    ->sortable(),
                IconColumn::make('personal_team')
                    ->label(trans('filament-users::user.team.columns.personal_team'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ], $columns))
            ->filters([
                SelectFilter::make('owner')
                    ->label(trans('filament-users::user.team.columns.owner'))
                    ->searchable()
                    ->relationship('owner', 'name'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->defaultSort('id', 'desc')
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTeams::route('/'),
        ];
    }
}
