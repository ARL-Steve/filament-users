<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\BulkActions;

use Filament\Actions\BulkAction;

abstract class Action
{
    abstract public static function make(): BulkAction;
}
