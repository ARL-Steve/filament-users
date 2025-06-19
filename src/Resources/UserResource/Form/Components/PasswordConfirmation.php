<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\TextInput;

class PasswordConfirmation extends Component
{
    /**
     * @return TextInput
     */
    public static function make(): TextInput
    {
        return TextInput::make('passwordConfirmation')
            ->label(__('filament-panels::pages/auth/register.form.password_confirmation.label'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->required(fn ($record) => ! $record)
            ->dehydrated(false);
    }
}
