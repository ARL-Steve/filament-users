<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Contracts\CanRegister;

class CreatePageActions
{
    use CanRegister;

    public function getDefaultActions(): array
    {
        return [

        ];
    }
}
