<?php

namespace TomatoPHP\FilamentUsers\Resources\TeamResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\DB;
use TomatoPHP\FilamentUsers\Resources\TeamResource;

class ListTeams extends ManageRecords
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->using(function (array $data, Action $action) {
                    DB::table('teams')->insert([
                        'name' => $data['name'],
                        'personal_team' => false,
                        'user_id' => $data['user_id'],
                    ]);
                }),
        ];
    }
}
