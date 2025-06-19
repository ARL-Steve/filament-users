<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Contracts\CanRegister;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components\ViewAction;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components\DeleteAction;

class EditPageActions
{
    use CanRegister;

    public function getDefaultActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
