<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions;

use Filament\Tables;

class EditAction extends Action
{
    public static function make(): \Filament\Actions\Action
    {
        return \Filament\Actions\EditAction::make()
            ->iconButton()
            ->tooltip(trans('filament-users::user.resource.title.edit'));
    }
}
