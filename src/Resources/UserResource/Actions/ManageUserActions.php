<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Contracts\CanRegister;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components\CreateAction;

class ManageUserActions
{
    use CanRegister;

    public function getDefaultActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
