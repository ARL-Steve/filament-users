<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions;

use STS\FilamentImpersonate\Tables\Actions\Impersonate;
use Filament\Tables;

class ImpersonateAction extends Action
{
    public static function make(): \Filament\Actions\Action
    {
        if (class_exists("\STS\FilamentImpersonate\Tables\Actions\Impersonate")) {
            return Impersonate::make('impersonate')
                ->redirectTo(fn () => filament()->getCurrentOrDefaultPanel()->getUrl())
                ->tooltip(trans('filament-users::user.resource.title.impersonate'));
        }

        return \Filament\Actions\Action::make('impersonate');
    }
}
