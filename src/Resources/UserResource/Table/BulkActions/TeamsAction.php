<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\BulkActions;

use Filament\Actions\BulkAction;
use Filament\Forms\Components\Select;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Collection;

class TeamsAction extends Action
{
    public static function make(): BulkAction
    {
        return BulkAction::make('teams')
            ->requiresConfirmation()
            ->color('info')
            ->icon('heroicon-o-users')
            ->label(trans('filament-users::user.bulk.teams'))
            ->schema([
                Select::make('teams')
                    ->label(trans('filament-users::user.resource.teams'))
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->options(config('filament-users.team_model')::query()->pluck('name', 'id')->toArray()),
            ])
            ->action(function (array $data, Collection $records, BulkAction $action) {
                $teams = $data['teams'];

                $records->each(function ($user) use ($teams) {
                    $user->teams()->sync($teams);
                });

                $action->success();
            })
            ->deselectRecordsAfterCompletion();
    }
}
