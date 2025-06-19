<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Contracts\CanRegister;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components\EditAction;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components\DeleteAction;

class ViewPageActions
{
    use CanRegister;

    public function getDefaultActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
