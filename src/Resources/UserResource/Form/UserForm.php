<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Form;

use Filament\Schemas\Schema;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components\Name;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components\Email;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components\Password;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components\PasswordConfirmation;
use Filament\Forms\Components\Field;

class UserForm
{
    protected static array $schema = [];

    public static function make(Schema $schema): Schema
    {
        return $schema->components(self::getSchema())->columns(2);
    }

    public static function getDefaultComponents(): array
    {
        return [
            Name::make(),
            Email::make(),
            Password::make(),
            PasswordConfirmation::make(),
        ];
    }

    private static function getSchema(): array
    {
        return array_merge(self::getDefaultComponents(), self::$schema);
    }

    public static function register(Field | array $component): void
    {
        if (is_array($component)) {
            foreach ($component as $item) {
                if ($item instanceof Field) {
                    self::$schema[] = $item;
                }
            }

        } else {
            self::$schema[] = $component;
        }
    }
}
