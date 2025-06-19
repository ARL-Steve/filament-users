<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

use STS\FilamentImpersonate\Pages\Actions\Impersonate;

class ImpersonateAction extends Action
{
    /**
     * @return Action
     */
    public static function make(): \Filament\Actions\Action
    {
        if (class_exists('\STS\FilamentImpersonate\Pages\Actions\Impersonate')) {
            return Impersonate::make();
        }

        return \Filament\Actions\Action::make('impersonate');
    }
}
