<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions;

use Filament\Tables;

class ViewAction extends Action
{
    public static function make(): \Filament\Actions\Action
    {
        return \Filament\Actions\ViewAction::make()
            ->iconButton()
            ->tooltip(trans('filament-users::user.resource.title.show'));
    }
}
